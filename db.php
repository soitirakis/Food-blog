<?php
//conexiunea la baza de date
$pdo = new PDO("mysql:host=localhost;dbname=food_blog", "root", "");
if (!$pdo){
  die("Error connecting to database: ".$pdo->errorInfo());
  print_r($pdo->errorInfo());
}

?>
