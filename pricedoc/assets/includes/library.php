<?php
require($_SERVER['DOCUMENT_ROOT'].'/pricedoc/vendor/autoload.php');

function register($document){
    global $collection;
    $collection->insertOne($document);
    return true;
}

function chkemail($email){
    global $collection;
    $temp = $collection->findOne(array('Email Address'=> $email));
    if(empty($temp)){
    return true;
    }
    else{
        return false;
    }
}

function setsession($email){
    $_SESSION["userLoggedIn"] = 1;
    global $collection;
    $temp = $collection->findOne(array('Email Address'=> $email));
    $_SESSION["uname"] = $temp["First Name"];
    $_SESSION["email"] = $email;
    return true;

}

function chkLogin(){

    //var_dump($_SESSION);
    if (isset($_SESSION['userLoggedIn'])) {
        if($_SESSION["userLoggedIn"]== 1){
            return true;
        } else {
            return false;
        }
    }
}

function removeall(){
    unset($_SESSION["userLoggedIn"]);
    unset($_SESSION["uname"]);
    unset($_SESSION["email"]);
    return true;
}

function cart(){
    if (isset($_POST['addToCart'])) {
        if (isset($_SESSION['cart'])) {
            
            
            $item_array_d = array_column($_SESSION['cart'], "product");
            
            if(in_array($_POST['addCartAFM&pThumb'], $item_array_d)){
                echo "<script>
                        alert('Product already added!');
                        window.location = '/pricedoc/marketplace.php'
                      </script>";
            }else{
                $count = count($_SESSION['cart']);
                $item_array = array(
                'product' => $_POST['addCartAFM&pThumb']
                 );
                if($count == 1 && $_SESSION['cart'][0] == ""){
                    $_SESSION['cart'][0] = $item_array;
                    $_SESSION['timeCART'] = time();
                    echo "<script>
                        alert('Product added to cart!');
                        window.location = '/pricedoc/cart.php'
                    </script>";
                } else {
                    $_SESSION['cart'][$count] = $item_array;
                    $_SESSION['timeCART'] = time();
                    echo "<script>
                        alert('Product added to cart!');
                        window.location = '/pricedoc/cart.php'
                      </script>";
                }
                
            }
        } else {
            $item_array = array(
                'product' => $_POST['addCartAFM&pThumb']
            );
            $_SESSION['cart'][0] = $item_array;
            $_SESSION['timeCART'] = time();
             echo "<script>
                        alert('Product added to cart!');
                        window.location = '/pricedoc/cart.php'
                    </script>";
        }
        
        
    }
    
    //Expire the session form cart if is inactive for 1440 minutes or more.
    // 24 hours = 1440 minutes
    $expireAfter = 1440;
    if (isset($_SESSION['timeCART']))  {
            //Figure out how many seconds have passed
            //since the cart was edited
            //gia na diagrafete to cart
            $secondsInactive = time() - $_SESSION['timeCART'];
            
            //Convert our minutes into seconds.
            $expireAfterSeconds = $expireAfter * 60;
            
            if($secondsInactive >= $expireAfterSeconds){
                //cart has been inactive for too logn
                //Kill their session.
                unset($_SESSION['cart']);
            }
    }
    
    if(isset($_POST['remove'])){
        if($_GET['action'] == 'remove'){
            $explode = explode("-", $_GET['id']);
            $id = $explode[0]."&".$explode[1];
            foreach ($_SESSION['cart'] as $key => $value){
                if ($value['product'] == $id) {
                    unset($_SESSION['cart'][$key]);
                    echo '
                        <script>alert("Product removed!");
                        window.location = "cart.php"
                        </script>
                        ';
                }
            }
        }
    }
}

