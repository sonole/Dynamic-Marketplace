<?php
    require_once 'library.php';
?>

<div class="form-popup" id="regForm">
  <form action="assets/includes/register_action.php" method="post" class="form-container">
    <h2>Εγγραφή</h2>
    <br>
      
    <label for="inputFname3"><b>First Name</b></label>
    <input type="text" id="inputFname3" name="fname" placeholder="Enter First Name" required>
    
    <label for="inputLname3"><b>Last Name</b></label>
    <input type="text"  id="inputLname3" name="lname" placeholder="Enter Last Name" required>
      
    <label for="inputEmail3"><b>Email</b></label>
    <input type="email" id="inputEmail3" name="email" placeholder="Enter Email" required>

    <label for="inputPassword3"><b>Password</b></label>
    <input type="password" id="pass" name="pass" placeholder="Enter Password" required>
      
    <label for="inputCpassword3"><b>Confirm Password</b></label>
    <input type="password" id="cpass" name="cpass" onblur="chk()" placeholder="Re-Enter Password" required>
    
    <div id="error"></div>
      
    <button type="submit" class="btn" name="reg">Εγγραφή</button>
    <button type="button" class="btn cancel" onclick="closeRegForm()">Close</button>
  </form>
</div>

