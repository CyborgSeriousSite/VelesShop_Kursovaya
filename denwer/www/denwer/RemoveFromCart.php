<?php
session_start();

if($_SESSION["Cart"] != null) {

$ID = $_GET['id'];
unset($_SESSION['Cart'][$ID]);
}


?>