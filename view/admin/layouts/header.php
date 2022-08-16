<?php

  include("../../../vendor/autoload.php");
  use Helpers\AuthAdmin;

  $auth = AuthAdmin::check();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../public/css/style-admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container-fluid">
    <header>
      <div class="dashboard-nav-area">
        <div class="row">
          <div class="col-2" style="background-color:#1f2234;">
            <h3 class="text-white ml-3 mt-2">
              <span class="text-warning font-weight-bold">U</span> <span style="font-size: 13px;" class="d-none d-md-inline">stora</span>
            </h3>
          </div>
          <div class="col-10" style="background-color:#1f2234;">
            <div class="row">
              <div class="col-5 d-lg-inline d-none">
                <div class="input-group p-4 search-icon-bar">
                  <input type="text" class="form-control bg-light" id="inlineFormInputGroup" placeholder="Search..." style="border: 0;outline:none">
                  <div class="input-group-prepend">
                    <div class="input-group-text bg-light" style="border: 0;">
                      <i class="fa-solid fa-magnifying-glass text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-lg-7">
                <div class="nav-menu mt-2">
                  <ul class="float-right mr-4 mr-sm-0 mt-1 mt-lg-3">
                    <li>
                      <a href="#" class="color: #FAAB36;">
                        <i class="fa-solid fa-envelope"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="color: #FAAB36;">
                        <i class="fa-solid fa-bell"></i>
                      </a>
                    </li>
                    <li>
                      <span style="font-size: 15px;color: #FAAB36;">
                        <a href="../../../HTTP/_actions/admin/logout.php">Logout</a>
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>                   
          </div>
        </div>
      </div>
    </header>
    <main>
      <div class="dashboard-main-area">
        <div class="row">
          