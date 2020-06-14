<?php
//include "db.php";
include "load2-db.php";
$r = $pdo->query("SELECT * FROM food");

//display the content of the database
//display a table with picture, title, description
//display buttons for edit and delete
 ?>
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-
  lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="src/main.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<div class="container">
 <table class="table table-striped">
   <thead>
     <tr>
       <th scope="col">Poza</th>
       <th scope="col">Titlu</th>
       <th scope="col">Descriere</th>
       <th scope="col">Modifica</th>
       <th scope="col">Sterge</th>
     </tr>
   </thead>
   <tbody>
     <?php
        while($v = $r->fetchAll(PDO::FETCH_UNIQUE)){
          createTr($v);
        }
      ?>
   </tbody>
 </table>
</div>
