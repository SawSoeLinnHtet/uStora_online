<?php 
  include("../../../vendor/autoload.php");

  use Libs\Database\ProductTable;
  use Libs\Database\MYSQL;
  use Libs\Database\CategoryTable;

  $categoryTable = new CategoryTable(new MYSQL());
  $productTable = new ProductTable(new MYSQL());
  $products = $productTable->getAll();
  $categories = $categoryTable->getAll();
?>

<?php include("../layouts/header.php") ?>

    <?php include("../layouts/aside.php") ?>
      <div class="col-9 col-lg-10 p-0 bg-dark">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6">
              <h5 style="line-height: 70px;margin-left:20px">
                <i class="fa-solid fa-warehouse text-white mr-3" style="font-size:17px"></i>
                <span class="font-weight-bold text-white">
                  Products
                </span>
              </h5>
            </div>
            <div class="col-12 col-lg-6">
              <a href="./create.php" class="btn btn-primary btn-sm float-right mr-3 mt-4">
                Create New Product
              </a>
            </div>
          </div>
          <div class="row p-3">
            <?php if (isset($_GET['image_error'])) : ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>
                  Image Error!
                </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif ?>

            <div class="container table-responsive">
              <table class="table table-hover text-center table-dark" style="border-radius: 5px">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Catagory</th>
                    <th scope="col">Instock Quantities</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($products as $product): ?>
                  <tr>
                    <td>
                      <img src="../../../public/images/products/<?= $product->image ?>" alt="product_photo" class=" img-thumbnail" style="height:60px">
                    </td>
                    <td class="">
                      <?= $product->name ?>
                    </td>
                    <td class="">
                      <?= $product->category ?>
                    </td>
                    <td>
                      <?= $product->quantity ?>
                    </td>
                    <td>
                      <?= number_format($product->price) ?> MMK
                    </td>
                    <td>
                      <p style="font-size: 13px;">
                        <span>
                          <a href="./edit.php?pid=<?= $product->id ?>" class="mr-2">Edit</a>
                        </span>
                        <span>
                          <a href="../../../HTTP/_actions/admin/product/delete.php?pid=<?= $product->id ?>" class="ml-2 text-danger">Delete</a>
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