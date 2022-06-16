<?php 
session_start();
if(!isset($_SESSION['nom'])){
    header('location:connexion.php');
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

    <title>Profile Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">ADMIN</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../deconnexion.php">Deconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <?php
              include "template/navigation.php"

        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Profile</h1>
            </div>
            

            <div class="row m-3">
    <div class="col-md-5" >
        <div class="col card  text-center p-3" style="height:400px;" >
            <div>
                <img src="../images/<?php echo $_SESSION['photo']?>" height="200px" width="200px" alt="">
            </div>
            <div class="mb-3">
                <h3><?php echo $_SESSION['nom']   ?></h3>
            </div>
            
            
        </div>
    </div>
    <div class="col-md-7 card">
        <table class="table">
            
            <tbody>
              <tr>
                <th scope="row">Nom complet</th>
                <td><?php echo $_SESSION['nom']   ?></td>
               </tr>
              <tr>
                <th scope="row">Email</th>
                <td><?php echo $_SESSION['email']   ?></td>
               </tr>
              <tr>
                <th scope="row">telephone</th>
                <td colspan="2"><?php echo $_SESSION['telephone']   ?></td>
                </tr>
                <tr>
                    <th scope="row">Adresse</th>
                    <td colspan="2"><?php echo $_SESSION['adresse']   ?></td>
                </tr>
                
            </tbody>
          </table>

    </div>
</div>
          </div>

          </div>
            </main>

    <!-- Modal -->
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
              <input type="number" name="stock" class="form-control" placeholder="Nombre de stock de produit">

            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>
          
      
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    
  </body>
</html>