<?php
session_start();
include "../../inc/functions.php";
$conn = connect();
$nom= $_POST['nom'];
$description= $_POST['description'];
$id = $_POST['idc'];
$date_modification=date("Y-m-d");
$requette = "UPDATE categories SET nom='$nom', description='$description', date_modification='$date_modification' WHERE id='$id'";
$resultat = $conn->query($requette);
if($resultat){
    header('location:liste.php?modif=ok');
}

?>