function cartElement($img, $name, $description, $size, $price, $quantity, $seller,$flag, $i) {
    $pd=$seller.'-'.$img;
    $element = '     
    <div class="cart-item">
     
        <div class="border rounded">
            <div class="row">
                <div class="col-md-3">
                    <img src="'.$img.'" alt="image1" class="img-fluid">
                </div>
                <div class="col-md-7" >
                    <h3 style="color:white;padding-top:20px;">Name: '.$name.'</h3>
                    <small class="text-secondary">Sizes: '.$size.'</small>
                    <br>
                    <small class="text-secondary">Seller: '.$seller.'</small>
                    <small class="text-secondary">Seller\'s quantity: '.$quantity.'</small>
                    <h3 style="color:white;">Price: '.$price.'€</h3>
                    <form id="delete'.$i.'" method="post" action="cart.php?action=remove&id='.$pd.'"> 
                    <input form="delete'.$i.'" type="submit" class="btn btn-danger mx-2" name="remove" value="Remove">
                    </form>
                </div>
                <div class="col-md-2 py-5">';
                    
    if($flag==true){
        $element .= '<form id="pay" action="" method="post" onSubmit="openPaymentForm();"></form>';
    }
                    
    $element .='<label style="color:white;" for="inputQuantity'.$seller.'&'.$img.'">Τεμάχια: </label>
                    <input form="pay" ng-model="quantity'.$i.'" type="number" id="inputQuantity'.'&'.$seller.'&'.$img.'" name="inputQuantity'.'&'.$seller.'&'.$img.'" value="1" 
                        class="form-control w-35 d-inline" min="1" max="'.$quantity.'" required>
                    <br><br>
                    <label style="color:white;" for="inputSize'.$seller.'&'.$img.'">Νούμερο: </label>
                    <input form="pay" ng-model="size'.$i.'" type="text id="inputSize'.'&'.$seller.'&'.$img.'" name="inputSize'.'&'.$seller.'&'.$img.'"
                        placeholder="Large" class="form-control w-35 d-inline" required>
                    <input type="hidden" ng-init="name'.$i.'=\''.$name.'\'" ng-model="name'.$i.'">
                </div>
            </div>
        </div>
    </div>';
    echo $element;
}

function chkAdmin(){
    if (isset($_SESSION['userLoggedIn'])) {
    $m= new MongoDB\Client ("mongodb://127.0.0.1/");
    $db = $m->loginreg;
    $collection = $db->userdata;
    $record = $collection->findOne(
        array(
            'Email Address'=>$_SESSION["email"],
            'Privileges'=>'administrator'
        ));  
    if($record)
        return true;
    else
        return false;
    }
}

function usersCount(){  
    try{
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->loginreg;
        $collection = $db->userdata;
        $users = $collection->count();
        return $users;
    }
    catch (Exception $e){
        //die("Error. Couldn't connect to the server. Please Check");
        return -1;
    }
}

function chkStore($storeAFM){  //if return=false --> store exists
    try{
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->stores;
        $collection = $db->storeinfo; 
        $record = $collection->findOne(array('AFM'=>$storeAFM));
        if($record) {
            //if exists
            return false;
        }            
        else {
            return true;
        }   
    }
    catch (Exception $e){
        return false;
    }
    return false;
}


function storeCount(){  
    try{
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->stores;
        $collection = $db->storeinfo; 
        $stores = $collection->count();
        return $stores;
    }
    catch (Exception $e){
        //die("Error. Couldn't connect to the server. Please Check");
        return -1;
    }
}

function productCount(){  
    try{
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->stores;
        $collection = $db->storeinfo; 
        $cursor = $collection->find();
        $counter = 0;
        foreach ( $cursor as $value ) {
            $realProducts = $value['nextProductCounter']-1;
            $counter += $realProducts;
        }
        return $counter;
    }
    catch (Exception $e){
        //die("Error. Couldn't connect to the server. Please Check");
        return -1;
    }
}

function storeReport($i){  
    try{
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->stores;
        $collection = $db->storeinfo; 
        $cursor = $collection->find();
        $counter = 0;
        foreach ( $cursor as $value ) {
            $storeName = $value['Name'];
            $realProducts = $value['nextProductCounter']-1;
            $counter += $realProducts;

            if ( $i == 1 && $realProducts > 1) {
                 echo "Το κατάστημα ".$storeName." έχει ".$realProducts." προιόντα!<br>";
            } else if ( $i == 1 && $realProducts = 1){
                 echo "Το κατάστημα ".$storeName." έχει ".$realProducts." προιόν!<br>";   
            } 
            
            if ( $i == 0 && $realProducts >= 1) {
                echo $storeName."<br>";
            }

             
        }
    }
    catch (Exception $e){
        //die("Error. Couldn't connect to the server. Please Check");
        return -1;
    }
}

