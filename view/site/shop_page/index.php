<?php 

  include("../../../vendor/autoload.php");

  use Libs\Database\ProductTable;
  use Libs\Database\MYSQL;

  $table = new ProductTable(new MYSQL());

  $prducts = $table->getAll();
?>

<?php include("../layouts/header.php") ?>
  <section>
    <div class="shop-area mt-3">
      <div class="containe-fluid">
        <div class="row">
          <div class="shop-title bg-primary w-full">
            <h3 class="h3">SHOP</h3>
          </div>
        </div>
        <div class="product-area">
          <div class="container mt-5">
            <div class="row">
              <?php foreach($prducts as $product): ?>
              <div class="col-12 col-md-3 mb-3 mx-5 mx-md-0">
                <div class="product-item">
                  <img src="../../../public/images/products/<?= $product->image ?>" alt="product image">
                  <span class="ml-2 mt-3 d-block" style="font-size: 20px;">
                    <?= $product->name ?>
                  </span>
                  <span class="ml-2 d-block text-primary" style="font-size: 15px;font-weight: bold;">
                    <?= number_format($product->price) ?> MMK
                  </span>
                  <a class="btn btn-primary btn-sm ml-2 mt-2"
                    <a href="../details_page/index.php?pid=<?= $product->id ?>" style="text-decoration: none;
                    font-weight:bold;color:#fff;">See more</a>
                </div>
              </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php include("../layouts/footer.php") ?>