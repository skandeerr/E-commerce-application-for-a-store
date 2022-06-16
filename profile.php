<?php 
session_start();
if(!isset($_SESSION['nom'])){
    header('location:connexion.php');
}
include 'inc/functions.php';

$categories = getAllCategories();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Profile</title>
</head>
<body>
    <?php 
        include 'inc/header.php'
    ?>
                <div class="row m-3">
    <div class="col-md-5" >
        <div class="col card  text-center p-3" style="height:400px;" >
            <div>
                <img src="images/<?php echo $_SESSION['photo']?>" height="200px" width="200px" alt="">
            </div>
            
            <div class="mb-3">
                <h3><?php echo $_SESSION['nom']   ?> <?php echo $_SESSION['prenom']   ?> </h3>
            </div>
            
            
        </div>
    </div>
    <div class="col-md-7 card">
        <table class="table">
            
            <tbody>
              <tr>
                <th scope="row">Nom complet</th>
                <td><?php echo $_SESSION['nom']   ?> <?php echo $_SESSION['prenom']   ?></td>
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
         
    <?php
        include 'inc/footer.php';
      ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>