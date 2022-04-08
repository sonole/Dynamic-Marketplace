<?php
    require('library.php');
    require('connection.php');
    require($_SERVER['DOCUMENT_ROOT'].'/pricedoc/vendor/autoload.php');
    
    //send mail --xreiazete na pirakseis arxeio tou xamp gia na stelnei apo diko sou gmail
    /*
    $to      = 'nobody@example.com';
    $subject = 'Παραγγελία ';
    $message = 'hello';
    $headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
    */
    
    try {
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->orders;
        $collection = $db->orderinfo; 
        $orderName      = $_POST['name'];
        $orderEmail     = $_POST['email'];
        $_SESSION['post-data'] = $_POST;
        $i=0;
        foreach ($_SESSION['post-data'] as $key=>$val){
            $p = "product".$i;
            $z=$i+1;
            $pQ = "product".$z;
            if(isset($_SESSION['post-data'][$p]) && isset($_SESSION['post-data'][$pQ])){
                $temp = explode("&", $_SESSION['post-data'][$p]);
                $temp2 = explode("&", $_SESSION['post-data'][$pQ]);
                
                $storeVAT = $temp[0];
                $proThumb = $temp[1];
                $proThumb = str_replace("_",".",$proThumb);
                $proType  = $temp[2];
                $proItems  = $temp[3];
                $proSize = $temp2[3];
                
                $arrays = array(
                    "Name"      => $orderName,
                    "email"     => $orderEmail,
                    "date"      => new \MongoDB\BSON\UTCDateTime(time()*1000),
                    "Products" => array( 
                        "Store AFM" => $storeVAT,
                        "Store Product Thumbnail" => $proThumb,
                        "Item(s)" => $proItems, 
                        "Size" => $proSize
                    )
                );
                $collection->insertOne($arrays);

            }
            $i+=2;
        }
        
        //vgalta ola apo to kalathi
        $_SESSION['timeCART'] = 1441;
        
        
        echo '
        <script type="text/javascript">
        sessionStorage.removeItem("clicked4");
        alert("Order completed!"); 
        window.location.href = "/pricedoc/index.php";</script>';  
       
        
        
        
    } catch (Exception $e){
        echo "error".$e;
    }


?>




