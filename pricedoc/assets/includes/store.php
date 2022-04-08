<div class="form-popup" id="regStoreForm">
 <div class="form-container">
    <h2>Καταχώρηση Καταστήματος</h2>
    <hr>
    <br>
    <form action="assets/includes/store_action.php" method="post" class="form-container">

        <label for="inputStoreName"><b>Επωνυμία</b></label>
        <input type="text" id="inputStoreName" name="storeName" placeholder="Tsakiris Mallas" required>
        
        <label for="inputAFM"><b>ΑΦΜ</b></label>
        <input type="text"  id="inputAFM" name="storeAFM" placeholder="099360845" required>

        <label for="inputDOY"><b>ΔΟΥ</b></label>
        <input type="text"  id="inputDOY" name="storeDOY" placeholder="ΦΑΕ ΠΕΙΡΑΙΑ" required>
        
        <label for="inputAddress"><b>Διεύθυνση Καταστήματος</b></label>
        <input type="text"  id="inputAddress" name="storeAddress" placeholder="Εθνικής Αντιστάσεως 144, Αγ. Δημήτριος" required>
        
        <label for="inputTEL"><b>Τηλέφωνο Επικονωνίας</b></label>
        <input type="text" id="inputTEL" name="storeTEL" placeholder="210 97 50 123" required>

        <button type="submit" class="btn" name="regStore">Καταχώρηση</button>
     </form>
    <button type="button" class="btn cancel" onclick="closeRegStoreForm()">Ακύρωση</button>
  </div>
</div>


   
