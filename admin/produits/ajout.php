<?php
session_start();
include "../../inc/functions.php";
$conn = connect();
$nom= $_POST['nom'];
$description= $_POST['description'];
$prix = $_POST['prix'];
$createur = $_POST['createur'];
$categorie = $_POST['Categorie'];
$date=date("Y-m-d");
$stock = $_POST['stock'];
// upload image 
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
try{
  $requette = "INSERT INTO produit(nom,description,prix,image,categorie,createur,date_creation) VALUES('$nom','$description','$prix','$image','$categorie','$createur','$date')";
  $resultat = $conn->query($requette);
if($resultat){
     $id_produit = $conn->lastInsertId();
    $requette2 = "INSERT INTO stocks(produit,quantite,createur,date_creation) VALUES('$id_produit','$stock','$createur','$date')";
    if($conn->query($requette2)){
    header('location:liste.php?ajout=ok');}
    else{ echo "impossible dajouer";}
}} catch(PDOException $e) {
    
    if($e->getcode() == 23000){
        header('location:liste.php?erreur=duplicate');
    }
  }
?>