<?php

    require_once 'assets/includes/library.php';

    if(isset($_POST['logout'])){
        $var = removeall();
    }
?>
<header class="header-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="./index.php">
                        <img src="assets/img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <?php include("menu.php"); ?>
            </div>
            <div class="col-lg-3">
                <div class="top-option">
                    <div class="to-social">
                        <?php
                        if(chkAdmin()){
                        ?>
                            <button class="open-button" style="margin-bottom:5px;" onclick="openAdmin()">ADMIN AREA</button>
                        <?php
                        }
                        if(chkLogin()){
                        ?>
                            <form method="post" action="">
                                <input  class="open-button" style="margin-bottom:5px;"
                                       type="submit" name="logout" value="Logout!">
                            </form>
                            <p style="color:white;margin-bottom:5px;">
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
                        <a href="https://www.facebook.com/alessandropalia" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.instagram.com/alessandro_paliampelos/" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="mailto: alexandrospaliampelos@gmail.com"><i class="fa fa-envelope"></i></a><br>    
                        <a href="/pricedoc/cart.php"><i class="fas fa-shopping-cart">
                        <?php 
                            cart();
                            if(isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo '
                                <span id="cart_count" class=" bg-light">'.$count.'</span>
                                ';
                            } else {
                                echo '
                                <span id="cart_count" class=" bg-light">0</span>
                                ';
                            }
                        ?>
                        </i></a>  

                    </div>
                </div>
            </div>
        </div>
        <div class="canvas-open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>