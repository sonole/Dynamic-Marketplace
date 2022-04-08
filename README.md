<h1>Marketplace</h1>
<p>Example of marketplace using MongoDB and HTML, CSS, Bootstrap, JavaScript, jQuery, AngularJS, PHP</p>
<br><hr><br>
<h3>How to run this project</h3>
<ol>
  <li><p>Coppy pricedoc folder to the httdocs folder of XAMMPP.</p></li>
  <li><p>Install <a target="_blank" href="https://www.mongodb.com/try/download">MongoDB</a> and <a target="_blank" href="https://www.mongodb.com/try/download/database-tools">Database tools</a></p></li>
  <li><p>Download mongoDB folder, open cmd inside the folder and then import the collections with the following commnads:</p>
    <pre>mongoimport --db loginreg --collection userdata --jsonArray –file pathToFolder\mongoDB\userdata.json</pre>
    <pre>mongoimport --db stores --collection userdata --jsonArray –file pathToFolder\mongoDB\storeinfo.json</pre>
    <pre>mongoimport --db orders --collection userdata --jsonArray –file pathToFolder\mongoDB\my_db\orderinfo.json</pre>
  </li>
  <li><p>Open XAMMP app and run apache server</p></li>
  <li><p>Open <a  target="_blank" href="http://localhost/pricedoc/">http://localhost/pricedoc/</a> </p></li>
</ol>
<br><hr><br>
   
