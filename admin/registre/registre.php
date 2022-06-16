<?php

$registreAlerte = 0;
if(isset($_GET['alert'])){
  $registreAlerte = 1;
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
          <h1 class="text-center">Registre Admin</h1>
      <form action="ajout.php" method ="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nom et prenom</label>
          <input type="text" class="form-control" name="nom" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">adresse</label>
          <input type="text" class="form-control" name="adresse" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Photo</label>
          <input type="file" class="form-control" name="image" id="exampleInputPassword1">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telephone</label>
            <input type="text" class="form-control" name="telephone" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="mp" id="exampleInputPassword1">
        </div>
       
        <button type="submit"  class="btn btn-primary">Registre</button>
      </form>
      </div> 
      <?php
        include '../../inc/footer.php';
      ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.6/sweetalert2.all.min.js"></script>
<?php 
if($registreAlerte == 1){
  print "<script>
  Swal.fire({
    icon: 'success',
    title: 'Success...',
    text: 'Creation de compte avec succes',
  })
</script>";
}

?>


</html>