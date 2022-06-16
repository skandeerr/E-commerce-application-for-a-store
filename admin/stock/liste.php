<?php 
session_start();
if(!isset($_SESSION['nom'])){
    header('location:connexion.php');
}
include '../../inc/functions.php';
$stocks = GetAllStock();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Admin : Stock</title>

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
            <h1 class="h2">Stock des produits</h1>
            </div>
           
            
             <?php
                if(isset($_GET['modif']) && $_GET['modif']== 'ok' ){
                    print ' <div class="alert alert-success">
                    Stock Modifiee avec succes
              </div>';
                }

            ?>
          
        <div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom de produit</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=0;
                        foreach($stocks as $stock){
                            $i++;
                            print ' <tr>
                            <th scope="row">'.$i.'</th>
                            <td>'.$stock['nom'].'</td>
                            <td>'.$stock['quantite'].'</td>
                            <td>
                                <a href="http://" class="btn btn-success" data-toggle="modal" data-target="#editModal'.$stock['id'].'">Modifier</a>
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
    


<!-- Modal Modifiee-->
<?php  foreach($stocks as $index => $stock){        ?>

    <div class="modal fade" id="editModal<?php echo $stock['id']   ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Stock de <?php echo $stock['nom']   ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="modifier.php" method="POST">
           <div class="form-group">
               <input type="hidden" value="<?php   echo $stock['id']   ?>" name="idc"/>
               <input type="number" value="<?php echo $stock['quantite']    ?>" name="quantite" class="form-control" placeholder="Stock de produit">

           </div>
      
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