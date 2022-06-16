<?php
session_start();
include "../inc/functions.php";
$conn = connect();
$id_visiteur = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$date = date("Y-m-d");
$requette_panier = "INSERT INTO paniers(visiteur,total,date_creation,date_modification) VALUES('$id_visiteur','$total','$date','$date')";
$resultat = $conn->query($requette_panier);
$id_panier = $conn->lastInsertId();
$commandes = $_SESSION['panier'][3];
foreach($commandes as $commande){
    $quantite = $commande[0];
    $total = $commande[1];
    $id_produit = $commande[4];
    $requette = "INSERT INTO commande(quantite,total,produit,panier,date_creation,date_modification) VALUES('$quantite','$total','$id_produit',' $id_panier','$date','$date')";
    $resultat = $conn->query($requette);
}
$_SESSION['panier']= null ;
header('location:../index.php');


?>