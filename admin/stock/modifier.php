<?php
session_start();
include "../../inc/functions.php";
$conn = connect();
$quantite= $_POST['quantite'];
$id = $_POST['idc'];
$date_modification=date("Y-m-d");
$requette = "UPDATE stocks SET quantite='$quantite', date_modification='$date_modification' WHERE id='$id'";
$resultat = $conn->query($requette);
if($resultat){
    header('location:liste.php?modif=ok');
}

?>