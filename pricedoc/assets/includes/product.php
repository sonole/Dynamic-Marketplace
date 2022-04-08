<div class="form-popup" id="regProductForm">
 <div class="product-container">
    <h4>Καταχώρηση Προϊόντος</h4>
    <hr>
    <form name="formSelectStore1" id="formSelectStore1" action="/pricedoc/index.php" method="POST">
        <select name="storePRODUCT" id="storePRODUCT">
            <option value="">Select Store</option>
            <?php storeNames();?>
        </select>
      <input type="submit" value="Υποβολή" id="submit1" onclick="openRegProductForm()" />
    </form> 
     
    <form action="assets/includes/product_action.php" method="post" class="product-container">
    <?php
            if(isset($_POST['storePRODUCT']) and $_POST['storePRODUCT'] != ''){

                $storeAFM = $_POST['storePRODUCT'];
                echo "Επιλέχθηκε ΑΦΜ --> ".$storeAFM; 

                $m= new MongoDB\Client ("mongodb://127.0.0.1/");    
                $db = $m->stores;
                $collection = $db->storeinfo; 
                $record = $collection->find(array('AFM'=>$storeAFM));
                foreach ($record as $store) {  
                    //echo "id         : ".$store['_id']."<br>";
                    //echo "Store Name : ".$store['Name']."<br>";
                    //echo "AFM        : ".$store['AFM']."<br>";
                    //echo "DOY        : ".$store['DOY']."<br>";
                    //echo "Address    : ".$store['Address']."<br>";
                    //echo "TEL        : ".$store['TEL']."<br>";
                }
                
                echo "<br>Κατάστημα : ".$store['Name']."<br>";
                $realStoreProducts = $store['nextProductCounter']-1;
                echo "Προιόντα καταστήματος : ".$realStoreProducts."<br><br>" ;
            
        ?>   
        
        <input type="hidden"  id="sendAFM" name="sendAFM" value="<?php echo $storeAFM ?>">
        
        <div class="form-group form-inline"> 
            <input type="text" id="inputProductName" name="inputProductName" placeholder="Nike Air Force 1 '07" required>
            <label for="inputProductName"><b>Ονομα</b></label>
        </div>
        
        <div class="form-group form-inline"> 
            <input type="text"  id="inputPrice" name="inputPrice" placeholder="95" required>
            <label for="inputPrice"><b>Τιμή</b></label>
        </div>
        
        <div class="form-group form-inline">
            <input type="text" id="inputProductBrand" name="inputProductBrand" placeholder="Nike" required> 
            <label for="inputProductBrand"><b>Μάρκα</b></label>
        </div>
        
        <div class="form-group form-inline"> 
            <input type="text"  id="inputDescription" name="inputDescription" placeholder="Upper: 50% Real Leather, 50% Other materials, Lining: 100% Textile, Sole: 100%" required>
            <label for="inputDescription"><b>Περιγραφή</b></label>
        </div>
        
        <div class="form-group form-inline">
            <input type="text"  id="inputSize" name="inputSize" placeholder="44" required>
            <label for="inputSize"><b>Μέγεθος</b></label>
        </div>
        
        <div class="form-group form-inline">
            <input type="text"  id="inputDepartment" name="inputDepartment" placeholder="Men/Shoes/Trainers" required>
            <label for="inputDepartment"><b>Τμήμα</b></label>    
        </div>
        
        <div class="form-group form-inline"> 
            <input type="text"  id="inputThumbnail" name="inputThumbnail" placeholder="http://127.0.0.1/pricedoc/assets/img/products/p1.jpg" required>
            <label for="inputThumbnail"><b>Thumbnail</b></label>
        </div>
        
        <div class="form-group form-inline"> 
            <input type="text"  id="inputQuantity" name="inputQuantity" placeholder="8" required>
            <label for="inputQuantity"><b>Quantity</b></label>
        </div>

        <button type="submit" class="btn" name="regProduct">Καταχώρηση</button>
        <?php
            } else {
                echo "Παρακαλώ Επιλέξτε κατάστημα" ;
            }
            ?>
     </form>
    <button type="button" class="btn cancel" onclick="closeRegProductForm()">Ακύρωση</button>
  </div>
</div>