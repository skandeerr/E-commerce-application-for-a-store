<?php
$idc = $_GET['idc'];
include "../../inc/functions.php";
$conn = connect();
$requette = "DELETE FROM categories WHERE id=$idc";
$resultat = $conn->query($requette);
if($resultat){
    header('location:liste.php?sup=ok');
}





?>