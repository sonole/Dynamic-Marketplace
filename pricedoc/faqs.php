<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include("assets/includes/head.php"); ?>
<title>Price Doc | FAQs</title>
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
    <section class="breadcrumb-section set-bg" data-setbg="assets/img/banner/banner2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>FAQs</h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <span>FAQs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
    <!-- FAQs Begin -->
    
<section class="accordion-section spad clearfix ">
  <div class="container">
      <div class="section-title">
        <span>Frequently Asked Questions</span>
        <h2>ΣΥΧΝΕΣ ΕΡΩΤΗΣΕΙΣ</h2>
      </div>
	  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">Ποιά είναι τα συνεργαζόμενα καταστήματα;</a>
			</h3>
		  </div>
		  <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
			<div class="panel-body px-3 mb-4">
			  <p><?php echo storeReport(0); ?></p>
			</div>
		  </div>
		</div>
		
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
				Ποιοί είναι οι τρόποι αποστολής;
			  </a>
			</h3>
		  </div>
		  <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
			<div class="panel-body px-3 mb-4">
			  <p>Για την Αττική:</p>
                <p>Tα περισσότερα προϊόντα αποστέλλονται την επόμενη εργάσιμη μέρα με δικά μας μέσα, μετά από τηλεφωνική συνεννόηση, ή από κάποια συνεργαζόμενη εταιρεία courier.</p><br>
                <p>Για την υπόλοιπη Ελλάδα:</p>
                <p>Για τις περιοχές που δεν καλύπτοναι από eshop points, υπάρχουν 2 τρόποι αποστολής: με courier (1-2 εργάσιμες) ή με πρακτορείο μεταφορών (1-2 εργάσιμες και παραλαβή από έδρα πρακτορείου). Το κόστος αποστολής βαρύνει τον παραλήπτη.</p>
			</div>
		  </div>
		</div>
		
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading2">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
				Ποιοί είναι οι τρόποι πληρωμής;
			  </a>
			</h3>
		  </div>
		  <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
			<div class="panel-body px-3 mb-4">
			  <p>Παρακάτω θα δείτε όλους τους διαθέσιμους τρόπους πληρωμής για να πραγματοποιείτε τις αγορές σας στο PriceDoc! Επιλέξτε τον τρόπο που σας ταιριάζει. 
                  (Επιλέγοντας τον τρόπο πληρωμής θα δείτε λεπτομέρειες για την κάθε επιλογή). 
                  Όλες οι πληρωμές που πραγματοποιούνται με χρήση κάρτας διεκπεραιώνονται μέσω της πλατφόρμας ηλεκτρονικών πληρωμών "Πειραιώς ePOS Paycenter" της τράπεζας Πειραιώς και χρησιμοποιεί κρυπτογράφηση TLS 1.2 με πρωτόκολλο κρυπτογράφησης 128-bit (Secure Sockets Layer - SSL). 
                  Η κρυπτογράφηση είναι ένας τρόπος κωδικοποίησης της πληροφορίας μέχρι αυτή να φτάσει στον ορισμένο αποδέκτη της, ο οποίος θα μπορέσει να την αποκωδικοποιήσει με χρήση του κατάλληλου κλειδιού.</p>
                <div class="fa-logo">
                            <a href="#"><img src="assets/img/footer/mastercard.png" width="10%" alt="mastercard"></a>
                            <a href="#"><img src="assets/img/footer/american.png" width="15%" alt="american"></a>
                            <br>
                            <a href="#"><img src="assets/img/footer/visa.png" width="15%" alt="visa"></a>
                            <a href="#"><img src="assets/img/footer/paypal.png" width="15%"  alt="paypal"></a> 
                </div>
			</div>
		  </div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading4">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
				Ποιά είναι η διαδικασία επιστροφής;
			  </a>
			</h3>
		  </div>
		  <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
			<div class="panel-body px-3 mb-4">
			  <p>
                Το PriceDoc σας παρέχει τη δυνατότητα επιστροφής της παραγγελίας ΧΩΡΙΣ επιπλέον κόστος σας εντός 14 ημερολογιακών ημερών με ΔΩΡΕΑΝ τα μεταφορικά της πρώτης επιστροφής της παραγγελίας σας ή μέρους αυτής, αλλά και τα μεταφορικά για την επαναποστολή της, ανεξάρτητα απο το ποσό της παραγγελίας σας και του τρόπου πληρωμής που έχετε επιλέξει. Η ΔΩΡΕΑΝ επιστροφή καλύπτει μόνο αποστολές εντός της Ελλάδας. Σε όλες τις περιοχές εκτός της Ελλάδας το κόστος επιστροφής επιβαρύνει τον πελάτη.
                <br><br>
                  <strong>ΠΡΟΣΟΧΗ:</strong> Τα επιστρεφόμενα προϊόντα πρέπει να βρίσκονται στην κατάσταση που αποστάλθηκαν από το PriceDoc και παραλήφθηκαν από τον πελάτη, πλήρη και χωρίς φθορές. Η συσκευασία τους θα πρέπει να είναι αυτή που κανονικά συνοδεύει το προϊόν σε άριστη κατάσταση (χωρίς να έχουν αφαιρεθεί οι ετικέτες) και με όλα τα έγγραφα της αποστολής (π.χ. Δελτίο Αποστολής, Απόδειξη Λιανικής κλπ). Επιστροφές οι οποίες δεν πληρούν τις παραπάνω συνθήκες ΔΕΝ γίνονται αποδεκτές και επιστρέφονται στον πελάτη.
                <br><br>
                Συγκεκριμένα οι επιστροφές σε Εσώρουχα, Μαγιό, Κάλτσες, Προϊόντα Περιποίησης, Μάσκες Προστασίας και Σκουλαρίκια γίνονται δεκτές με την προϋπόθεση ότι δεν έχουν χρησιμοποιηθεί και δεν έχουν αφαιρεθεί τα προστατευτικά. Τα παπούτσια πρέπει να δοκιμάζονται σε καθαρό πάτωμα ή σε χαλί, καθώς για να γίνει δεκτή η επιστροφή θα πρέπει η σόλα να μην είναι λερωμένη. Το κουτί των παπουτσιών θα πρέπει επίσης να προστατεύεται επαρκώς κατά την επιστροφή ώστε να μην υποστεί καμία φθορά..
                <br><br>
                Επικοινωνήστε μαζί μας με email μέσω της <a href="contact-us.php">φόρμας επικοινωνίας</a>, αναφέροντας το ονοματεπώνυμο και τον αριθμό παραγγελίας σας, καθώς και το λόγο για τον οποίο επιθυμείτε την επιστροφή του προιόντος. Εναλλακτικά μπορείτε να μας ενημερώσετε τηλεφωνικά στο 210 1234567.</p>
			</div>
		  </div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading5">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
				Τι μπορώ να κάνω αν δεν βρίσκω το προϊόν που ψάχνω;
                </a>
			</h3>
		  </div>
		  <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
			<div class="panel-body px-3 mb-4">
			  <p>Αν παρά την αναζήτηση στο site δεν έχετε καταφέρει να βρείτε το προϊόν που θέλετε τότε μπορείτε να το παραγγείλετε είτε ηλεκτρονικά στη <a href="contact-us.php">φόρμα επικοινωνίας</a>, είτε σε έναν από τους πωλητές μας στο τηλέφωνο 210 1234567</p>
			</div>
		  </div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading6">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapse6">
				Πως χρησιμοποιώ το Καλάθι Αγορών μου;
			  </a>
			</h3>
		  </div>
		  <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
			<div class="panel-body px-3 mb-4">
			  <p>Το Καλάθι Αγορών λειτουργεί με τον ίδιο τρόπο που θα το χρησιμοποιούσατε και σε ένα φυσικό κατάστημα. Περιέχει όλα τα επιλεγμένα από εσάς προϊόντα για αγορά και είναι το τελευταίο βήμα πριν την παραγγελία σας. Σας επιτρέπει να παρακολουθείτε, να προσθέτετε και να αφαιρείτε είδη, όπως θα κάνατε και σε ένα κανονικό κατάστημα.</p>
			</div>
		  </div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading7">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapse7">
				Πως μπορώ να προσθέσω περισσότερα προιόντα στο Καλάθι Αγορών μου?
                </a>
			</h3>
		  </div>
		  <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
			<div class="panel-body px-3 mb-4">
			  <p>Για να προσθέσετε κάποιο είδος στο Καλάθι Αγορών σας, πατήστε στο κουμπί «Προσθήκη στο Καλάθι», που βρίσκεται στη λεπτομερή περιγραφή του είδους. Για να αφαιρέσετε κάποιο είδος, πατήστε το εικονίδιο της τσάντας στο επάνω δεξί μέρος της ιστοσελίδας και μετά στο «Χ», δίπλα στο είδος που θέλετε να αφαιρέσετε.</p>
			</div>
		  </div>
		</div>
	  </div>
  </div>
</section>
<!-- FAQs End -->
   

<!-- Footer Section Begin -->
 <?php include("assets/includes/footer.php"); ?>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/jquery.barfiller.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>


</body>

</html>