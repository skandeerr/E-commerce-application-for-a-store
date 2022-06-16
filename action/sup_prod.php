<?php

session_start();
$id= $_GET['id'];
$total_enl = $_SESSION['panier'][3][$id][1];
$_SESSION['panier'][1]-=$total_enl;
unset($_SESSION['panier'][3][$id]);

header("location:../panier.php");






?>