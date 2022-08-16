<?php
  include("../../../vendor/autoload.php");

  use Libs\Database\AdminTable;
  use Libs\Database\MYSQL;

  $table = new AdminTable(new MYSQL());

  $users = $table->getAll();
?>

<?php include("../layouts/header.php") ?>

    <?php include("../layouts/aside.php") ?>
      <div class="col-lg-10 col-9 p-0 bg-dark">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6">
              <h5 style="line-height: 70px;margin-left:20px">
                <i class="fa-solid fa-user-graduate text-white mr-3" style="font-size:17px"></i>
                <span class="font-weight-bold text-white">
                  Admins List
                </span>
              </h5>
            </div>
            <div class="col-12 col-lg-6">
              <a href="#" class="btn btn-primary btn-sm float-right mr-3 mt-4">
                Create New Admin
              </a>
            </div>
          </div>
          <div class="row p-3">
            <div class="container table-responsive">
              <table class="table table-hover table-dark" style="border-radius: 5px">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($users as $user): ?>
                  <tr>
                    <td>
                      <?= $user->name ?>
                    </td>
                    <td>
                      <?= $user->email ?>
                    </td>
                    <td>
                      <?= $user->role ?>
                    </td>
                    <td>
                      <?= $user->phone_number ?>
                    </td>
                    <td>
                      <p>
                        <?php if($user->status == 0): ?>
                          <i class="fa-solid fa-circle text-danger mr-2">
                          </i>
                          <span class="font-weight-bold"> Offline</span>
                        <?php else: ?>
                          <i class="fa-solid fa-circle text-success mr-2">
                          </i>
                          <span class="font-weight-bold"> Active</span>
                        <?php endif ?>
                      </p>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

<?php include("../layouts/footer.php") ?>