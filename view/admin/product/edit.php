<?php
  include("../../../vendor/autoload.php");

  use Libs\Database\ProductTable;
  use Libs\Database\MYSQL;
  use Libs\Database\CategoryTable;

  $id = $_GET["pid"] ?? "undefined";

  $categoryTable = new CategoryTable(new MYSQL());
  $productTable = new ProductTable(new MYSQL());
  $product = $productTable->getById($id);
  $categories = $categoryTable->getAll();
  
?>
<?php include("../layouts/header.php") ?>

  <?php include("../layouts/aside.php") ?>  
  
    <div class="col-lg-10 col-9 p-0 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h5 style="margin-left:20px;margin-top:20px">
              <i class="fa-solid fa-user-graduate text-white mr-3 ml-3" style="font-size:17px"></i>
              <span class="font-weight-bold text-white">
                Products Edit Form
              </span>
            </h5>
          </div>
          <div class="col-12 pr-5">
            <div class="container">
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
              <form action="../../../HTTP/_actions/admin/product/edit.php?pid=<?= $id ?>&&pimg=<?= $product[0]->image ?>" method="POST" enctype="multipart/form-data">
                <div class="form-row align-items-center p-4">
                  <div class="col-sm-12 my-1 mt-1">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Category Name..." name="name" value="<?= $product[0]->name ?>" required>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <select class="form-select bg-light border-0" aria-label="Default select example" style="height: 38px;width:100%;border-radius:3px" name="category" 
                    value="<?= $product[0]->category_id ?>" required>
                        <option value="<?= $product[0]->category_id ?>">
                          <?= $product[0]->category ?>
                        </option>
                      <?php foreach($categories as $category): ?>
                        <option value="<?= $category->id ?>">
                          <?= $category->name ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="number" class="form-control" id="inlineFormInputName" placeholder="Quantity..." name="quantity" value=<?= $product[0]->quantity ?> required>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Product Price..." name="price" value=<?= $product[0]->price ?> >
                  </div>
                  <div class="col-sm-12 my-1 mt-2">
                    <img src="../../../public/images/products/<?= $product[0]->image ?>" alt="" style="height: 200px;background-color:#fff;color:#fff">
                    <br>
                    <div class="file btn btn-sm btn-light mt-2">
                      Change Photo
                      <input type="file" name="cover_image"/>
                    </div>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" 
                    name="description"
                    id="exampleFormControlTextarea1" rows="3">
                      <?= $product[0]->description ?>
                    </textarea>
                  </div>
                  <div class="col-sm-12 my-1 mt-3">
                    <label class="sr-only" for="exampleFormControlTextarea1">Summary</label>
                    <textarea class="form-control" 
                    name="summary"
                    id="exampleFormControlTextarea1" rows="3">
                      <?= $product[0]->summary ?>
                    </textarea>
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