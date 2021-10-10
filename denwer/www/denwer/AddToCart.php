<?php
session_start();

if($_SESSION["Cart"] == null) {
$_SESSION["Cart"] = array();
}

$ID = $_GET['id'];
$Count = $_GET['count'];

array_push($_SESSION['Cart'], $ID.'|'.$Count);
?>