<?php
session_start();
include "../../inc/functions.php";
$conn = connect();
$nom= $_POST['nom'];
$description= $_POST['description'];
$createur = $_SESSION['id'];
$date=date("Y-m-d");


try {
    $requette = "INSERT INTO categories(nom,description,createur,date_creation) VALUES('$nom','$description','$createur','$date')";
$resultat = $conn->query($requette);
if($resultat){
    header('location:liste.php?ajout=ok');}
  } catch(PDOException $e) {
    
    if($e->getcode() == 23000){
        header('location:liste.php?erreur=duplicate');
    }
  }

?>