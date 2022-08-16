<?php 
  include("../../../vendor/autoload.php");
  
  use Libs\Database\ProductTable;
  use Libs\Database\MYSQL;

  $table = new ProductTable(new MYSQL());

  $id = $_GET["pid"] ?? "undefined";

  $product = $table->getById($id);

  include("../layouts/header.php"); 
?>

<section>
  <div class="details_product ">
    <div class="container-fluid">
      <div class="row">
        <div class="shop-title bg-primary w-full">
          <h3 class="h3">PRODUCT DETAILS</h3>
        </div>
      </div>
      <div class="details-area">
        <div class="container">
          <div class="row">
            <?php include("../layouts/side.php") ?>
            <div class="col-12 col-md-5">
              <p style="font-size:13px" class="mt-3 text-primary">
                <a href="#"  class="mr-3">
                  Home
                </a> / 
                <a href="#" class="mr-3 ml-3">
                  <?= $product[0]->category ?>
                </a> / 
                <a href="#" class="ml-3">
                  <?= $product[0]->name ?>
                </a>
              </p>
              <img src="../../../public/images/products/<?= $product[0]->image ?>" class="d-block" alt="product-img" style="height:170px">
              <div class="thumb-area mt-4" style="height:100px">
                <img src="../../../public/images/product-thumb-1.jpg" alt="product thumb" style="height:70px">
                <img src="../../../public/images/product-thumb-2.jpg" alt="product thumb" style="height:70px">
                <img src="../../../public/images/product-thumb-3.jpg" alt="product thumb" style="height:70px">
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="add-products">
                <h3 class=" d-block text-warning">
                  <?= $product[0]->name ?>
                </h3>
                <ins class="d-inline text-primary" style="font-size:13px;text-decoration:none">
                  <?= number_format($product[0]->price) ?> MMK
                </ins>
                <form action="../../../HTTP/_actions/site/order/add-to-cart.php?pid=<?= $product[0]->id ?>" class="cart" method="post">
                  <div class="quantity d-inline">
                    <input type="number" size="4" class="input-text mt-3 qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                  </div>
                  <button class="btn btn-primary ml-4 add_to_cart_button" type="submit">Add to Cart</button>
                </form>
                <div class="product-inner-category" style="font-size:14px">
                  <p class="mt-4">
                    Category: 
                    <a href="#">
                      <?= $product[0]->category ?>
                    <br>
                    </a>Tags: 
                    <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                </div>
                <!-- <div class="product-summary">
                  <ul class="nav nav-tabs">
                    <li class="active nav nav-item"><a data-toggle="tab" href="#description" style="padding:20px">Description</a></li>
                    <li class="nav nav-item"><a data-toggle="tab" href="#summary" style="padding:20px">Summary</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="description" class="tab-pane mt-3 active" style="padding:10px">
                      <p class="text-warning">
                        <?= $product[0]->description ?>
                      </p>
                    </div>
                    <div id="summary" class="mt-3 tab-pane" style="padding:10px">
                      <p class="text-warning">
                        <?= $product[0]->summary ?>
                      </p>
                    </div>    
                  </div>
                </div> -->
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                      <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <?= $product[0]->description ?>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <?= $product[0]->summary ?>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php include("../layouts/footer.php") ?>

