<?php

    require($_SERVER['DOCUMENT_ROOT'].'/pricedoc/vendor/autoload.php');

    try{
        //Connect to DB
        $m= new MongoDB\Client ("mongodb://127.0.0.1/");
        //echo "Connection to database Successfull!<br /><br />";

        //Select DB
        $db = $m->loginreg;
        //echo "Database selected successfully<br><br>";
        
        //Select collection
        $collection = $db->userdata; 
        //echo "Collection selected successfully<br><br>";
    }
    catch (Exception $e){
        die("Error. Couldn't connect to the server. Please Check");
    }
    
    session_start();

    
    //Delete DB
    //$db = $m->dropDatabase("myfirstdb");
    //echo "Database deleted successfully<br><br>";

    //Create collection
    //$collection = $db->createCollection("testtable");
    //echo "Collection created successfully<br><br>";
    
    /*Delete collection
    $collection = $db->testtable;   //select selection|if dosent exists then it is created
    echo "Collection selected successfully<br><br>";
    $collection->drop();
    echo "Collection deleted successfully<br><br>";
    */
    
    /*
    //Create a document
    $document = array(
        "column1" => "11",
        "column2" => "22",
    );
    $collection->insertOne($document);
    echo "Document inserted successfully<br><br>";

    //Find document
    //$cursor = $collection->find();
    //SELECT * FROM testtable WHERE column2=22
    //$cursor = $collection->find(array('column2' => '22'));
    $cursor = $collection->find(array('column2' => array( '$gt' => '12')));
    foreach ($cursor as $document)
        echo $document["column1"]." ";
        echo $document["column2"]." ";
        echo "<br>";
    
    */
    
    
    
?>