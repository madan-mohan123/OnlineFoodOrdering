<?php
session_start();
?>
<?php

$_SESSION["hotel_id"]= "";
$_SESSION["hotel_name"]="";
$_SESSION["email"]="";
header("Location: ../html/signin.html");

?>