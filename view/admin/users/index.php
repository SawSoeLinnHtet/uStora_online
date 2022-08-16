<?php
  include("../../../vendor/autoload.php");

  use Libs\Database\UsersTable;
  use Libs\Database\MYSQL;

  $table = new UsersTable(new MYSQL());

  $users = $table->getAll();
?>

<?php include("../layouts/header.php") ?>

    <?php include("../layouts/aside.php") ?>
      <div class="col-9 col-lg-10 p-0 bg-dark">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6">
              <h5 style="line-height: 70px;margin-left:20px">
                <i class="fa-solid fa-users text-white mr-3" style="font-size:17px"></i>
                <span class="font-weight-bold text-white">
                  Users List
                </span>
              </h5>
            </div>
            <div class="col-12 col-lg-6">
              <a href="./create.php" class="btn btn-primary btn-sm float-right mr-3 mt-4">
                Create New User
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
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">City</th>
                    <th scope="col">Postal Code</th>
                    <th scope="col">Action</th>
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
                      <?= $user->address ?>
                    </td>
                    <td>
                      <?= $user->phone_number ?>
                    </td>
                    <td>
                      <?= $user->city ?>
                    </td>
                    <td>
                      <?= $user->postal_code ?>
                    </td>
                    <td>
                      <a href="./edit.php?uuid=<?= $user->id ?>">
                        Edit
                      </a>
                      <?php if($user->suspended == 0): ?>
                      <a href="../../../HTTP/_actions/admin/users/suspend.php?uuid=<?= $user->id ?>" class="ml-4 text-info">
                        Active
                      </a>
                      <?php endif ?>
                      <?php if($user->suspended == 1): ?>
                      <a href="../../../HTTP/_actions/admin/users/suspend.php?uuid=<?= $user->id ?>" class="ml-4 text-warning">
                        Ban
                      </a>
                      <?php endif ?>
                      <a href="../../../HTTP/_actions/admin/users/delete.php?uuid=<?= $user->id ?>" class="ml-4 text-danger">
                        Delete
                      </a>
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