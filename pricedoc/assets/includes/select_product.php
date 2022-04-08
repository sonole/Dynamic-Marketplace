<div class="form-popup" id="selectProductForm">
 <div class="product-container">
    <h4>Τροποποίηση Προιόντος - </h4>
    <b>2ο Βήμα</b>
    <hr>
     <?php
        if(isset($_POST['inputVAT']) and chkStore($_POST['inputVAT']) ){
                echo '
                <script type="text/javascript">
                alert("Wrong AFM!"); 
                closeSelectProductForm();openSelectStoreForm();
                window.location.href = "/pricedoc/index.php";
                </script>';   
        }

         if(isset($_POST['inputVAT']) and !chkStore($_POST['inputVAT']) ){
                $VAT = $_POST['inputVAT'];
                echo "Επιλέχθηκε ΑΦΜ --> ".$VAT."<br>";
                $m= new MongoDB\Client ("mongodb://127.0.0.1/");    
                $db = $m->stores;
                $collection = $db->storeinfo; 
                $record = $collection->find(array('AFM'=>$VAT));
                foreach ($record as $store) {  
                }
                $realStoreProducts = $store['nextProductCounter']-1;
                echo "Προιόντα καταστήματος : ".$realStoreProducts."<br><br>" ;
            } else {
                echo "<br>Give AFM First<br>";  
            }
     
         //storeProducts($VAT) ;
     ?>
     <form name="formSelectProduct" id="formSelectProduct" action="/pricedoc/index.php" method="POST">
        <select name="product" id="product">
            <option value="">Select Product</option>
            <?php storeProducts($VAT); ?>
        </select>
        <input type="hidden" name="postVAT" id="postVAT" value="<?php echo $VAT ?>">
    <?php
     if($realStoreProducts > 0 ) {
        echo '
              <input type="submit" value="Υποβολή" id="submit3" onclick="openEditProductForm();closeSelectProductForm()" />';
     }else {
         //echo "<br>ZERO PRODUCTS<br>";
         ?>
         <script>
            closeSelectProductForm();
         </script>
         <?php  
     }
    
    ?>
     </form>
     
     <br><br>
    <button type="button" class="btn cancel" onclick="closeSelectProductForm()">Ακύρωση</button>
    
  </div>
</div>