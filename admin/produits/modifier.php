<?php
session_start();
include "../../inc/functions.php";
$conn = connect();
$nom= $_POST['nom'];
$description= $_POST['description'];
$id = $_POST['idc'];
$prix = $_POST['prix'];
$createur = $_POST['createur'];
$categorie = $_POST['Categorie'];
$date_modification=date("Y-m-d");
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
$requette = "UPDATE produit SET nom='$nom', description='$description',prix='$prix',categorie='$categorie',createur='$createur',date_modification='$date_modification', date_modification='$date_modification' WHERE id='$id'";
$resultat = $conn->query($requette);
if($resultat){
    header('location:liste.php?modif=ok');
}

?>