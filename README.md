# Marketplace
Example of marketplace using MongoDB and HTML, CSS, Bootstrap, JavaScript, jQuery, AngularJS, PHP

<hr>
How to run this project
  1. Coppy pricedoc folder to the httdocs folder of XAMMPP.
  2. Install [MongoDB](https://www.mongodb.com/try/download) and [database tools](https://www.mongodb.com/try/download/database-tools)
  3. Download mongoDB folder, open cmd inside the folder and then import the collections with the following commnads:
    <pre>mongoimport --db loginreg --collection userdata --jsonArray –file pathToFolder\mongoDB\userdata.json</pre>
    <pre>mongoimport --db stores --collection userdata --jsonArray –file pathToFolder\mongoDB\storeinfo.json</pre>
    <pre>mongoimport --db orders --collection userdata --jsonArray –file pathToFolder\mongoDB\my_db\orderinfo.json</pre>
  4. Open XAMMP app and run apache server
  5. Open http://localhost/pricedoc/

<hr>
   
