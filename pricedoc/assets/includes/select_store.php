<div class="form-popup" id="selectStoreForm">
 <div class="product-container">
    <h4>Τροποποίηση Προιόντος</h4>
    <b>1ο Βήμα</b>
    <hr>
     <form name="selectStoreForm" id="selectStoreForm" action="/pricedoc/index.php" method="POST"  class="product-container">
        <label for="inputVAT"><b>Give Store VAT No.</b></label>
        <input type="text" id="inputVAT" name="inputVAT" placeholder="099360444" required>
         
      <input type="submit" value="Υποβολή" id="submit4" onclick="openSelectProductForm();closeSelectStoreForm()" />
     </form>

    <button type="button" class="btn cancel" onclick="closeSelectStoreForm()">Ακύρωση</button>
  </div>
</div>