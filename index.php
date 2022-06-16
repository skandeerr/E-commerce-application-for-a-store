<?php
session_start();
include 'inc/functions.php';
if(!empty($_POST)){
  $produits = SearchProduit($_POST['search']);
} else {$produits = getAllProduit();}

$categories = getAllCategories();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  </head>
<body>
    <?php
      include 'inc/header.php';


    ?>
    <div class="row col-12 mt-4 mr">
    <?php
      foreach($produits as $produit){
        print '
        <div class="col-3 p-3">
          <div class="card" style="width: 300px ">
              <img src="images/'.$produit['image'].'" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title titre">'.$produit['nom'].'</h5>
                <span class="card-text text-center sp">'.$produit['prix'].' TND</span><br>
                <a class="aff" href="produit.php?id='.$produit['id'].'" class="btn btn-primary text-center">Afficher</a>
              </div>
            </div>
        </div> ';
      }


    ?>
      
   </div>  
      <?php
        include 'inc/footer.php';
      ?>
          
        
      
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>