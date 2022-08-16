<?php

  include("../../../vendor/autoload.php");

  use Libs\Database\UsersTable;
  use Libs\Database\MYSQL;
  use Helpers\AuthSite;

  $table = new UsersTable(new MYSQL());
  $auth = AuthSite::check();

  $user = $table->findById($auth->id);
?>

<?php include("../layouts/header.php") ?>

<div class="container emp-profile">
  <div class="row">
      <div class="col-md-4">
          <div class="profile-img">
              <img src="../../../public/images/users/<?= $user[0]->image ?>" alt="profile_image" style="height: 120px;width:120px">
          </div>
      </div>
      <div class="col-md-6">
          <div class="profile-head">
                      <h5 class="text-warning">
                          <?= $user[0]->name ?>
                      </h5>
                      <h6 class="text-success">
                        <?php if($user[0]->status == 1): ?>
                          <p class="text-success">
                            Online User
                          </p>
                        <?php else: ?>
                          <p class="text-danger">
                            Offline
                          </p>
                        <?php endif ?>  
                      </h6>
              <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                  </li>
              </ul>
          </div>
      </div>
      <div class="col-md-2">
          <a href="./edit.php?uid=<?= $user[0]->id ?>" class="btn btn-success btn-sm">Edit Profile</a>
      </div>
  </div>
  <div class="row">
      <div class="col-md-4 d-none d-md-block">
          <div class="profile-work">
              <p>WORK LINK</p>
              <a href="">Website Link</a><br/>
              <a href="">Bootsnipp Profile</a><br/>
              <a href="">Bootply Profile</a>
              <p>SKILLS</p>
              <a href="">Web Designer</a><br/>
              <a href="">Web Developer</a><br/>
              <a href="">WordPress</a><br/>
              <a href="">WooCommerce</a><br/>
              <a href="">PHP, .Net</a><br/>
          </div>
      </div>
      <div class="col-md-8 col-12 mt-5">
          <div class="tab-content profile-tab" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <label>Name</label>
                    </div>
                    <div class="col-md-6">
                        <p>
                          <?= $user[0]->name ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Email</label>
                    </div>
                    <div class="col-md-6">
                        <p>
                          <?= $user[0]->email ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Phone</label>
                    </div>
                    <div class="col-md-6">
                        <p>
                        <?= $user[0]->phone_number ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>
                          Address
                        </label>
                    </div>
                    <div class="col-md-6">
                        <p>
                          <?= $user[0]->address ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <label>
                        City
                      </label>
                  </div>
                  <div class="col-md-6">
                      <p>
                        <?= $user[0]->city ?>
                      </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <label>
                        Postal Code
                      </label>
                  </div>
                  <div class="col-md-6">
                      <p>
                        <?= $user[0]->postal_code ?>
                      </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <label>
                        Joined Date
                      </label>
                  </div>
                  <div class="col-md-6">
                      <p>
                        <?= $user[0]->created_at ?>
                      </p>
                  </div>
                </div>
                <div class="row">
                  <a href="../../../HTTP/_actions/site/logout.php" class="btn btn-sm btn-danger mt-3 ml-3  px-4">Logout</a>
                </div>
              </div>
          </div>
      </div>

  </div>        
</div>

<?php include("../layouts/footer.php") ?>