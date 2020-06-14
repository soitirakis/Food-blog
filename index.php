<!DOCTYPE html>
<?php
session_start();
  //include "db.php";
 ?>
<html lang="en">
<head>
  <title>Food blog</title>
  <meta charset="urf-utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-
  lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <script src="src/main.js"></script>
<!--  <script>
    $(document).ready(function(){
      var recipe = 3;
      $("a").click(function(){
        recipe = recipe + 3;
        $("#food").load("load2-db.php", {
          newrecipe : recipe
        });
      });
    });
  </script> -->
</head>
<body>
  <?php
    include "header.php";
  ?>
  <main>
    <div class="container" id="food">
      <?php
        include "display-card.php";
       ?>
    </div>
  </main>
  <?php
    include "section.html";
    include 'footer.html';
   ?>
</body>
</html>