function storeNames(){
    try{
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->stores;
        $collection = $db->storeinfo; 
        $record = $collection->find();
    if($record) {
        foreach ($record as $store) {
            echo '<option value="';
            echo $store['AFM'];
            echo '">';  
            echo $store['Name'];
            echo '</option>';
        }
    } else {
        return false;
    }   
    } catch (Exception $e){
        return false;
    }
}

function storeProducts($VAT){
     if(!chkStore($VAT)) {  //returns false -> !false -> true
         try{
            //$options = ["typeMap" => ['root' => 'array', 'document' => 'array']];
            //$m = new MongoDB\Client("mongodb://127.0.0.1/", [], $options);
            $m= new MongoDB\Client ("mongodb://127.0.0.1/");
            $db = $m->stores;
            $collection = $db->storeinfo;   
            $record = $collection->find(array('AFM'=>$VAT));
            foreach ($record as $store) {}
            $realStoreProducts = $store['nextProductCounter']-1;
            //echo "Προιόντα καταστήματος : ".$realStoreProducts."<br><br>" ;
 
            $pID = $VAT."/1";  // => συνεπως υπαρχει τουλ ενα προιον

            $products = $collection->findOne(array(
                "AFM"=>$VAT, 
                "Products.pID" => new \MongoDB\BSON\Regex($pID) ));
            
            if($products){
                $i = 1;
                $pr= array();
                foreach ($products['Products'] as $product) {
                    $pr[$i]=$product['_id'];
                    $pr[$i+1]=$product['pID'];
                    $pr[$i+2]=$product['pNAME'];
                    $pr[$i+3]=$product['pPRICE'];
                    $pr[$i+4]=$product['pBRAND'];
                    $pr[$i+5]=$product['pDESCRIPTION'];
                    $pr[$i+6]=$product['pSIZE'];
                    $pr[$i+7]=$product['pDEPARTMENT'];
                    $pr[$i+8]=$product['pTHUMBNAIL'];
                    $pr[$i+9]=$product['pQUANTITY'];

                    $i = $i+10;
                    //echo "id --> ".$product['pID'];              //output => 099360123/1        
                    //echo "name --> ".$product['pNAME']."<br>";   //output => Nike Air Force    
                }
                
                for($i=2; $i<=sizeof($pr); $i+=10){    
                    echo '<option value="';
                    echo $pr[$i];
                    echo '">';  
                    echo $pr[$i+1];
                    echo '</option>';
                }
                 
            } else {
                echo "Δεν βρέθηκαν προιοντα στο κατάστημα";
            }

        } catch (Exception $e){
            return false;
        }   
    } else {         //wrong AFM
        return -1;
    }
}

function showProducts(){
    if(productCount() > 0) {
        try {
            $m= new MongoDB\Client ("mongodb://127.0.0.1/");
            $db = $m->stores;
            $collection = $db->storeinfo; 
            
            //FIND VATs THAT HAVE AT LEAST 1 PRODUCT
            $record = $collection->find(
                array('nextProductCounter'=>
                     array( '$gt' => 1)));
            
            $i = 1;
            $stores= array();
            foreach ($record as $vat) {
                $stores[$i] = $vat['AFM'];
                //echo $stores[$i];   
                $i++;
            }
            //Loop για να περασει απο ολα τα καταστηματα
            for($i=1; $i<=sizeof($stores); $i++){
                $pID = $stores[$i]."/1"; 
                $products = $collection->findOne(array(
                    "AFM"=>$stores[$i], 
                    "Products.pID" => new \MongoDB\BSON\Regex($pID) ));
                
                $x = 1;
                $pr= array();
                foreach ($products['Products'] as $product) {
                    $pr[$x]=$product['_id'];
                    $pr[$x+1]=$product['pID'];
                    $pr[$x+2]=$product['pNAME'];
                    $pr[$x+3]=$product['pPRICE'];
                    $pr[$x+4]=$product['pBRAND'];
                    $pr[$x+5]=$product['pDESCRIPTION'];
                    $pr[$x+6]=$product['pSIZE'];
                    $pr[$x+7]=$product['pDEPARTMENT'];
                    $pr[$x+8]=$product['pTHUMBNAIL'];
                    $pr[$x+9]=$product['pQUANTITY'];
                    
                    //echo $pr[$x+2]."<br>";
                    
                    //Εμφάνισε το προιον
                    echo '<li><div class="product">';
                    echo '
                    <img class="product-image" src="'.$pr[$x+8].'" alt="product">';
                    
                    echo '
                        <form action="/pricedoc/product-preview.php" method="get">
                            <button type="submit" name="pTHUMBNAIL&VAT" 
                            value="'.$pr[$x+8].'&'.$stores[$i].'" class="product-name">'.$pr[$x+2].'</button>
                        </form>';
                    
                    echo '
                        <div class="product-brand">'.$pr[$x+4].'</div>';
                    
                    echo '
                        <div class="product-price">'.$pr[$x+3].' € 
                        <span style="font-size:15px;padding-left:15px;">[from store: '.$stores[$i].']</span>
                        </div>';
                    
                    echo '</div></li>';
                        
                    $x = $x+9;
                }
                
            }
            
        } catch (Exception $e){
            return false;
        }  
    } else {
        return false;
    }
}

