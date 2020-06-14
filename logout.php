<?php
session_start();
//include("header.php");
unset($_SESSION["user"]);
unset($_SESSION["logat"]);
session_destroy();
header("Location: index.php");
exit();
?>
