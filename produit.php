<?php
session_start();
include 'inc/functions.php';
$categories = getAllCategories();
if (isset($_GET['id'])){
    $produit = GetProduit($_GET['id']);}
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/produit.css">
  </head>
<body>
    <?php
      include 'inc/header.php';


    ?>
    <div class="row col-12 mt-4">
      <?php
        if(isset($_SESSION['etat']) && $_SESSION['etat']==0){
          print '<div class="alert alert-danger">
          Visiteur non validee
    
        </div>';
        }


      ?>
    
    <div class="card col-8 offset-2 d-flex-betwen">
    <div class="row">
    <div class="col-xs-12 col-md-6 ">
          <div class="about-img"><img src="images/<?php echo $produit['image']  ;?>" class="img-responsive" alt=""></div>
        </div>
  <div class="col-xs-12 col-md-6 " >

  <div class="card-body">
    <h5 class="card-title titre"><?php echo $produit['nom']  ?></h5>
    <p class="card-text desc"><?php echo $produit['description']  ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item prix"><?php echo $produit['prix']  ?>   TND</li>
    <?php   foreach($categories as $index => $c){
        if($produit['categorie']==$c['id']){
          print '
          <div class="categorie">

                <label>Categorie : </label><span class="cat">'.$c['nom'].'</span>
          </div>
          ';
        }
    }        ?>
    
    
  </ul>
  <div class="m-2">
      <form action="action/commande.php" method="POST" class="d-flex">
          <input type="hidden" value="<?php  echo $produit['id']   ?>" name="id">
          <span class="control-label">Quantité</span>
          <input type="number" min="1"  name="quantite" class="quan"step=1 >
          <button class="btn btn-primary bouton"  type="submit" <?php  if(isset($_SESSION['etat']) && $_SESSION['etat'] == 0 || !isset($_SESSION['etat'])){ echo "disabled";}  ?>>Commander</button>
          


      </form>
    </div>
</div>
    
</div>  

   </div>  
   </div>  
     
          
        
   <?php
        include 'inc/footer.php';
      ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>