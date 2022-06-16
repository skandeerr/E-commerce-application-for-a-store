<?php 
session_start();
if(!isset($_SESSION['nom'])){
    header('location:connexion.php');
}
include '../../inc/functions.php';
$categories = getAllCategories();
$produits = getAllProduit();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Profile Admin</title>

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
            <h1 class="h2">Liste Categories</h1>
                <a href="http://" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
            </div>
            <?php
                if(isset($_GET['ajout']) && $_GET['ajout']== 'ok' ){
                    print ' <div class="alert alert-success">
                    Produit Ajoutee avec succes
              </div>';
                }

            ?>
            <?php
                if(isset($_GET['sup']) && $_GET['sup']== 'ok' ){
                    print ' <div class="alert alert-success">
                    Produit Supprimee avec succes
              </div>';
                }

            ?>
             <?php
                if(isset($_GET['modif']) && $_GET['modif']== 'ok' ){
                    print ' <div class="alert alert-success">
                    Produit Modifiee avec succes
              </div>';
                }

            ?>
             <?php
                if(isset($_GET['erreur']) && $_GET['erreur']== 'duplicate' ){
                    print ' <div class="alert alert-danger">
                    nom de Produit deja existe 
              </div>';
                }

            ?>
        <div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=0;
                        foreach($produits as $produit){
                            $i++;
                            print ' <tr>
                            <th scope="row">'.$i.'</th>
                            <td>'.$produit['nom'].'</td>
                            <td>'.$produit['description'].'</td>
                            <td>'.$produit['prix'].'DT</td>
                            <td>
                                <a href="http://"  data-toggle="modal" data-target="#editModal'.$produit['id'].'" class="btn btn-outline-info">Modifier</a>
                                <a onclick="return popUpDeleteCategorie()" href="supprimer.php?idc='.$produit['id'].'" class="btn btn-outline-danger">Supprimer</a>
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
    

<!-- Modal Ajout-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajoutee Produits</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="ajout.php" method="POST" enctype="multipart/form-data">
           <div class="form-group">
               <input type="text" name="nom" required class="form-control"placeholder="Nom de la Produit">

           </div>
           <div class="form-group">
               <textarea name="description" required class="form-control"  placeholder="description de la Produit" ></textarea>
           </div>
           <div class="form-group">
               <input type="number" step="0.1"name="prix" required class="form-control"placeholder="Prix">

           </div>
           <div class="form-group">
               <input type="file" name="image" required class="form-control"placeholder="Prix">
           </div>
           <div class="form-group">
            <select name="Categorie" class="form-control">
                <?php
                    foreach($categories as $index => $c){
                        print '<option value="'.$c['id'].'">'.$c['nom'].'</option>';
                    }
                ?>
               
                
            </select>
            </div>
            <div class="form-group">
              <input type="number" name="stock" class="form-control" placeholder="Nombre de stock de produit">

            </div>
            <input type="hidden" name="createur" value="<?php echo $_SESSION['id']   ?>">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Modifiee-->
<?php  foreach($produits as $index => $produit){        ?>

    <div class="modal fade" id="editModal<?php echo $produit['id']   ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="modifier.php" method="POST" enctype="multipart/form-data" >
           <div class="form-group">
               <input type="hidden" value="<?php   echo $produit['id']   ?>" name="idc"/>
               <input type="text" value="<?php echo $produit['nom']    ?>" name="nom" class="form-control"placeholder="Nom de la produit">

           </div>
           <div class="form-group">
               <textarea name="description" class="form-control"placeholder="description de la produit" ><?php echo $produit['description']  ?></textarea>

           </div>
           <div class="form-group">
               <input type="number" step="0.1"name="prix" value="<?php echo $produit['prix']    ?>"required class="form-control"placeholder="Prix">

           </div>
           <div class="form-group">
               <input type="file" name="image" value="<?php  echo $produit['image']  ?>"  class="form-control"placeholder="Prix">
           </div>
           <select name="Categorie" class="form-control">
           <?php   foreach($categories as $index => $c){
        if($produit['categorie']==$c['id']){
          print '<option value="'.$c['id'].'" selected> '.$c['nom'].'</option>';
        }
    }        ?>
           

                <?php
                    foreach($categories as $index => $c){
                        print '<option value="'.$c['id'].'">'.$c['nom'].'</option>';
                    }
                ?>
                <input type="hidden" name="createur" value="<?php echo $_SESSION['id']   ?>">
                
            </select>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php }   ?>

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