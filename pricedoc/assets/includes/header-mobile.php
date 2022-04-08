<?php

    require_once 'assets/includes/library.php';

    if(isset($_POST['logout'])){
        $var = removeall();
    }
?>
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="fa fa-close"></i>
    </div>
    <?php include("menu-mobile.php"); ?>
    <div id="mobile-menu-wrap"></div>
                    <div class="logo">
                    <br>
                    <a href="./index.php">
                        <img src="assets/img/logo-black-tagline.png" alt="">
                    </a>
                </div>
    <div class="canvas-social">
                            <?php
                        if(chkAdmin()){
                        ?>
                            <button class="open-button" onclick="openAdmin()">ADMIN AREA</button>
                        <?php
                        }
                        if(chkLogin()){
                        ?>
                            <form method="post" action="">
                                <input  class="open-button" type="submit" name="logout" value="Logout!">
                            </form>
                            <p style="color:black;">
                            <?php
                            echo "Έχεις συνδεθεί !<br>";
                            $name = $_SESSION["uname"];
                            echo "Καλώς ήρθες, $name !!!";
                            ?>
                            </p>
                        <?php
                        }else {
                        ?>
                            <button class="open-button" onclick="openRegForm()">Register</button>
                            <button class="open-button" onclick="openLoginForm()">Log In</button>    
                        <?php
                        }
                        ?>
        <br>
        <a href="https://www.facebook.com/alessandropalia" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="https://www.instagram.com/alessandro_paliampelos/"  target="_blank"><i class="fa fa-instagram"></i></a>
        <a href="mailto: alexandrospaliampelos@gmail.com"><i class="fa fa-envelope"></i></a>
    </div>
</div>