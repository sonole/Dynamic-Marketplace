<?php
require_once 'library.php'; 
require($_SERVER['DOCUMENT_ROOT'].'/pricedoc/vendor/autoload.php');

if(isset($_POST['editProduct']) or isset($_POST['deleteProduct'])){
    $pr= array();
    $pr[0]  =   $_POST['send_VAT'];
    $pr[1]  =   $_POST['send_PID'];
    $pr[2]  =   $_POST['sendProductID'];
    $pr[3]  =   $_POST['changeProductName'];
    $pr[4]  =   $_POST['changeProductPrice'];
    $pr[5]  =   $_POST['changeProductBrand'];
    $pr[6]  =   $_POST['changeProductDescription'];
    $pr[7]  =   $_POST['changeProductSize'];
    $pr[8]  =   $_POST['changeProductDepartment'];
    $pr[9]  =   $_POST['changeProductThumbnail'];
    $pr[10] =   $_POST['changeProductQuantity'];
    
}
if(isset($_POST['editProduct'])){

    try{
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->stores;
        $collection = $db->storeinfo; 
        $record = $collection->find(array('AFM'=>$pr[0]));
        foreach ($record as $store) {  
        }
        $storeMongoID=(string)$store['_id'];
        $realStoreProducts = (integer)$store['nextProductCounter']-1;
        
             
        //diagrafi
        $collection->updateOne( 
        array("_id" => new MongoDB\BSON\ObjectId($storeMongoID)),
            array( '$pull' => 
                array(
                    "Products" => array(
                        "_id" => new MongoDB\BSON\ObjectId($pr[1])
                    )
                )
            )
        );
        
        //ADD PRODUCT
        $collection->updateOne(
            ['AFM'=>$pr[0]],
            [
                '$push' => [
                    "Products"  => 
                    [
                        '_id'          => new \MongoDB\BSON\ObjectID(),
                        "pID"          => $pr[2],
                        "pNAME"        => $pr[3],
                        "pPRICE"       => $pr[4],
                        "pBRAND"       => $pr[5],
                        "pDESCRIPTION" => $pr[6],
                        "pSIZE"        => $pr[7],
                        "pDEPARTMENT"  => $pr[8],
                        "pTHUMBNAIL"   => $pr[9],
                        "pQUANTITY"    => $pr[10]
                    ]
                ]
            ]

        );
        
     
        echo '
        <script type="text/javascript">
        alert("Το προιον ενημερώθηκε."); 
        window.location.href = "/pricedoc/index.php";</script>';   
    }
    catch (Exception $e){
        die("Error. Couldn't connect to the server. Please Check");
    }
}

if(isset($_POST['deleteProduct'])){

    try{
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->stores;
        $collection = $db->storeinfo; 
        $record = $collection->find(array('AFM'=>$pr[0]));
        foreach ($record as $store) {  
        }
        $storeMongoID=(string)$store['_id'];
        $realStoreProducts = (integer)$store['nextProductCounter']-1;
        
        //echo "Προιόντα καταστήματος : ".$realStoreProducts."<br><br>" ;
            
        //diagrafi
        $collection->updateOne( 
        array("_id" => new MongoDB\BSON\ObjectId($storeMongoID)),
            array( '$pull' => 
                array(
                    "Products" => array(
                        "_id" => new MongoDB\BSON\ObjectId($pr[1])
                    )
                )
            )
        );
        
        
        //roll back counter
        $collection->updateOne( 
            array("_id" => new MongoDB\BSON\ObjectId($storeMongoID)),
            array( '$set' => 
                array(
                    "nextProductCounter" => $realStoreProducts
                )
            )
        );

        echo '
        <script type="text/javascript">
        alert("Το προιον διαγράφθηκε."); 
        window.location.href = "/pricedoc/index.php";
        </script>';   
    }
    catch (Exception $e){
        die("Error. Couldn't connect to the server. Please Check");
    }
}

?>