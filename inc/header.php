<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">E-SHOP</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categorie
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php
                    foreach($categories as $categorie){
                      $id = $categorie['id'];
                      print '<li><a class="dropdown-item" href="produit_cat.php?idc='.$id.'">'.$categorie['nom'].'</a></li>';
                    }

                  ?>
                  
                </ul>
              </li>
            <?php 
              if(isset($_SESSION['nom'])){
                print ' <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
              </li>';
              if(isset($_SESSION['panier']) && is_array($_SESSION['panier'][3])){
              print '<li class="nav-item">
                <a class="nav-link active" class="bi bi-cart" aria-current="page" href="panier.php">('.count($_SESSION['panier'][3]).')</a>
              </li>';}else{
                print '<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>(0)</a></li>';
              }} else {
                print '<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="registre.php">Registre</a>
              </li>';
              }
            ?>
            
            </ul>
            <form class="d-flex" action="index.php" method="POST">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <?php 
                if(isset($_SESSION['nom'])){
                  print'<a href="deconnexion.php" style="font-size : 0.8rem !important; margin-left:5px; " class="btn btn-primary">deconnexion</a>';
              }
            ?>
          </div>
        </div>
      </nav> 
      