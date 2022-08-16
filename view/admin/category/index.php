<?php
  include("../../../vendor/autoload.php");

  use Helpers\HTTP;
  use Libs\Database\CategoryTable;
  use Libs\Database\MYSQL;

  $table = new CategoryTable(new MYSQL());

  $categories = $table->getAll();
?>

<?php include("../layouts/header.php") ?>

    <?php include("../layouts/aside.php") ?>
      <div class="col-9 col-lg-10 p-0 bg-dark">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6">
              <h5 style="line-height: 70px;margin-left:20px">
                <i class="fa-solid fa-cubes-stacked text-white mr-3" style="font-size:17px"></i>
                <span class="font-weight-bold text-white">
                  Categories
                </span>
              </h5>
            </div>
            <div class="col-12 col-lg-6">
              <a href="./create.php" class="btn btn-primary btn-sm float-right mr-3 mt-4">
                Create New Category
              </a>
            </div>
          </div>
          <div class="row p-3">
            <div class="container table-responsive">
              <table class="table table-hover text-center table-dark" style="border-radius: 5px">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Product Type Quantities</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($categories as $category): ?>
                  <tr>
                    <td class="">
                      <?= $category->name ?>
                    </td>
                    <td>100</td>
                    <td>
                      <p style="font-size: 13px;">
                        <span>
                          <a href="./edit.php?cgid=<?= $category->id?>" class="mr-2">
                            Edit
                          </a>
                        </span>
                        <span>
                          <a href="../../../HTTP/_actions/admin/category/delete.php?cgid=<?= $category->id?>" class="ml-2 text-danger">
                            Delete
                          </a>
                        </span>
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