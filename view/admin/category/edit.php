<?php
  include("../../../vendor/autoload.php");

  use Libs\Database\CategoryTable;
  use Libs\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CategoryTable(new MYSQL());
  $id = $_GET["cgid"] ?? "undefined";
  $category = $table->getById($id);

?>

<?php include("../layouts/header.php") ?>

  <?php include("../layouts/aside.php") ?>  
  
    <div class="col-10 p-0 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <h5 style="margin-left:20px;margin-top:20px">
              <i class="fa-solid fa-user-graduate text-white mr-3 ml-3" style="font-size:17px"></i>
              <span class="font-weight-bold text-white">
                Categories Create Form
              </span>
            </h5>
          </div>
          <div class="col-6 pr-5">
            <div class="container">
              <form 
              action="../../../HTTP/_actions/admin/category/edit.php?cgid=<?= $id?>" method="POST">
                <div class="form-row align-items-center p-4">
                <?php if (isset($_GET['fail'])) : ?>
                  <div class="alert alert-warning">
                    Cannot Create New Category!
                  </div>
                <?php endif ?>
                <?php if (isset($_GET['success'])) : ?>
                  <div class="alert alert-success">
                    Created New Category!
                  </div>
                <?php endif ?>
                  <div class="col-sm-12 my-1 mt-1">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Category Name..." name="name" required value="<?= $category[0]->name ?>">
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <button type="submit" class="btn text-light btn-sm px-5 float-left" style="background-color: #E8AA42;">
                      Edit
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include("../layouts/footer.php") ?>