<?php 
session_start();
if(!isset($_SESSION['nom'])){
    header('location:connexion.php');
}
include '../../inc/functions.php';
$paniers = getAllPaniers();
$commandes = getAllCommandes();
if(isset($_POST['btn_Search'])){
  if($_POST['etat']=="tout"){
    $paniers = getAllPaniers();
  }else{$paniers = getParEtat($paniers,$_POST['etat']);}
  
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>ADMIN : COMMANDE</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../deconnexion.php">Deconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php
              include "../template/navigation.php"

        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste Commandes</h1>
            </div>
            
              <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
              <div class="form-group d-flex">
            <select class="form-control" name="etat" id="">
                    <option value="tout">Tout</option>
                    <option value="en cours">En cours</option>
                    <option value="en livraison">En livraison</option>
                    <option value="livraison termine">Livraison terminé</option>
            </select>
            
            <input type="submit" value="Chercher"class="btn btn-primary ml-2"name="btn_Search">
            </div>
       </form>
            
       
        <div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client</th>
                    <th scope="col">Total</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=0;
                        foreach($paniers as $panier){
                            $i++;
                            print ' <tr>
                            <th scope="row">'.$i.'</th>
                            <td>'.$panier['nom'].'</td>
                            <td>'.$panier['total'].' DDT</td>
                            <td>'.$panier['date_creation'].'</td>
                            <td>
                                <form action="liste.php" method="POST">
                                  <a href="http://"  class="btn btn-success" data-toggle="modal" data-target="#Commandes'.$panier['id'].'">Afficher</a>
                                  <a   class="btn btn-primary" data-toggle="modal" data-target="#traiter'.$panier['id'].'">Traiter</a>
                                </form>
                              </td>
                            </tr>';
                        }


                    ?>
                   
                  

                  
                </tbody>
            </table>
        </div>
          
           
         
          
        </main>
      </div>
    </div>
    <?php  foreach($paniers as $index => $panier){        ?>

<div class="modal fade" id="Commandes<?php echo $panier['id']   ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Liste des commandes</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
  <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nom de produit</th>
                    <th scope="col">image</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($commandes as $commande){
                            if($panier['id'] == $commande['panier']){
                            print ' <tr>
                            
                            <td>'.$commande['nom'].'</td>
                            <td><img src="../../images/'.$commande['image'].'" width=100 /img> </td>
                            <td>'.$commande['quantite'].'</td>
                            <td>'.$commande['total'].'</td>
                            
                            </tr>';
                        }}

                    ?>
                   
                  
                </tbody>
            </table>
</div>
</div>
</div>


<?php }  
        
?>
 <?php
  
  foreach($paniers as $index => $p){ ?>
    <div class="modal fade" id="traiter<?php echo $panier['id']   ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Categorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
           <div class="form-group">
               <input type="hidden" value="<?php echo $panier['id']   ?>" name="idc"/>
               
      
      </div>
      <div class="form-group">
              <select name="etat">
                  <option value="en livraison">En livraison</option>
                  <option value="livraison termine">Livraison terminee</option>
              </select>
               
      
      </div>
      
      </form>
    </div>
    </div>
    </div>


<?php
}
?>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/vendor/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      function popUpDeleteCategorie(){
        return confirm("voulez vous vraiment supprimer la categorie ?")
      }
    </script>
  </body>
</html>