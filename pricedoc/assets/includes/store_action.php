<?php
    require_once 'library.php'; 
    require($_SERVER['DOCUMENT_ROOT'].'/pricedoc/vendor/autoload.php');
   
    if(isset($_POST['regStore'])){
       
        $storeName      = $_POST['storeName'];
        $storeAFM       = $_POST['storeAFM'];
        $storeDOY       = $_POST['storeDOY'];
        $storeAddress   = $_POST['storeAddress'];
        $storeTEL       = $_POST['storeTEL'];
       
        $arrays = array(
            "Name"      => $storeName,
            "AFM"       => $storeAFM,
            "DOY"       => $storeDOY,
            "Address"   => $storeAddress,
            "TEL"       => $storeTEL,
            "Products" => array()
        );
        
        $query = chkStore($storeAFM);
        if($query){
            
            try{
                //Connect to DB
                $m= new MongoDB\Client ("mongodb://127.0.0.1/");
                //echo "Connection to database Successfull!<br /><br />";

                //Select DB
                $db = $m->stores;
                //echo "Database selected successfully<br><br>";

                //Select collection
                $collection = $db->storeinfo; 
                //echo "Collection selected successfully<br><br>";
                
                //insert store
                $collection->insertOne($arrays);
                
                $collection->findOneAndUpdate(
                    [ 'AFM'=>$storeAFM ],
                    [ '$inc' => [ 'nextProductCounter' => 1] ],
                    [ 'upsert' => true,
                      'projection' => [ 'nextProductCounter' => 1 ],
                      'returnDocument' => MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER
                     ]
                );
                
                echo '
                <script type="text/javascript">
                alert("Το κατάστημα προστέθηκε."); 
                window.location.href = "/pricedoc/index.php";</script>';   
            }
            catch (Exception $e){
                die("Error. Couldn't connect to the server. Please Check");
            }
            

            }
       else{
           echo '
            <script type="text/javascript">
            alert("Ανεπιτυχής προσθήκη καταστήματος. Το ΑΦΜ χρησιμοποιείται ήδη!"); 
            window.location.href = "/pricedoc/index.php";</script>';   

       }
}

?>