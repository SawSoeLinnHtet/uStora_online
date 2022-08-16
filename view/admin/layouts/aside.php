<?php
  include("../../../vendor/autoload.php");


  use Helpers\AuthAdmin;

  $auth = AuthAdmin::check();
?>

          <div class="col-3 col-lg-2" style="background-color:#1f2234;">
            <div class="side-bar-area">
              <div class="profile-area p-2 ml-2 mt-2">
                <div class="float-left" style="border-radius: 100%">
                  <img src="../../../public/images/photo-1583864697784-a0efc8379f70.jpeg" alt="profile">
                </div>
                <div class="float-left d-none d-md-inline">
                  <span class="ml-3 d-block " style="font-size:12px;color:#fff">
                    <?= $auth->name ?>
                  </span>
                  <span class="ml-3 d-inline" style="font-size:10px;text-decoration:none;color:#249EA0">
                    Admin
                  </span>
                </div>
              </div> 
              <hr>
              <div class="dashboard-option">
                <ul>
                  <li>
                    <a href="../dashboard/">
                      <i class="fa-solid fa-house text-white mr-3"></i>
                      <span class="d-none d-md-block">Dashboard</span>
                    </a>
                  </li>
                  <hr/>
                  <li>
                    <a href="../admins_list/">
                      <i class="fa-solid fa-user-graduate text-white mr-3"></i>
                      <span class="d-none d-md-block">Admins</span>
                    </a>
                  </li>
                  <hr/>
                  <li>
                    <a href="../users/">
                      <i class="fa-solid fa-users text-white mr-3"></i>
                      <span class="d-none d-md-block">Users</span>
                    </a>
                  </li>
                  <hr/>
                  <li>
                    <a href="../category/">
                      <i class="fa-solid fa-cubes-stacked text-white mr-3"></i>
                      <span class="d-none d-md-block">Categories</span>
                    </a>
                  </li>
                  <hr/>
                  <li>
                    <a href="../product/">
                      <i class="fa-solid fa-warehouse text-white mr-3"></i>
                      <span class="d-none d-md-block">Products</span>
                    </a>
                  </li>
                  <hr/>
                  <li>
                    <a href="../order/">
                    <i class="fa-solid fa-cart-arrow-down text-white mr-3"></i>
                      <span class="d-none d-md-block">Orders</span>
                    </a>
                  </li>
                  <hr/>
                </ul>
              </div> 
              <div class="switch-to-user">
                <a href="" class="mt-5" style="padding-left:10px;line-height:7.9rem;">
                  <i class="fa-solid fa-user text-white mr-3" style="font-size: 20px"></i>
                  <span class="text-success d-none d-md-inline">Switch </span>
                </a>
              </div>             
            </div>
          </div>