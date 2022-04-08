<?php
    require_once 'library.php';
?>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<div class="orders-popup" id="ordersArea">
 <div class="orders-container">
    <h2>Ιστορικό Παραγγελιών</h2>
    <hr>
    <div class="container">
        <?php echo orders(); ?>
     </div>
  
    <br>
    <button type="button" class="btn cancel" onclick="closeOrders()">Close</button>
  </div>
</div>