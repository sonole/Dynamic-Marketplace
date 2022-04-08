<?php
require_once 'library.php'; 
require($_SERVER['DOCUMENT_ROOT'].'/pricedoc/vendor/autoload.php');

if(isset($_POST['orderID'])){

    $oID = $_POST['orderID'];

    try{
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->orders;
        $collection = $db->orderinfo; 
        $collection->deleteOne( array( '_id' => new MongoDB\BSON\ObjectId ($oID )) );
        echo '
        <script type="text/javascript">
        alert("Πραγματοποιήθηκε ακύρωση της παραγγελίας"); 
        window.location.href = "/pricedoc/index.php";</script>';   
    }
    catch (Exception $e){
        die("Error. Couldn't connect to the server. Please Check");
    }
}  else {
           echo '
            <script type="text/javascript">
            alert("Ανεπιτυχής διαγραφή παραγγελίας!"); 
            window.location.href = "/pricedoc/index.php";</script>';   

}

?>