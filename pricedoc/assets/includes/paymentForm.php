
<div class="payment-popup" id="paymentForm">
 <div class="payment-container">
    <h4>Πληρωμή</h4>
    <hr>
     <div class="payment-container-2">
     <form action="assets/includes/paymentForm_action.php" method="post" class="product-container">
      <?php
           $_SESSION['post-data'] = $_POST;
            $x=0;
            foreach ($_SESSION['post-data'] as $key=>$val){
                $temp = explode("&", $key);
                $temp2 = explode("input", $temp[0]);
                $type = $temp2[1];
                $sAFM = $temp[1];
                $pThu = $temp[2];
                $val;
                $value=$sAFM."&".$pThu."&".$type."&".$val;
                echo '<input type="hidden" name="product'.$x.'" value="'.$value.'">';
                $x++;
            }   
        ?>
        <div class="row">
            <div class="col-md-12">
                <h3>Billing Address</h3>
                <?php 
                     if(isset($_SESSION["uname"])){
                        $name = $_SESSION["uname"];
                        $email = $_SESSION["email"];
                        echo '
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="name" value="'.$name.'" required>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" value="'.$email.'" required>
                        ';
                    } else {
                         echo '
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="name" placeholder="Your Name" required>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="email@email.com" required>
                        ';
                     }
                ?>
                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="New York">
            </div>
        </div>
         <br>
        <div class="row">
            <div class="col-md-12">
                <h3>Payment</h3>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>

                <input type="text" id="cname" name="cardname" placeholder="Name on Card">
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <br>
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
                <label for="cvv">CV2</label>
                <input type="text" id="cv2" name="cv2" placeholder="352">
            </div>
        </div>
         
        <input type="submit" name="submit5" value="Pay Now" class="btn">
      </form>
     </div>
  
    <button type="button" class="btn cancel" onclick="closePaymentForm()">Ακύρωση</button>
  </div>
</div>