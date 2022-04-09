<div>
  <h1>Dynamic Marketplace</h1>
  <p>Example of marketplace using MongoDB and HTML, CSS, Bootstrap, JavaScript, jQuery, AngularJS, PHP</p>
  <p>As admin you can add/edit products, stores</p>
  <p>As user you can register, add products to cart from many stores, order, comment on products and see order history</p>
</div>
<br><hr><br>

<div>
  <h3>Database</h3>
  <p>In this DB we have 3 collections that the website uses a) loginreg b) stores c) orders</p>
  <ol type="a">
    <li><p><strong>loginreg</strong>: To collection αυτή έχει μόνο ένα document με όνομα userdata και εκεί αποθηκεύονται τα στοιχεία τον χρηστών που κάνουν εγγραφή μέσω της αντίστοιχης φόρμας.
By default όλοι οι χρήστες στο πεδίο privileges έχουν attribute “customer” για να αλλαχτεί σε “administrator” πρέπει να εκτελεστεί και το αντίστοιχο query.
Στο collection μας έχουμε 2 users όπου ο ένας είναι administrator και ο άλλος customer. Σημ: Τα password περνάνε από hash function.</li></p>
    <li><p><strong>stores</strong>: Ομοίως πάλι έχουμε ένα document με όνομα storeinfo όπου εκεί κρατάμε τα στοιχεία του καταστήματος, τα προϊόντα που πουλάει καθώς και τα σχόλια των προϊόντων. Στο screenshot φαίνεται το πρώτο κατάστημα που έχει εκχωρηθεί, με τα στοιχεία του, με 2 προϊόντα που πουλάει καθώς και τα σχόλια από το 1 προϊών.
Σημ: Σαν sku (stock-keeping unit) για την αναζήτηση και την υλοποίηση διαφόρων διαδικασιών έχει χρησιμοποιηθεί το _id, pID, καθώς και το pTHUMBNAIL. Π.χ μπορεί να ψάξω προϊόντα με βάση το thumbnail τους αφού θεωρώ ότι κάθε ίδιο προϊόν θα έχει αυτό το thumbnail. Η λογική είναι λάθος θα έπρεπε να είχα χρησιμοποιήσει έναν κωδικό SKU. Δεν υλοποιήθηκε τέτοια διαδικασία γιατί θα έπρεπε ο διαχειριστής κάθε φορά που προσθέτει προϊόν να ψάχνει ποιον κωδικό να βάλει, κλπ.
Σημ2: Τα commends προστίθενται στο προϊόν με την μέθοδο push, οπότε αν το προϊόν δεν έχει σχόλια τότε δεν θα έχει και το αντίστοιχο field “pCOMMENTS”.
Σημ3: To nextProductCounter αναφέρεται στα συνολικά προϊόντα που έχει το κατάστημα +1.</li></p>
    <li><p><strong>orders</strong>: Σε αυτή τo collection έχουμε μόνο το document orderinfo. Για κάθε παραγγελία που γίνεται προστίθεται και μία εγγραφή. Παρακάτω φαίνονται 2 διαφορετικές παραγγελίες από τον ίδιο χρήστη σε διαφορετικές ημερομηνίες. Όπως αναφέρθηκε και προηγουμένως το thumbnail χρησιμοποιείται σαν SKU. Επίσης για κάθε προϊών που παραγγέλνετε δημιουργείται και ένα διαφορετικό collection.
Π.χ αν σε μία παραγγελία έχουμε στο καλάθι 3 προϊόντα, θα δημιουργηθούν 3 εγγραφές στο document και όχι 1 ενιαία. Αυτό γίνεται για να μπορούμε να διαγράφουμε τις παραγγελίες εύκολα από διαφορετικά καταστήματα.
Όπως φαίνεται παρακάτω για κάθε προϊών αποθηκεύουμε και πόσα τεμάχια/νούμερο θα πάρει από αυτό το προϊόν.</li></p>
  </ol>
</div>
<br><hr><br>

<div>
<h3>Περιγραφή αρχείων σελίδας</h3>
<ul>
  <li><p>Assets (περιέχει css, img, js, includes)</p></li>
  <li><p>Css όλα τα stylesheets που χρησιμοποιούνται
  <li><p>Img όλες οι φωτογραφίες που χρησιμοποιούνται, μεταξύ αυτών έχουμε logo, favicon, banners, φωτογραφίες του footer, φωτογραφίες προϊόντων, φωτογραφίες αρχικής σελίδας, κάποια avatars για testimonials.</p></li>
  <li><p>Js εκεί βρίσκονται τα javascript αρχεία μου. εκεί έχω υλοποιήσει τα myscript, search, voiceserach και smoothscrool.
To myscript χρησιμοποιείται για να ανοιγοκλείνουν οι φόρμες μετά από τα reload των σελιδών.</p></li>
  <li><p>Incudes Εδώ έχουμε και το ζουμί όλου του site Εκεί θα βρούμε όλες τις φόρμες καθώς και τις φόρμες που αποτελούν το «action», δηλαδή την επικοινωνία/τροποιήση της βάσης. Θα βρούμε επίσης και κάποια αρχεία για την προβολή του header,menu σε κινητά.</p></li>
  <li><p>fonts</p></li>
  <li><p>index.php (αρχική σελίδα)</p></li>
  <li><p>marketplace.php (σελίδα προβολής όλων των διαθέσιμων προϊόντων</p></li></p></li>
  <li><p>product-preview.php (δυναμική προβολή επιλεγμένου προϊόντος)</p></li>
  <li><p>cart.php (σελίδα προβολής του καλαθιού μας)</p></li>
  <li><p>contact-us.php (σελίδα επικοινωνίας)</p></li></p></li>
</ul>
</div>
<br><hr><br>

<div>
<h3>How to run this project</h3>
<ol>
  <li><p>Coppy pricedoc folder to the httdocs folder of XAMMPP.</p></li>
  <li><p>Install <a href="https://www.mongodb.com/try/download"  target="_blank">MongoDB</a> and <a target="_blank" href="https://www.mongodb.com/try/download/database-tools">Database tools</a></p></li>
  <li><p>Download mongoDB folder, open cmd inside the folder and then import the collections with the following commnads:</p>
    <pre>mongoimport --db loginreg --collection userdata --jsonArray –file pathToFolder\mongoDB\userdata.json</pre>
    <pre>mongoimport --db stores --collection userdata --jsonArray –file pathToFolder\mongoDB\storeinfo.json</pre>
    <pre>mongoimport --db orders --collection userdata --jsonArray –file pathToFolder\mongoDB\my_db\orderinfo.json</pre>
  </li>
  <li><p>Open XAMMP app and run apache server</p></li>
  <li><p>Open <a  target="_blank" href="http://localhost/pricedoc/">http://localhost/pricedoc/</a> </p></li>
</ol>
<br>
  <strong>Login credentials</strong>
  <ul>
    <li><p>Admin<br>&nbsp;username: alex@gmail.com<br>&nbsp;password: 1234</p></li>
    <li><p>User<br>&nbsp;username: john@gmail.com<br>&nbsp;password: 1234</p></li>
  </ul>
</div>
<br><hr><br>
   
