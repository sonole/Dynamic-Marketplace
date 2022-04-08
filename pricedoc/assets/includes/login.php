<?php
    require_once 'library.php';
?>
<div class="log-popup" id="loginForm">
<form action="assets/includes/login_action.php" method="post" class="form-container">
    <h2>Σύνδεση</h2>
    <br>
    
    <label for="exampleInputEmail3"><b>Email</b></label>
    <input type="email" id="exampleInputEmail3" name="email" placeholder="Enter Email" required>

    <label for="exampleInputPassword3"><b>Password</b></label>
    <input type="password" id="exampleInputPassword3" name="pass" placeholder="Enter Password" required>

    <button type="submit" class="btn" name="login">Σύνδεση</button>
    <button type="button" class="btn cancel" onclick="closeLoginForm()">Close</button>
  </form>

</div>