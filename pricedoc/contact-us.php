<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include("assets/includes/head.php"); ?>
<title>Price Doc | Contact Us</title>
<!-- Head -->

    
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Mobile Header / Offcanvas Menu Section Begin -->
    <?php include("assets/includes/header-mobile.php"); ?>
    <!-- Mobile Header / Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <?php include("assets/includes/header.php"); ?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="assets/img/banner/banner3.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Contact Us</h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <span>Contact us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title contact-title">
                        <span>Contact Us</span>
                        <h2>ΕΠΙΚΟΙΝΩΝΙΑ</h2>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-text">
                            <i class="fa fa-map-marker"></i>
                            <p>Karaoli & Dimitriou 80, Pireas<br/> 185 34</p>
                        </div>
                        <div class="cw-text">
                            <i class="fa fa-mobile"></i>
                            <ul>
                                <li>210 414 2000</li>
                                <li>210 414 2773</li>
                            </ul>
                        </div>
                        <div class="cw-text email">
                            <i class="fa fa-envelope"></i>
                            <p>alexandrospaliampelos@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form>
                            <input type="text" name="name" placeholder="Το Ονομα σας">
                            <input type="email"  name="email" placeholder="Το Email σας">
                            <input type="text" name="subject" placeholder="Θεμα μηνύματος">
                            <textarea name="message" placeholder="Το μήνυμα σας"></textarea>
                            <button type="submit" name="submit">Αποστολή</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="map">
                <iframe
                        src="https://maps.google.com/maps?width=100%&amp;height=550&amp;hl=en&amp;coord=37.941557662723305,23.652963638305668&amp;q=Karaoli%20ke%20Dimitriou%2080%2C%20Pireas%20185%2034+(University%20of%20Piraeus)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" height="550" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen="">
                </iframe>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
     <?php include("assets/includes/footer.php"); ?>
    <!-- Footer Section End -->


</body>

</html>