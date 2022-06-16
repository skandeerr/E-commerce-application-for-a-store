<?php
function connect(){
// 1- connexion a la BD
// $servername = "localhost";
// $DBuser = "root" ;
// $DBpassword ="" ;
// $DBname = "ecommerce" ;
$servername = "remotemysql.com";
 $DBuser = "hOQjCo9F14" ;
 $DBpassword ="NwIyGwnXqn" ;
 $DBname = "hOQjCo9F14" ;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  return $conn;
}
function getAllCategories(){
  $conn = connect();
// 2 - creation de la requette
$requette = "SELECT * FROM categories";
// 3- execution de la requette
$resultat = $conn->query($requette);
// 4- resultat de la requette 
$categories = $resultat->fetchAll();

// var_dump($categories);
return $categories;
}
function getAllProduit(){
    // 1- connexion a la BD
    $conn = connect();
// 2 - creation de la requette
$requette = "SELECT * FROM produit";
// 3- execution de la requette
$resultat = $conn->query($requette);
// 4- resultat de la requette 
$produits = $resultat->fetchAll();

// var_dump($categories);
return $produits;
}
function SearchProduit($keyword){
  $conn = connect();
  // 2 - creation de la requette
  $requette = "SELECT * FROM produit WHERE nom LIKE '%$keyword%'" ;
  // 3- execution de la requette
  $resultat = $conn->query($requette);
  // 4- resultat de la requette 
  $produits = $resultat->fetchAll();
  return $produits ; 
}
function GetProduit($id){
  $conn = connect();
  // 2 - creation de la requette
  $requette = "SELECT * FROM produit WHERE id=$id" ;
  // 3- execution de la requette
  $resultat = $conn->query($requette);
  // 4- resultat de la requette 
  $produit = $resultat->fetch();
  return $produit ;

}
function AddVisiteur($data){
  $conn = connect();
  
   // upload image 
   $target_dir = "images/";
   $target_file = $target_dir . basename($_FILES["image"]["name"]);
   if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
       $image = $_FILES["image"]["name"];
   } else {
       echo "Sorry, there was an error uploading your file.";
   }

  $mpHash = md5($data['mp']);
  $requette ="INSERT INTO visiteurs(email,nom,prenom,telephone,mp,photo,adresse) VALUES('".$data['email']."','".$data['nom']."','".$data['prenom']."','".$data['telephone']."','".$mpHash."','".$image."','".$data['adresse']."')";
  $resultat = $conn->query($requette);
  if($resultat){
    return true ;
  } else {return false;}

}

function ConnectVisiteur($data){
  $conn = connect();
  $email = $data['email'];
  $mp = md5($data['mp']);
  $requette = "SELECT * FROM visiteurs WHERE email='$email' AND mp='$mp' ";
  $resultat = $conn->query($requette);
  $user = $resultat->fetch();
  return $user ;
}
function ConnectAdmin($data){
  $conn = connect();
  $email = $data['email'];
  $mp = md5($data['mp']);
  $requette = "SELECT * FROM Administrateur WHERE email='$email' AND mp='$mp' ";
  $resultat = $conn->query($requette);
  $user = $resultat->fetch();
  return $user ;
}
function GetAllUsers(){
  $conn = connect();
  $requette = "SELECT * FROM visiteurs WHERE etat=0 ";
  $resultat = $conn->query($requette);
  $user = $resultat->fetchAll();
  return $user ;
}
function GetAllStock(){
  $conn = connect();
  $requette = "SELECT s.id,p.nom,s.quantite FROM stocks s,produit p WHERE p.id = s.produit ";
  $resultat = $conn->query($requette);
  $stocks = $resultat->fetchAll();
  return $stocks ;
}
function getAllPaniers(){
  $conn = connect();
  $requette = "SELECT v.nom, v.prenom, v.telephone, p.total, p.etat, p.date_creation,p.id FROM visiteurs v , paniers p WHERE p.visiteur = v.id ";
  $resultat = $conn->query($requette);
  $paniers = $resultat->fetchAll();
  return $paniers ;
}
function getAllCommandes(){
  $conn = connect();
  $requette = "SELECT p.nom,p.image, c.quantite, c.total, c.panier  FROM commande c, produit p WHERE p.id= c.produit ";
  $resultat = $conn->query($requette);
  $commandes = $resultat->fetchAll();
  return $commandes ;
}
function getParEtat($paniers,$etat){
  $panierEtat = array();
  foreach($paniers as $p){
    array_push($panierEtat,$p);
  }

}

?>