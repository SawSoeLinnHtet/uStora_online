<?php 

  include("../../../vendor/autoload.php");

  use Helpers\AuthSite;
  use Libs\Database\CartTable;
  use Libs\Database\MYSQL;

  session_start();
  $id = $_SESSION["user"][0]->id;
  $table = new CartTable(new MYSQL());

  $carts = $table->getByUserId($id);

  $auth = AuthSite::check();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ustora</title>
  <link rel="stylesheet" href="../../../public/css/style-site.css">
  <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <header>
    <div class="header-area">
      <div class="container" style="position: relative;">
        <div class="row">
          <div class="col-md-8 col-sm-12">
            <div class="user-menu">
              <ul>
                <li class="mr-4">
                  <i class="fa-solid fa-cloud-sun" style="color:#f78104">
                  </i>
                  <a href="#" class="d-none d-md-inline-block">Wishlist</a>
                </li>
                <li class="mr-4">
                <i class="fa-solid fa-cart-shopping" style="color:#f78104"></i>
                  <a href="#" class="d-none d-md-inline-block">My Cart</a>
                </li>
                <li class="mr-4">
                <i class="fa-solid fa-money-check" style="color:#f78104"></i>
                  <a href="#" class="d-none d-md-inline-block">Checkout</a>
                </li>
                <li class="mr-4">
                  <?php if($auth): ?>
                    <i class="fa-solid fa-user" style="color:#f78104"></i>
                    <a href="../profile/index.php">
                      <?= $auth->name ?>
                    </a>
                  <?php else: ?>
                    <i class="fa-solid fa-right-to-bracket" style="color:#f78104"></i>
                    <a href="../auth/login.php">Login</a>
                  <?php endif ?>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 d-none d-md-block">
            <div class="header-right">
              <div class="dropdown float-right float-sm-center">
                <a class="dropdown-toggle drop-text" href="#" data-toggle="dropdown">
                  <span style="color:#FAAB36;">Currency:</span><span>USD</span>
                </a>
                <ul class="dropdown-menu drop-menu" style="color:#FAAB36">
                  <li class="dropdown-item" href="#">USD</a>
                  <li class="dropdown-item" href="#">INR</a>
                  <li class="dropdown-item" href="#">GBP</a>
                </ul>
              </div>
              <div class="dropdown float-right float-sm-center">
                <a class="dropdown-toggle drop-text" href="#" data-toggle="dropdown">
                  <span style="color:#FAAB36;">Language:</span><span>English</span>
                </a>
                <ul class="dropdown-menu drop-menu">
                  <li class="dropdown-item" href="#">English</a>
                  <li class="dropdown-item" href="#">Myanmar</a>
                  <li class="dropdown-item" href="#">Korea</a>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-warning" href="#" style="font-size: 30px;">
          U <span class="text-dark" style="font-size: 15px;"> Stora</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="position:relative">
          <span class="navbar-toggler-icon"></span>
          <span class="badge badge-danger" style="position:absolute;border-radius:100%">
            <?= count($carts) ?>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-size: 13px;z-index:100">
          <ul class="navbar-nav ml-auto mt-2">
            <li class="nav-item mr-md-3">
              <a class="nav-link" href="../landing_page/">Home</a>
            </li>
            <li class="nav-item mr-md-3">
              <a class="nav-link" href="../shop_page/">Products</a>
            </li>
            <li class="nav-item mr-md-3">
              <a class="nav-link" href="#">Category</a>
            </li>
            <li class="nav-item mr-md-3">
              <a href="../cart/" class="nav-link">Cart</a>
            </li>
            <li class="nav-item mr-md-3">
              <a class="nav-link" href="../checkout/">Checkout</a>
            </li>
            <li class="nav-item mr-md-3">
              <a class="nav-link" href="../profile/">Profile</a>
            </li>
            <li class="nav-item mr-md-3">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li>
              <a href="../cart/" style="text-decoration: none;cursor:pointer" class="cart-button my-sm-3">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="badge badge-white">
                  <?= count($carts) ?>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  
  <main>
 