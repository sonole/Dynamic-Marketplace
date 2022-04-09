<div>
  <h1>Dynamic Marketplace</h1>
  <p>Example of marketplace using MongoDB and HTML, CSS, Bootstrap, JavaScript, jQuery, AngularJS, PHP<br>In this marketplace you can explore and buy products from partner stores!</p>
  <p>As <strong>admin</strong> you can add/edit products, stores<br>As <strong>user</strong>  you can register, add products to cart from many stores, order, comment on products and see order history.</p>
  <p>Note that the website is in greek language so many features will be difficult to use.</p>
</div>
<br><hr><br>

<div>
  <h3>Database</h3>
  <p>In this DB we have 3 collections that the website uses a) loginreg b) stores c) orders</p>
  <ol type="a">
    <li><p><strong>loginreg</strong>: This collection has only one document named userdata and it stores the data of the users who register through the corresponding form. By default all users in the privileges field have the attribute "customer". Tochange "customer" to "administrator" the corresponding query must be executed. In our collection we have 2 users where one is administrator and the other customer. Note: Passwords pass through a hash function.</li></p>
    <li><p><strong>stores</strong>: Here We also have a document called storeinfo where we keep the details of the store, the products it sells and the product reviews.
      <ul>
        <li>Note 1: _id, pID, as well as pTHUMBNAIL have been used as sku (stock-keeping unit) for the search and implementation of various procedures. For example, I can search for products based on their thumbnail since I believe that every same product will have this thumbnail. Logic is wrong I should have used a SKU code. No such procedure was implemented because every time the administrator adds a product he has to look for which code to enter, etc.</li>
        <li>Note 2: Commends are added to the product with the push method, so if the product has no comments then it will not have the corresponding field "pCOMMENTS".</li>
        <li>Note 3: nextProductCounter refers to the total products that the store has +1.</li>
      </ul>
    </li></p>
    <li><p><strong>orders</strong>: In this collection we have only the document orderinfo. For each order made, an entry is added. As mentioned before, the thumbnail is used as a SKU. Also for each product you order a different collection is created. For example, if in an order we have 3 products in the basket, 3 entries will be created in the document and not 1 single. This is done so that we can easily delete orders from different stores.</li></p>
  </ol>
</div>
<br><hr><br>

<div>
<h3>Description of page files</h3>
<ul>
  <li><p>Assets</p></li>
  <ul>
    <li><p>Css all the stylesheets used.
    <li><p>Img -> all the photos used, among them we have logo, favicon, banners, footer photos, product photos, homepage photos, some avatars for testimonials.</p></li>
    <li><p>Js -> js files for voicesearch, smoothscrool, search and myscript. Myscript is used to open and close forms after reloading pages.</p></li>
    <li><p>Incudes -> Here we have many key important feauters of the site. We have all forms as well the action forms that establise the communication/modification of the db. We will also find some files for viewing the header, menu on mobiles.</p></li>
  </ul>
  <li><p>index.php -> homepage</p></li>
  <li><p>marketplace.php -> in this page you can see all the available products</p></li></p></li>
  <li><p>product-preview.php -> dynamic view of selected product</p></li>
  <li><p>cart.php -> cart page</p></li>
  <li><p>contact-us.php -> contact us page</p></li></p></li>
</ul>
</div>
<br><hr><br>

<div>
<h3>How to run this project</h3>
<ol>
  <li><p>Coppy pricedoc folder to the httdocs folder of XAMPP.</p></li>
  <li><p>Install <a href="https://www.mongodb.com/try/download"  target="_blank">MongoDB</a> and <a target="_blank" href="https://www.mongodb.com/try/download/database-tools">Database tools</a></p></li>
  <li><p>Download mongoDB folder, open cmd inside the folder and then import the collections with the following commnads:</p>
    <pre>mongoimport --db loginreg --collection userdata --jsonArray --file pathToFolder/mongoDB/userdata.json</pre>
    <pre>mongoimport --db stores --collection userdata --jsonArray --file pathToFolder/mongoDB/storeinfo.json</pre>
    <pre>mongoimport --db orders --collection userdata --jsonArray --file pathToFolder/mongoDB/orderinfo.json</pre>
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
   
