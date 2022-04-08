<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include("assets/includes/head.php"); ?>
<title>Price Doc | Cart</title>
<!-- Head -->

    
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Mobile Header / Offcanvas Menu Section Begin -->
    <?php include("assets/includes/header-mobile.php"); ?>
    <!-- Mobile Header / Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <?php include("assets/includes/header.php"); ?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section-product set-bg2" data-setbg="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Cart</h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <span>Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="contact-section spad">
        <div class="container-fluid"  ng-app="">
        <div class="section-title"><span>Ανασκοπηση καλαθιου</span></div>    
            <div class="row px-5 cart-container" >
                <div class="col-md-8">
                    <h2 style="color:white;">Cart Details</h2>
                    <hr style="background-color: #ccc;">
                    <?php 
                        if(isset($_SESSION['cart'])) {
                            $products = array_column($_SESSION['cart'], 'product');
                            $prz=array();
                            $flag=true;
                            $total=0;
                            for($i=0; $i<sizeof($products); $i++){
                                if($total>0){
                                    $flag=false;
                                }
                                $temp = explode("&", $products[$i]);
                                $vat = $temp[0];
                                $pthumb = $temp[1];
                                
                                try {
                                    $m= new MongoDB\Client ("mongodb://127.0.0.1/");
                                    $db = $m->stores;
                                    $collection = $db->storeinfo;  
                                    
                                    $record = $collection->findOne(array(
                                         "AFM" => $vat, "Products.pTHUMBNAIL" => $pthumb));
                                    
                                    
                                    
                                    foreach ($record['Products'] as $cartProduct) {
                                        if ($cartProduct['pTHUMBNAIL'] == $pthumb) {  
                                            $prz[1]=(string)$cartProduct['_id'];
                                            $prz[2]=$cartProduct['pID'];
                                            $prz[3]=$cartProduct['pNAME'];
                                            $prz[4]=$cartProduct['pPRICE'];
                                            $prz[5]=$cartProduct['pBRAND'];
                                            $prz[6]=$cartProduct['pDESCRIPTION'];
                                            $prz[7]=$cartProduct['pSIZE'];
                                            $prz[8]=$cartProduct['pDEPARTMENT'];
                                            $prz[9]=$cartProduct['pTHUMBNAIL'];
                                            $prz[10]=$cartProduct['pQUANTITY'];
                                            cartElement($prz[9], $prz[3], $prz[6], $prz[7], $prz[4], $prz[10],  $vat, $flag, $i);
                                            $total += (integer)$prz[4];
                                            break;
                                        }
                                    }
                                    
                                    
                                } catch (Exception $e){
                                    echo "error-->".$e;
                                }  
                               
                            }
                        } else {
                            echo '<h2 style="color:white;">Cart is empty!</h2>';
                        }
                    ?>
                </div>
                <div class="col-md-3 offset-md-1 border rounded bg-white h-25">
                    <div clas="pt-4">
                        <h2>Λεπτομέρειες Τιμολόγησης</h2>
                        <hr>
                        <div class="row price-details">
                            <div class="col-md-6">
                                <?php
                                    if(isset($_SESSION['cart'])){
                                        $count = count($_SESSION['cart']);
                                        echo '<h4>'.$count.' Item(s)</h4>';
                                    } else {
                                        echo '<h4>0 items</h4>';
                                    }
                                ?>
                                <h4>Μεταφορικά</h4>
                                <h4>Αντικαταβολή</h4>
                                <hr>
                                <h4>Σύνολο</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <h4><?php 
                                    if(isset($_SESSION['cart'])){
                                            echo $total." €"; 
                                    } else{ echo "0 € "; }
                                    ?>
                                </h4>
                                <h4 class="text-success">ΔΩΡΕΑΝ</h4>
                                <h4 class="text-success">ΔΩΡΕΑΝ</h4>
                                <hr>
                                <h4><?php 
                                    if(isset($_SESSION['cart'])){
                                            echo $total." €"; 
                                    } else{ echo "0 € "; }
                                    ?>
                                </h4>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <?php
                                    for($x=0; $x<$i; $x++){
                                        echo '
                                        <span>Αντικέιμενο: <span ng-bind="name'.$x.'"></span></span><br>
                                        <span>Τεμάχια: <span ng-bind="quantity'.$x.'"></span></span><br>
                                        <span>Μέγεθος: <span ng-bind="size'.$x.'"></span></span>
                                        <hr>';
                                    }
                                ?>
            
                                <?php
                                if(isset($_SESSION['cart']) && $total >0 ){
                                    echo '
                                    <button form="pay" type="submit" class="cart-btn" id="paynow">Pay Now</button> ';
                                }
                                ?>
                            <br>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    

    <!-- Footer Section Begin -->
    <?php include("assets/includes/footer.php"); ?>
    <!-- Footer Section End -->


</body>

</html>