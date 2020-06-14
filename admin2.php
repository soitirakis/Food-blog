<?php
session_start();
include "db.php";
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<div class="container">
    <h2 class="col-md-12 text-center">Admin</h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <div class="form-group col-md-12 text-center">
        <input type="text" name="user" class="form-control" placeholder="Username">
      </div>
      <div class="form-group col-md-12 text-center">
        <input type="password" class="form-control" placeholder="Password" name="password">
      </div>
      <div class="form-group col-md-12 text-center form-check">
        <input class="form-check-input" type="checkbox" name="keepLogin">
        <label class="form-check-label">Keep me logged in!</label>
      </div>
      <div class="col-md-12 text-center">
      <button type="submit" class="btn btn-primary">Log in</button>
    </div>
    </form>
  </div>

<?php
//extract the user and password
$r = $pdo->query("SELECT * FROM login");
while($v = $r->fetchAll(PDO::FETCH_UNIQUE)){
  $user = $v[1]["User"];
  $password = $v[1]["Password"];
}

  //validate the entry data
  if($_SERVER["REQUEST_METHOD"] === "GET"){
    $err = true;
    die();
  }else{
    if(empty($_POST["user"]) || empty($_POST["password"])){
      $err = true;
      die();
    }else{
      $u = htmlspecialchars($_POST["user"]);
      $u = trim($user);
      $u = strtolower($user);

      $p = htmlspecialchars($_POST["password"]);
      $p = trim($password);

      if($user === $u && $password === $p){
        $_SESSION["user"] = $user;
        $_SESSION["logat"] = true;
        $succes = true;
        header("Location: login.php");
        exit();
      }

}
    if(!$succes){
      die("User or password wrong!");
    }
  }
 ?>
