<?php
require_once 'connection.php'; 
require_once 'library.php'; 
require($_SERVER['DOCUMENT_ROOT'].'/pricedoc/vendor/autoload.php');

if(isset($_POST['commentSubmit'])){

    try{
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        $db = $m->stores;
        $collection = $db->storeinfo; 
        
        $username = $_POST['username'];
        $text     = $_POST['text']; 
        $rating   = $_POST['star'];
        $pid      = $_POST['pid'];
        
        $new_comm = array(
          "username" => $username,
          "date" =>  new \MongoDB\BSON\UTCDateTime(time()*1000),
          "text" => $text, 
          "rating" => $rating
        );

        
     $collection->updateOne(
          array("Products._id" =>  new MongoDB\BSON\ObjectId($pid)), 
          array('$push' => array("Products.$.pCOMMENTS" => array("Comment"=>$new_comm)))
        );
        echo '
        <script type="text/javascript">
        alert("Το σχόλιο προστέθηκε."); 
        window.location.href = "/pricedoc/marketplace.php";</script>';   
    }
    catch (Exception $e){
        die("Error. Couldn't connect to the server. Please Check");
    }
}


?>