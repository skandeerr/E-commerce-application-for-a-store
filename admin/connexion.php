<?php
session_start();
if(isset($_SESSION['nom'])){
  //header('location:profile.php');
}
include '../inc/functions.php';
$user = true ;

if(!empty($_POST)){
  $user = ConnectAdmin($_POST);

  
  if($user != false){
    Session_start();
    $_SESSION['nom']= $user['nom'];
    $_SESSION['id']= $user['id'];
    $_SESSION['email']= $user['email'];
    $_SESSION['mp']= $user['mp'];
    $_SESSION['adresse']= $user['adresse'];
    $_SESSION['photo']= $user['photo'];
    $_SESSION['telephone']= $user['telephone'];
    
    
    
    header('location:profile.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.6/sweetalert2.min.css">
  </head>
<body>

      <div class="p-5">
        <h1 class="text-center">Espace Admin : Connexion</h1>
    <form action="connexion.php" method="POST">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
          <input type="password" name="mp"class="form-control" id="exampleInputPassword1">
      </div>
     
      <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
    </div> 
      </div> 
      <?php
        include '../inc/footer.php';
      ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.6/sweetalert2.all.min.js"></script>
<?php 
if(!$user){
  print "<script>
  Swal.fire({
    icon: 'Error',
    title: 'Erreur',
    text: 'Email ou mot de passe non valide',
    timer : 2000 
  })
</script>";
}

?>
</html>