function orders(){
    $name = $_SESSION["uname"];
    $email = $_SESSION["email"] ;
    echo $name.", εδώ βρίσκονται οι παραγγελίες σου:<br><br>";
    try {
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->orders;
        $collection = $db->orderinfo; 
        
        $n= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db2 = $n->stores;
        $coll2 = $db2->storeinfo;
        
        $record = $collection->find(array('email'=>$email));
     
        foreach ($record as $order) {
            $oID = $order['_id'];
            $oDATE = $order['date'];
            $oDATE = showdatefn($oDATE);
            $cancelDate=date('d-m-Y H:i:s', strtotime( $oDATE . " +1 days"));
            
            //echo $oDATE."<br>";
            $i=0;
            $p=array();
            foreach ($order['Products'] as $product) {    
                $p[$i] = $product;
                $i++;
            }   
            
            $rec = $coll2->find(array('AFM'=>$p[0]));
            foreach($rec as $store) {
                $sName = $store['Name'];
            }
            
            $recc = $coll2->findOne(array(
                    "AFM"=>$p[0], 
                    "Products.pTHUMBNAIL"=>$p[1]));
            
            foreach ($recc['Products'] as $product) {
                $p[1]=$product['pNAME'];
            }
                      
            date_default_timezone_set("Europe/Athens");
            $currDate=date("d-m-Y H:i:s");
            $d1 = new DateTime($currDate);
            $d2 = new DateTime($cancelDate);
            $interval = $d1->diff($d2);
            $diffInSeconds = $interval->s; 
            $diffInMinutes = $interval->i; 
            $diffInHours   = $interval->h; 
            $diffInDays    = $interval->d; 

            
            echo '<div class="row">
            <div class="col-9">
                <table>
                <tr>
                <th>Order Date</th>
                <th>'.$oDATE.'</th>
                </tr>
                <tr>
                <th>Store Name</th>
                <th>'.$sName.'</th>
                </tr>
                <tr>
                <th>Item Ordered</th>
                <th>'.$p[1].'</th>
                </tr>
                <tr>
                <th>Quantity</th>
                <th>'.$p[2].'</th>
                </tr>
                <tr>
                <th>Size</th>
                <th>'.$p[3].'</th>
                </tr>
                </table>
            </div>';
            echo '<div class="col-3">';
            if ($diffInMinutes>0 && $diffInDays==0) {
                echo ' <p>Έχεις '.$diffInHours.' ώρες και '.$diffInMinutes.' λεπτά για να ακυρώσεις την παραγγελία σου.</p>';
                echo '
                    <form action="assets/includes/orders_action.php" method="post">
                    <input type="hidden" name="orderID" value="'.$oID.'">
                    <button type="submit" class="btn2 cancel name="delOrder">Ακύρωση</button>
                    </form>';
            } else {
                echo '<p>Έχουν παρέλθει οι 24 ώρες και ως εκ τούτου δεν μπορείς να ακυρώσεις αυτήν την παραγγελία.</p>';
            }
            echo   ' </div></div><br>';
                   
        }



    } catch (Exception $e){
       echo "error";
    }  
}

function showdatefn($mili)
{   
    $seconds = (string)$mili / 1000;
    return date("d-m-Y H:i:s", $seconds); 
}  



?>