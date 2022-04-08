<?php
    require_once 'library.php';
    require_once 'store.php';
    require_once 'editstore.php';
    require_once 'product.php';
    require_once 'editproduct.php';
    require_once 'select_store.php';
    require_once 'select_product.php';
?>

<div class="admin-popup" id="adminArea">
 <div class="admin-container">
    <h2>Admin Area</h2>
    <hr>
    <br>
    <div class="admin-container-2">
        <table>
            <tr>
            <th>Εγγεγραμμένοι χρήστες</th>
            <th><?php echo usersCount(); ?></th>
            </tr>
            <tr>
            <th>Καταχωρημένα Καταστήματα</th>
            <th><?php echo storeCount(); ?></th>
            </tr>
            <tr>
            <th>Καταχωρημένα Προϊόντα</th>
            <th><?php echo productCount(); ?></th>
            </tr>
        </table>
        <hr>
        <p style="color:black"><strong><?php echo storeReport(1); ?></strong><p>
     </div>
    <br>
    <button type="button" class="smallopen" onclick="openRegStoreForm()">Καταχωρηση Καταστηματος</button>
    <button type="button" class="smallopen" onclick="openEditStoreForm()">Τροποποιηση Καταστηματος</button>
    <button type="button" class="smallopen" onclick="openRegProductForm()">Καταχωρηση Προϊοντος</button>
    <button type="button" class="smallopen" onclick="openSelectStoreForm()">Τροποποιηση Προϊοντος</button>
    <button type="button" class="btn cancel" onclick="closeAdmin()">Close</button>
  </div>
</div>

