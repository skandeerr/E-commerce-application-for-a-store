<?php
session_start();
include 'inc/functions.php';
if(!empty($_POST)){
  $produits = SearchProduit($_POST['search']);
} else {$produits = getAllProduit();}
$total=0;
$categories = getAllCategories();
if(isset($_SESSION['panier'])){
  $total = $_SESSION['panier'][3][1];
}
$commandes= array();
if(isset($_SESSION['panier'])){
    if(count($_SESSION['panier'][3])>0){
            $commandes = $_SESSION['panier'][3];
    }
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php
      include 'inc/header.php';


    ?>
    <div class="row col-12 mt-4 p-5">
    <h1>Panier</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantite</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
      <?php
        foreach($commandes as $index=>$commande){
            print'<tr>
            <th scope="row">'.($index+1).'</th>
            <td>'.$commande[5].'</td>
            <td>'.$commande[0].' </td>
            <td>'.$commande[1].'DDT</td>
            <td> <a href="action/sup_prod.php?id='.$index.'" class="btn btn-danger">Supprimer</a></td>
          </tr>';
        }

        ?>
    
   
    
  </tbody>
</table>
<div class="text-end mt-3">
       <h3> Total : <?php echo $total; ?>DDT</h3>
       <hr/>
       <a href="action/valider_panier.php"class="btn btn-success" style="width:100px">Valider</a>
    </div>
    
    
   </div>  
      <?php
        include 'inc/footer.php';
      ?>
          
        
      
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>