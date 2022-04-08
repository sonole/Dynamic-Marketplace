<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include("assets/includes/head.php"); ?>
<title>Price Doc | MarketPlace</title>
<!-- Head -->

    
<body >
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
    <section class="breadcrumb-section set-bg" data-setbg="assets/img/banner/banner1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>MarketPlace</h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <span>MarketPlace</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
    
    <!-- Products -->


    <!-- MarketPlace Begin -->
    <section class="marketplace-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <?php
                            if(productCount() > 0) {
                                echo "<span>".productCount()." Total Products</span>";
                            } else {
                                echo "<span> No products to show<br>
                                    Please register products first</span>";
                            }
                        ?>
                        <h2>Products</h2>
                        <br>
                        <div id="smoothsearch" class="searchbar">
                            <form  id="search-form">
                                <input name="q" type="text" id="myInput" onkeyup="myFunction()"
                                    placeholder="Πληκτρολόγησε ή πατήστε το μικρόφωνο για voice search!" title="search bar" autocomplete="off" autofocus>
                                <!-- <button type="button"><i class="fas fa-microphone"></i></button> -->
                                <p class="info"></p>
                            </form>
                        </div>
                    </div>
                    
                    <ul id="myUL" class="products">
                        <?php
                            showProducts();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- BMI Calculator Section End -->

    <!-- Footer Section Begin -->
     <?php include("assets/includes/footer.php"); ?>
    <!-- Footer Section End -->


</body>

</html>