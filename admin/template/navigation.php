<?php 

$_SEREVR['HTTP_HOST'] = "localhost/E-commerce";
?>

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
              
                <a class="nav-link " href="http://<?php echo $_SEREVR['HTTP_HOST']?>/admin/profile.php">
                  <span data-feather="home"></span>
                  Profile <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SEREVR['HTTP_HOST']?>/admin/categories/liste.php">
                  <span data-feather="file"></span>
                  Categories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SEREVR['HTTP_HOST']?>/admin/produits/liste.php">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SEREVR['HTTP_HOST']?>/admin/visiteur/liste.php">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SEREVR['HTTP_HOST']?>/admin/stock/liste.php">
                  <span data-feather="bar-chart-2"></span>
                  Stocks
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SEREVR['HTTP_HOST']?>/admin/commandes/liste.php">
                  <span data-feather="bar-chart-2"></span>
                  Commandes
                </a>
              </li>
              
            </ul>

          </div>
        </nav>