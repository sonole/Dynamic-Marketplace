<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>
<?php

    if(isset($_POST['login'])){
//        print_r($_POST);
      
        
        $email = $_POST['email'];
        $upass = $_POST['pass'];
        $criteria = array("Email Address"=> $email);
        $query = $collection->findOne($criteria);
        //var_dump($query);
        if(empty($query)){
            echo '
            <script type="text/javascript">
            alert("Δεν έχετε πραγματοποιήσει εγγραφή με αυτο το email"); 
            window.location.href = "/pricedoc/index.php";</script>';   
        }
        else{
            
                $pass = $query["Password"];
                if(password_verify($upass,$pass)){
                    $var = setsession($email);
//                    echo"<pre>";   
//                    print_r($_SESSION);
                  
                    
                    if($var){
                        
                     header("Location: /pricedoc/index.php");
                    }
                    else{
                        echo '
                        <script type="text/javascript">
                        alert("ERROR"); 
                        window.location.href = "/pricedoc/index.php";</script>';
                    }
                }
                else{
                    echo '
                        <script type="text/javascript">
                        alert("Έχετε εισάγει λάθος password"); 
                        window.location.href = "/pricedoc/index.php";</script>';
                }

        }
    }
    

?>