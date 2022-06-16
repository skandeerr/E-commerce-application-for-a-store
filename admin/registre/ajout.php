<?php

include '../../inc/functions.php';

    $conn = connect();
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $mp = $_POST['mp'];
    // upload image 
        $target_dir = "../../images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $_FILES["image"]["name"];
        } else {
            echo "Sorry, there was an error uploading your file.";
        }









    $mpHash = md5($mp);
    $requette ="INSERT INTO administrateur(nom,email,mp,photo,adresse,telephone) VALUES('".$nom."','".$email."','".$mpHash."','".$image."','".$adresse."','".$telephone."')";
    $resultat = $conn->query($requette);
    if($resultat){
        $registreAlerte = 1;
        header("location:registre.php?alert=".$registreAlerte."");
    }
  



?>