<?php
error_reporting(0);

    //fetch selected product
    if (isset($_GET['pTHUMBNAIL&VAT'])) {
         $komatia = explode("&", $_GET['pTHUMBNAIL&VAT']);
        $pThumb = $komatia[0];
        $pStoreAFM = $komatia[1];
        try {
            require($_SERVER['DOCUMENT_ROOT'].'/pricedoc/vendor/autoload.php');
            $m= new MongoDB\Client ("mongodb://127.0.0.1/");
            $db = $m->stores;
            $collection = $db->storeinfo; 
            
            $products = $collection->findOne(array("AFM" => $pStoreAFM, "Products.pTHUMBNAIL" => $pThumb));

            $flag=false;
            $pr=array();
            if($products){
                  foreach ($products['Products'] as $product) {
                    if ($product['pTHUMBNAIL'] == $pThumb) {  
                        $pr[1]=(string)$product['_id'];
                        $pr[2]=$product['pID'];
                        $pr[3]=$product['pNAME'];
                        $pr[4]=$product['pPRICE'];
                        $pr[5]=$product['pBRAND'];
                        $pr[6]=$product['pDESCRIPTION'];
                        $pr[7]=$product['pSIZE'];
                        $pr[8]=$product['pDEPARTMENT'];
                        $pr[9]=$product['pTHUMBNAIL'];
                        $pr[10]=$product['pQUANTITY'];
                        $flag=true;
                        break;
                    }
                } 
                $stores = $collection->find(array("AFM" => $pStoreAFM,"Products.pTHUMBNAIL" => $pThumb));
                $i=1;
                $str=array();
                foreach ($stores as $store) {
                    $str[$i] = $store['AFM'];
                    $str[$i+1] = $store['Name'];
                    $str[$i+2] = $store['Address'];
                    $str[$i+3] = $store['TEL'];
                    $i += 4;
                }
            }                 
        } catch (Exception $e) {
            echo "error";
        }
        
        if($flag==false) {
             header("Location: /pricedoc/index.php");
        }
        
    } else {
        header("Location: /pricedoc/index.php");
    }   
