<?php
require_once 'library.php'; 
require($_SERVER['DOCUMENT_ROOT'].'/pricedoc/vendor/autoload.php');
   
if(isset($_POST['regProduct'])){
    
    $AFM    = $_POST['sendAFM'];
    $pName  = $_POST['inputProductName'];
    $pPrice = $_POST['inputPrice'];
    $pBrand = $_POST['inputProductBrand'];
    $pDesc  = $_POST['inputDescription'];
    $pSize  = $_POST['inputSize'];
    $pDep   = $_POST['inputDepartment'];
    $pThumb = $_POST['inputThumbnail'];
    $pQuant = $_POST['inputQuantity'];


    try{
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->stores;
        $collection = $db->storeinfo; 

        //FIND COUNTER
        $result = $collection->findOne(
                [ 'AFM'=>$AFM ],
                [ '$inc' => [ 'nextProductCounter' => 1] ],
                [ 'upsert' => true,
                  'projection' => [ 'nextProductCounter' => 1 ],
                  'returnDocument' => MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER
                 ]
            );
        $currInc = $result['nextProductCounter'];
        //echo "currInc : ".$currInc;

        $uniqID = $AFM."/".$currInc;
        
        //ADD PRODUCT
        $collection->updateOne(
            ['AFM'=>$AFM],
            [
                '$push' => [
                    "Products"  => 
                    [
                        '_id'          => new \MongoDB\BSON\ObjectID(),
                        "pID"          => $uniqID,
                        "pNAME"        => $pName,
                        "pPRICE"       => $pPrice,
                        "pBRAND"       => $pBrand, 
                        "pDESCRIPTION" => $pDesc,
                        "pSIZE"        => $pSize,
                        "pDEPARTMENT"  => $pDep,
                        "pTHUMBNAIL"   => $pThumb,
                        "pQUANTITY"    => $pQuant
                    ]
                ]
            ]
        );
        //echo "<br>ok";

        //INCR COUNTER
        $nextInc = $collection->findOneAndUpdate(
                    [ 'AFM'=>$AFM ],
                    [ '$inc' => [ 'nextProductCounter' => 1] ],
                    [ 'upsert' => true,
                      'projection' => [ 'nextProductCounter' => 1 ],
                      'returnDocument' => MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER
                     ]
                );

        $nextInc = $result['nextProductCounter'];
        //echo "<br>nextInc : ".$nextInc;

        echo '
        <script type="text/javascript">
        alert("Το προιον προστέθηκε."); 
        window.location.href = "/pricedoc/index.php";</script>';   
    }
    catch (Exception $e){
        die("Error. Couldn't connect to the server. Please Check");
    }

           
} else {
        echo '
            <script type="text/javascript">
            alert("error"); 
            window.location.href = "/pricedoc/index.php";</script>';  
    }

?>