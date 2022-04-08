<div class="form-popup" id="editStoreForm">
 <div class="form-container">
    <h2>Τροποποίηση Καταστήματος</h2>
    <hr>
    <br>
     
    <form name="formSelectStore" id="formSelectStore" action="/pricedoc/index.php" method="POST">
        <select name="store" id="store">
            <option value="">Select Store</option>
            <?php storeNames();?>
        </select>
      <input type="submit" value="Υποβολή"id="submit" onclick="openEditStoreForm()" />
     </form>

    <form action="assets/includes/editstore_action.php" method="post" class="form-container">

     
    <?php
        if(isset($_POST['store']) and $_POST['store'] != ''){

            $storeAFM = $_POST['store'];
            echo "Επιλέχθηκε ΑΦΜ --> ".$storeAFM; 
            echo "<br>Το ΑΦΜ δεν μπορεί να αλλαχθεί.<br>";

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
            
             $realStoreProducts = $store['nextProductCounter']-1;
             echo "Προιόντα καταστήματος : ".$realStoreProducts."<br><br>" ;
    ?>      
        <label for="changeSName"><b>Επωνυμία</b></label> 
        <input type="text" id="changeSName" name="changeSName" value="<?php echo $store['Name'] ?>" required>
        <input type="hidden"  id="changeSAFM" name="changeSAFM" value="<?php echo $store['AFM'] ?>">
        <label for="changeSDOY"><b>ΔΟΥ</b></label> 
        <input type="text"  id="changeSDOY" name="changeSDOY" value="<?php echo $store['DOY'] ?>" required>
        <label for="changeSAddr"><b>Διεύθυνση Καταστήματος</b></label> 
        <input type="text"  id="changeSAddr" name="changeSAddr" value="<?php echo $store['Address'] ?>" required>
        <label for="changeSTEL"><b>Τηλέφωνο Επικονωνίας</b></label> 
        <input type="text"  id="changeSTEL" name="changeSTEL" value="<?php echo $store['TEL'] ?>" required>
        <button type="submit" class="btn" name="editStore" 
            onclick="return confirm('Θέλεις σίγουρα να τροποποιήσεις το κατάστημα?');">Τροποποίηση Καταστήματος</button>
        <button type="submit" class="btn" name="deleteStore" 
            onclick="return confirm('Θέλεις σίγουρα να διαγράψεις το κατάστημα? Ολα τα προιόντα του καταστήματος θα διαγραφούν!!');">Διαγραφή Καταστήματος</button>
    <?php
        } else {
            echo "Επιλεξε κατάστημα για τροποποίηση";  
        }

    ?>
     </form>
    <button type="button" class="btn cancel" onclick="closeEditStoreForm()">Ακύρωση</button>
  </div>
</div>