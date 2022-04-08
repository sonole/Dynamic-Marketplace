<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include("assets/includes/head.php"); ?>
<title>Price Doc | Home</title>
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
     
    <!-- Carousel Begin -->
    <section class="hero-section">
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="assets/img/hero/hero1.jpg">
                <div class="container"> 
                    <div class="row">
                        <div class="col-lg-6">
                            <br><br><br><br><br>
                            <div class="hi-text">
                            <h1> <a href="marketplace.php#smoothsearch">search bar</a></h1>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="hi-text">
                                <span>Αναζητηση με 1 click</span>
                                <h1>Eφτασε η φθινοπωρινη <strong>collection</strong></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="assets/img/hero/hero2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Ψαχνεις για ανδρικα ρουχα?</span>
                                <h1>Γινε <strong>κομψος</strong><br />
                                    Γινε <strong>GNTM</strong></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="assets/img/hero/hero3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Ψαχνεις για γυναικεια ρουχα?</span>
                                <h1>Explore <strong>Yourself</strong><br /> 
                                    Explore Your <strong>Style</strong></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Carousel End-->

    <!-- About US Section Begin -->
    <section class="aboutus-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="about-video set-bg" data-setbg="assets/img/banner/about-us.jpg">
                        <button id="btn222" class="play-btn video-popup" onclick="myFunc()"><i class="fa fa-caret-right"></i></button>
                        <div style="display:none" id="myDIV"> 
                            <iframe  width="760" height="515" src="https://www.youtube.com/embed/yGWK4jVxbOE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <script>
                            function myFunc() {
                              var x = document.getElementById("myDIV");
                              if (x.style.display === "none") {
                                x.style.display = "block";
                                y = document.getElementById("btn222");
                                y.style.display = "none";
                              } else {
                                x.style.display = "none";
                              }
                            }
                        </script>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>ΦΙΛΟΣΟΦΙΑ</h2>
                        </div>
                        <div class="at-desc">
                            <p>
                                Πιστεύουμε σε έναν κόσμο όπου έχετε απόλυτη ελευθερία να είστε εσείς, χωρίς κρίση. Για να πειραματιστείτε. Για να εκφραστείτε. 
                                Για να είσαι γενναίος και να αρπάξεις τη ζωή ως μια περιπέτεια. 
                                Γι 'αυτό διασφαλίζουμε ότι ο καθένας από εσας έχει την ίδια ευκαιρία να ανακαλύψει όλα τα καταπληκτικά πράγματα - ανεξάρτητα από το ποιοι είναι ή από πού προέρχονται.<br />
                                <strong>Είμαστε εδώ για να σας δώσουμε την αυτοπεποίθηση να είστε όποιος θέλετε.</strong></p>
                            <p>
                                
                            </p>
                        </div>
                        <div class="about-bar">
                            <div class="ab-item">
                                <p>Customer care</p>
                                <div id="bar1" class="barfiller">
                                    <span class="fill" data-percentage="100"></span>
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ab-item">
                                <p>Quality</p>
                                <div id="bar2" class="barfiller">
                                    <span class="fill" data-percentage="100"></span>
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ab-item">
                                <p>Explore Iconic Styles</p>
                                <div id="bar3" class="barfiller">
                                    <span class="fill" data-percentage="100"></span>
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About US Section End -->
    
    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Testimonial</span>
                        <h2>Our cilent say</h2>
                    </div>
                </div>
            </div>
            <div class="ts_slider owl-carousel">
                <div class="ts_item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="ti_pic">
                                <img src="assets/img/testimonial/testimonial1.jpg" alt="">
                            </div>
                            <div class="ti_text">
                                <p>To καλύτερο customer service που είχα ποτέ στην ζωή μου!!!</p>
                                <h5>Alex Paliampelos aka Le</h5>
                                <div class="tt-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div></div></div></div></div>
                <div class="ts_item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="ti_pic">
                                <img src="assets/img/testimonial/testimonial2.jpg" alt="">
                            </div>
                            <div class="ti_text">
                                <p>Φθηνά ρούχα για να ανεώσεις το style σου από άπειρα μαγαζιά.<br>
                                    Πάρα πολλές επιλογές, το συνιστώ!</p>
                                <h5>Mr.Nidro</h5>
                                <div class="tt-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div></div></div></div></div>
                <div class="ts_item">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="ti_pic">
                                <img src="assets/img/testimonial/testimonial3.jpg" alt="">
                            </div>
                            <div class="ti_text">
                                <p>Πως γίνεται ένα τόσο καλό κατάστημα να μην είναι γνωστό;;;<br>Είναι σαν να λέμε το skroutz αλλά για ρούχα.<br>Επίσης πολύ καλή η σελίδα τους... Όποιος την έφτιαξε είναι θεούλης!!</p>
                                <h5>Jpazzo Zachos</h5>
                                <div class="tt-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div></div></div></div></div>
            </div>
        </div>
    </section>
    
    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="assets/img/banner/banner3.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text">
                        <h2>Επικοινωνηστε μαζι μας</h2>
                        <div class="bt-tips" style="color: white;">Επωφεληθειτε απο τις ανταγωνιστικες μας τιμες και υπηρεσιες.</div>
                        <a href="/pricedoc/contact-us.php" class="primary-btn  btn-normal">Επικοινωνια</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Footer Section Begin -->
    <?php include("assets/includes/footer.php"); ?>
    <!-- Footer Section End -->


</body>

</html>