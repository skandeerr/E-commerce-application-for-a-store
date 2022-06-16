<?php
session_start();
 if(!isset($_SESSION['nom'])){
     header("location:../connexion.php");
     exit();
 }

 include "../inc/functions.php";
     $conn = connect();
     $id_produit= $_POST['id'];
     $quantite = $_POST['quantite'];
     $date = date("Y-m-d");
     $id_visiteur = $_SESSION['id'];
     //recuperation de prix de produit
    $requette = "SELECT prix,nom FROM produit WHERE id='$id_produit'";
     $resultat = $conn->query($requette);
     $produit = $resultat->fetch();
     $total = $produit['prix']*$quantite;
     if(!isset($_SESSION['panier'])){
         $_SESSION['panier'] = array($id_visiteur,0,$date,array());
     }
     $_SESSION['panier'][1]+= $total; 
     $_SESSION['panier'][3][] = array($quantite,$total,$date,$date,$id_produit,$produit['nom']);
    // var_dump($_SESSION['panier']) ;
    // var_dump($_SESSION['panier'][3]) ;
//     //pour le panier 
//     $requette_panier = "INSERT INTO paniers(visiteur,total,date_creation,date_modification) VALUES('$id_visiteur','$total','$date','$date')";
//     $resultat = $conn->query($requette_panier);
//     $id_panier = $conn->lastInsertId();
//     //pour la commande
//     $requette = "INSERT INTO commande(quantite,total,produit,panier,date_creation,date_modification) VALUES('$quantite','$total','$id_produit',' $id_panier','$date','$date')";
//     $resultat = $conn->query($requette);
    
    
header('location:../panier.php');






?>