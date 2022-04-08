<?php
require_once 'library.php'; 
require($_SERVER['DOCUMENT_ROOT'].'/pricedoc/vendor/autoload.php');

if(isset($_POST['editStore'])){
    //$storeID         = $_POST['storeID'];
    $storeName      = $_POST['changeSName'];
    $storeAFM       = $_POST['changeSAFM'];
    $storeDOY       = $_POST['changeSDOY'];
    $storeAddress   = $_POST['changeSAddr'];
    $storeTEL       = $_POST['changeSTEL'];

    $arrays = array(
        "Name"      => $storeName,
        "DOY"       => $storeDOY,
        "Address"   => $storeAddress,
        "TEL"       => $storeTEL
    );

    $query = chkStore($storeAFM);
    if(!$query){
        try{
            $m= new MongoDB\Client ("mongodb://127.0.0.1/");
            $db = $m->stores;
            $collection = $db->storeinfo; 
            $collection->updateOne(array("AFM"=>$storeAFM),array('$set'=>$arrays));

            echo '
            <script type="text/javascript">
            alert("Το κατάστημα ενημερώθηκε."); 
            window.location.href = "/pricedoc/index.php";</script>';   
        }
        catch (Exception $e){
            die("Error. Couldn't connect to the server. Please Check");
        }


        }
   else{
       echo '
        <script type="text/javascript">
        alert("Ανεπιτυχής προσπάθεια ενημέρωσης καταστήματος. Το ΑΦΜ χρησιμοποιείται ήδη!"); 
        window.location.href = "/pricedoc/index.php";</script>';   

   }
}

if(isset($_POST['deleteStore'])){
    $storeAFM  = $_POST['changeSAFM'];
  
    $query = chkStore($storeAFM);
    if(!$query){
        try{
            $m= new MongoDB\Client ("mongodb://127.0.0.1/");
            $db = $m->stores;
            $collection = $db->storeinfo; 
            $collection->deleteMany(array("AFM"=>$storeAFM));

            echo '
            <script type="text/javascript">
            alert("Το κατάστημα διαγράφθηκε."); 
            window.location.href = "/pricedoc/index.php";</script>';   
        }
        catch (Exception $e){
            die("Error. Couldn't connect to the server. Please Check");
        }


        }
   else{
       echo '
        <script type="text/javascript">
        alert("Ανεπιτυχής προσπάθεια διαγραφής καταστήματος."); 
        window.location.href = "/pricedoc/index.php";</script>';   

   }
}

?>