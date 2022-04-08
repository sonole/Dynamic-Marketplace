<?php require_once 'connection.php'; ?>
<?php require_once 'library.php'; ?>

<?php

   if(isset($_POST['reg'])){
       
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $temp  = $_POST['pass'];
        $options = array('cost' => 10);
        $pass = password_hash($temp, PASSWORD_BCRYPT, $options);
    
        $arrays = array(
            
            "First Name"    => $fname,
            "Last Name"     => $lname,
            "Email Address" => $email,
            "Password"      => $pass,
            "Privileges"    => "customer"
        );
        
        $query = chkemail($email);
        if($query){
            register($arrays);
            //header("Location: login.php");
            echo '
            <script type="text/javascript">
            alert("Επιτυχής Εγγραφή."); 
            window.location.href = "/pricedoc/index.php";</script>';   
            }
       else{
           echo '
            <script type="text/javascript">
            alert("Ανεπιτυχής Εγγραφή. Το email χρησιμοποιείται ήδη!"); 
            window.location.href = "/pricedoc/index.php";</script>';   

       }
}

?>