<section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div style="text-align: center;" class="fs-about">
                        <div class="fa-logo">
                            <a href="./index.php"><img src="assets/img/logo.png" alt="logo"></a>
                        </div>
                        <?php
                        if(chkAdmin()){
                        ?>
                            <p>Ειδική σελίδα διαχείρισης για την προβολή των εγγεγραμμένων μελών:</p>
                            <button class="open-button" onclick="openAdmin()">ADMIN AREA</button>
                        <?php
                        } else {
                        ?>   
                            <div class="fa-logo">
                            <a href="#"><img src="assets/img/footer/mastercard.png" width="65%" alt="mastercard"></a>
                            <a href="#"><img src="assets/img/footer/american.png" width="85%" alt="american"></a>
                            <br>
                            <a href="#"><img src="assets/img/footer/visa.png" width="85%" alt="visa"></a>
                            <a href="#"><img src="assets/img/footer/paypal.png" width="85%"  alt="paypal"></a>  
 
                        </div>
                        <?php
                        }
                        ?>
                       
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="fs-widget">
                        <h4>Χρήσιμοι σύνδεσμοι</h4>
                        <ul>
                            <?php
                                if(chkLogin()){
                                    echo '
                                    <button class="open-button" onclick="openOrders()">orders</button>';
                                }
                            ?>
                            <li><a href="./marketplace.php">MarketPlace</a></li>
                            <li><a href="./faqs.php">FAQS</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="fs-widget">
                        <h4>Υποστήριξη</h4>
                        <ul>
                            <?php
                            if(chkLogin()){
                            ?>
                                <form method="post" action="">
                                    <input  class="open-button" type="submit" name="logout" value="Logout!">
                                </form>
                                <p style="color:white;">
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
                                <br/>
                                <button style="margin-top:10px;" class="open-button" onclick="openLoginForm()">Log In</button>    
                            <?php
                            }
                            ?>
                            <li><a href="./contact-us.php">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Department Of Digital Systems | 
                            <a href = "mailto: alexandrospaliampelos@gmail.com">Alexandros Paliampelos E16099</a></p>
                    </div>
                </div>
            </div>
        </div>
</section>

    <!-- Js Plugins -->
        
    <script src="assets/js/main.js"></script>   
    <script src="assets/js/voicesearch.js"></script>
