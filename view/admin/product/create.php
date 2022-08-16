<?php
  include("../../../vendor/autoload.php");

  use Libs\Database\CategoryTable;
  use Libs\Database\MYSQL;
  
  $table = new CategoryTable(new MYSQL());

  $categories = $table->getAll();
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
                Products Create Form
              </span>
            </h5>
          </div>
          <div class="col-12 pr-5">
            <div class="container">
              <form action="../../../HTTP/_actions/admin/product/create.php" method="POST" enctype="multipart/form-data">
                <div class="form-row align-items-center p-4">
                <?php if (isset($_GET['fail'])) : ?>
                  <div class="alert alert-warning">
                    Cannot Create New Product!
                  </div>
                <?php endif ?>
                <?php if (isset($_GET['success'])) : ?>
                  <div class="alert alert-success">
                    Created New Product!
                  </div>
                <?php endif ?>
                  <div class="col-sm-12 my-1 mt-1">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Category Name..." name="name" required>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <select class="form-select bg-light border-0" aria-label="Default select example" style="height: 38px;width:100%;border-radius:3px" name="category" required>
                        <option selected>Open this select menu</option>
                      <?php foreach($categories as $category): ?>
                        <option value="<?= $category->id ?>">
                          <?= $category->name ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="number" class="form-control" id="inlineFormInputName" placeholder="Quantity..." name="quantity" required>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Product Price" name="price" required>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Default file input example</label>
                    <input class="form-control form-control-md" id="formFileLg" type="file" name="cover_image" required> 
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" placeholder="Description" 
                    name="description"
                    id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="exampleFormControlTextarea1">Summary</label>
                    <textarea class="form-control" placeholder="Summary" 
                    name="summary"
                    id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <button type="submit" class="btn text-light btn-sm px-5 float-left" style="background-color: #E8AA42;">
                      Create
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