<div class="form-popup" id="editProductForm">
 <div class="product-container">
    <h4>Τροποποίηση Προιόντος</h4>
    <b>3ο Βήμα</b>
    <hr>
     <form action="assets/includes/editproduct_action.php" method="post" class="product-container">
         
     <?php
        if(isset($_POST['postVAT']) and isset($_POST['product'])){
            $VAT     = $_POST['postVAT'];
            $pID     = $_POST['product'];
            echo "Επιλέχθηκε:<br>";
            echo "<b>ΑΦΜ --> ".$VAT."</b><br>";
            echo "<b>Προιον --> ".$pID."</b><br><br>";
            
            $pieces = explode("/", $pID);
            //echo $pieces[0]; // piece1 --> AFM ONLY        --> 099360444
            //echo $pieces[1]; // piece2 --> PRODUCT NO ONLY --> 2
            $productNO = $pieces[1];
            
             try{
                $m= new MongoDB\Client ("mongodb://127.0.0.1/");
                $db = $m->stores;
                $collection = $db->storeinfo;   
                $products = $collection->findOne(array("AFM"=>$VAT, "Products.pID" => $pID));
                if($products){
                    $i = 1;
                    $flag=false;
                    $pr= array();
                    foreach ($products['Products'] as $product) {
                        $t = $product['pID'];
                        $pieces2 = explode("/", $t);
                        $test = $pieces2[1];
                        
                        //echo "<br>i->".$i."  test->".$test." pNO->".$productNO."<br>";
                        if($test == $productNO){
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
                        $i++;
                    }

                    //echo $pr[1]." ".$pr[2]." ".$pr[3];
                } else {
                    echo "Δεν βρέθηκαν προιοντα στο κατάστημα";
                }
            } catch (Exception $e){
                echo "error";
            }  
        } else {
            //echo "Δεν έχεις ακολουθήσει τα βήματα.<br><br>";
            ?>
            <script>
            closeEditProductForm();
            </script>
            <?php    
        }
     ?>
        <input type="hidden"  id="send_VAT" name="send_VAT" value="<?php echo $VAT ?>">
        <input type="hidden"  id="send_PID" name="send_PID" value="<?php echo $pr[1] ?>">
        <input type="hidden"  id="sendProductID" name="sendProductID" value="<?php echo $pr[2] ?>">
        
        <div class="form-group form-inline"> 
            <input type="text" id="changeProductName" name="changeProductName" 
                   value="<?php echo $pr[3] ?>" required>
            <label for="changeProductName"><b>Ονομα</b></label>
        </div>
        
        <div class="form-group form-inline"> 
            <input type="text"  id="changeProductPrice" name="changeProductPrice" 
                   value="<?php echo $pr[4] ?>" required>
            <label for="changeProductPrice"><b>Τιμή</b></label>
        </div>
        
        <div class="form-group form-inline">
            <input type="text" id="changeProductBrand" name="changeProductBrand" 
                   value="<?php echo $pr[5] ?>" required> 
            <label for="changeProductBrand"><b>Μάρκα</b></label>
        </div>
        
        <div class="form-group form-inline"> 
            <input type="text"  id="changeProductDescription" name="changeProductDescription" 
                   value="<?php echo $pr[6] ?>" required>
            <label for="changeProductDescription"><b>Περιγραφή</b></label>
        </div>
        
        <div class="form-group form-inline">
            <input type="text"  id="changeProductSize" name="changeProductSize" 
                   value="<?php echo $pr[7] ?>" required>
            <label for="changeProductSize"><b>Μέγεθος</b></label>
        </div>
        
        <div class="form-group form-inline">
            <input type="text"  id="changeProductDepartment" name="changeProductDepartment" 
                   value="<?php echo $pr[8] ?>" required>
            <label for="changeProductDepartment"><b>Τμήμα</b></label>    
        </div>
        
        <div class="form-group form-inline"> 
            <input type="text"  id="changeProductThumbnail" name="changeProductThumbnail" 
                   value="<?php echo $pr[9] ?>" required>
            <label for="changeProductThumbnail"><b>Thumbnail</b></label>
        </div>
         
         <div class="form-group form-inline"> 
            <input type="text"  id="changeProductQuantity" name="changeProductQuantity" 
                   value="<?php echo $pr[10] ?>" required>
            <label for="changeProductQuantity"><b>Quantity</b></label>
        </div>

        <button type="submit" class="btn" name="editProduct" 
            onclick="return confirm('Θέλεις σίγουρα να τροποποιήσεις το προιον?');">Τροποποίηση Προιόντος</button>
        <button type="submit" class="btn" name="deleteProduct" 
            onclick="return confirm('Θέλεις σίγουρα να διαγράψεις το προιον?');">Διαγραφή Προιόντος</button>

     </form>
    <button type="button" class="btn cancel" onclick="closeEditProductForm()">Ακύρωση</button>
  </div>
</div>