?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include("assets/includes/head.php"); ?>
<title>Price Doc | <?php echo $pr[3] ?></title>
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
    <section class="breadcrumb-section-product set-bg2" data-setbg="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2><?php echo $pr[3]?></h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <a href="./marketplace.php">Marketplace</a>
                            <span><?php echo $pr[8]?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="contact-section spad">
        <div class="container">
        <div class="section-title"><span>Ανασκοπηση προϊοντος</span></div>    
            <div class="row">
                <div class="col-lg-6">
                    <!-- Left Column -->
                    <div>
                        <?php
                            echo '<img class="product-image" src="'.$pr[9].'" alt="product">';
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                      <!-- Right Column -->
                      <div class="right-column">

                        <!-- Product Description -->
                        <div class="product-preview-description">
                          <span>Category: <?php echo $pr[8]?></span>
                          <h1><?php echo $pr[3]?></h1>
                            <br>
                          <h2>Brand: <?php echo $pr[5]?></h2>
                          <p>Product Description:<br><?php echo $pr[6]?></p>
                             <br>
                        </div>
                       
                        <!-- Product Configuration -->
                        <div class="product-preview-configuration">
                            
                          <!-- Cable Configuration -->
                          <div class="product-preview-config">
                            <span>Available sizes from selected store:</span>
                              <span style="color:beige;"><?php echo $str[2]?></span>

                            <div class="product-preview-choose">
                              <?php 
                                    $pieces = explode(",", $pr[7]);
                                    //echo $pieces[0]; 
                                    //echo $pieces[1]; 
                                    for($i=0; $i<sizeof($pieces); $i++){
                                        echo '
                                            <button>'.$pieces[$i].'</button>
                                            ';
                                    }                              
                                ?>
                            </div>
                              <i class="fas fa-exclamation-triangle"> Κατά την διάρκεια της παραγγελίας θα χρειαστεί στα σχόλια να προσδιορίσετε το μέγεθος αφού πρώτα έχετε επιβεβαιωθεί οτι το κατάστημα έχει απόθεμα στο μέγεθος της αρεσκείας σας.</i>
                                 <br><br>
                          </div>
                        </div>

                        <!-- Product Pricing -->
                        <div class="product-preview-price">
                          <span>148$</span>
                          <a href="#smoothstores" class="cart-btn">Add to cart</a>
                        </div>
                      </div>
                </div>
                   
            </div>

        </div>
    </section>
    <!-- Product Section End -->
    
    <!-- Commenet Section Begin -->
    <section class="contact-section spad" style="background:black;">
        <div class="container">
            <div class="section-title"><span>Αξιολογησεις προϊοντος</span></div>
            <div class="row">
                <div class="col-lg-6">
                    <h3 style="color:white;"><?php
                        //not finished --- den exw prosvasei ston pCOMMENTS -- positional selector?
                        try {
                            $m= new MongoDB\Client ("mongodb://127.0.0.1/");
                            $db = $m->stores;
                            $collection = $db->storeinfo; 
                            $storez = $collection->find(array(
                                "Products.pTHUMBNAIL" => $pThumb,
                                "Products.pCOMMENTS"=> array('$exists' => true)));
                            $o=1;
                            $afm=array();
                            foreach ($storez as $stor) {
                                $afm[$o] = $stor['AFM'];
                                
                                $record = $collection->findOne(array(
                                    "AFM" => $afm[$o],"Products.pTHUMBNAIL" => $pThumb,
                                 "Products.pCOMMENTS"=> array('$exists' => true)));
                                foreach ($record['Products'] as $pro){
                                    if($pThumb == $pro['pTHUMBNAIL']){
                                        $temp = $pro['pID'];
                                        foreach($pro['pCOMMENTS'] as $comments) {
                                            foreach($comments as $comment) {
                                                $stars = $comment['rating'];
                                                echo '
                                                <div class="comment-box">
                                                    <span>Username: '.$comment['username'].'</span>
                                                    <span class="comment-box-date">Date: '.showdatefn($comment['date']).'</span><br><br>
                                                    <p>Comment: '.$comment['text'].'<br>';
                                                if ($stars>0){
                                                    echo 'Rating: ';
                                                    for ($i=1; $i<=$stars; $i++){
                                                        echo '<i style="color:gold;" class="fa fa-star"></i>';
                                                    }
                                                }
                                                echo    '</p></div><br>';
                                            }
                                        }
                                        
                                    
                                    }
                                }
                                
                                $o += 1;
                            }

                        } catch (Exception $e) {
                            echo "error".$e;
                        }
                    ?></h3>

                </div>
                
                <?php
                    if(chkLogin()) { $username = $_SESSION["uname"]; } 
                    else { $username = "guest"; }
                ?>
                <div class="col-lg-6">
                    <div class="container pb-cmnt-container">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                <form class="form-inline" method="post" action="/pricedoc/assets/includes/comment.php">
                                    <textarea name="text" placeholder="Write your comment here!" class="pb-cmnt-textarea" required></textarea>
                                    <div class="rating">
                                        <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
                                        <label for="star5" >☆</label>
                                        <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
                                        <label for="star4" >☆</label>
                                        <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
                                        <label for="star3" >☆</label>
                                        <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
                                        <label for="star2" >☆</label>
                                        <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" / checked>
                                        <label for="star1" >☆</label>
                                        <div class="clear"></div>
                                    </div>
                                    <div>
                                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                                        <input type="hidden" name="pid" value="<?php echo $pr[1]; ?>">
                                        <button class="btn btn-primary" name="commentSubmit" type="sumbit">Share</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Comment Section End -->
    
    <!-- Stores Section Begin -->
    <section id="smoothstores" class="contact-section spad">
        <div class="container">
            <div class="section-title"><span>Καταστήματα</span></div>
            <?php
            
            try{ 
                $m= new MongoDB\Client ("mongodb://127.0.0.1/");
                $db = $m->stores;
                $collection = $db->storeinfo; 
                $stores2 = $collection->find(array("Products.pTHUMBNAIL" => $pThumb));
                $y=1;
                $str2=array();
                foreach ($stores2 as $store2) {
                    $str2[$y] = $store2['AFM'];
                    $str2[$y+1] = $store2['Name'];
                    $str2[$y+2] = $store2['Address'];
                    $str2[$y+3] = $store2['TEL'];
                    $prds = $collection->findOne(array(
                        "AFM" => $str2[$y],"Products.pTHUMBNAIL" => $pThumb));
                    foreach ($prds['Products'] as $prd){
                        if($pThumb == $prd['pTHUMBNAIL']){
                            $str2[$y+4] = $prd['pPRICE'];
                            $str2[$y+5] = $prd['pSIZE'];
                            $str2[$y+6] = $prd['pQUANTITY'];
                        }
                       
                    }
                    $y += 7;
                }
                for($x=1; $x<sizeof($str2); $x+=7){
                    echo'
                    <div class="store row">
                        <div class="col-lg-3">
                            <i class="fas fa-building"></i><span>'.$str2[$x+1].'</span><br>
                            <i class="fas fa-map-marked-alt"></i><span>'.$str2[$x+2].'</span><br>
                            <i class="fas fa-phone"></i><span>'.$str2[$x+3].'</span><br>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="col-lg-3">
                            <i class="far fa-check-circle"></i><span>Μεγέθη: '.$str2[$x+5].'</span><br>
                            <i class="far fa-check-circle"></i><span>Τεμάχια: '.$str2[$x+6].'</span><br>
                        </div>
                        <div class="col-lg-3">
                            <table>
                            <tr>
                                <td><i class="fas fa-tags"></i></td>
                                <td><span>Αρχική Τιμή</span></td>
                                <td><span>'.$str2[$x+4].' €</span></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-shipping-fast"></i></td>
                                <td><span>Μεταφορικά</span></td>
                                <td><span>+0 €</span></td>
                            </tr>
                            <tr style="border-bottom: 1px solid black;">
                                <td><i class="fas fa-hand-holding-usd"></i></td>
                                <td><span>Αντικαταβολή</span></td>
                                <td><span>+0 €</span></td>
                                <td class=bottomborder></td>

                            </tr> 
                            <tr>
                                <td><i class="fas fa-dollar-sign"></i></td>
                                <td><span>Τελική Τιμή</span></td>
                                <td><span>'.$str2[$x+4].' €</span></td>
                            </tr> 
                        </table>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2">
                            <br>
                            <form method="POST" action="/pricedoc/index.php">
                                <input type="hidden" name="addCartAFM&pThumb" 
                                    value="'.$str2[$x].'&'.$pThumb.'">
                                <input type="submit" class="cart-btn" name="addToCart"
                                    value="Add to Cart">
                            </form>
                        </div>
                    </div>';
                }
                
            }catch (Exception $e){
                echo 'error'.$e;
            }
            
                
            ?>
        </div>
    </section>
    <!-- Stores Section End -->
    

    <!-- Footer Section Begin -->
     <?php include("assets/includes/footer.php"); ?>
    <!-- Footer Section End -->


</body>

</html>