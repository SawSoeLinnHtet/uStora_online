  <?php 
    include("../../../vendor/autoload.php");

    use Libs\Database\ProductTable;
    use Libs\Database\MYSQL;

    $table = new ProductTable(new MYSQL());

    $products = $table->getAll();
    ?>
    <?php
      include("../layouts/header.php");
    ?>
    <?php if (isset($_GET['order_success'])) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" style="position:absolute;z-index:200;margin-left:20px;margin-top:20px">
        <strong>Order Success!</strong>See Your Gmail Inbox
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif ?>
    <section>
      <div class="category-slider">
        <div class="container">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="block-slider carousel-item active">
                <img class="d-block w-100 position-relative" src="../../../public/images/h4-slide.webp" alt="First slide">
                <div class="caption position-absolute d-none d-lg-block">
                  <h3>iphone <span class="text-success">6 plus</span></h3>
                  <h5 class="display-block font-weight-bold text-primary" style="font-size: 15px">Dual Sim</h5>
                  <div class="mt-5">
                    <button class="slide-detail-button">
                      Show Detail
                    </button>
                    <button class="slide-shop-button">
                      Shop Now
                    </button>
                  </div>
                </div>
              </div>
              <div class="block-slider carousel-item">
                <img class="d-block w-100" src="../../../public/images/h4-slide2.webp" alt="Second slide">
                <div class="caption position-absolute d-none d-md-block">
                  <h3>supplies <span class="text-success">& Backpack</span></h3>
                  <h5 class="display-block font-weight-bold text-primary" style="font-size: 15px">20% Discount</h5>
                  <div class="mt-5">
                    <button class="slide-detail-button">
                      Show Detail
                    </button>
                    <button class="slide-shop-button">
                      Shop Now
                    </button>
                  </div>
                </div>
              </div>
              <div class="block-slider carousel-item">
                <img class="d-block w-100" src="../../../public/images/h4-slide3.webp" alt="Third slide">
                <div class="caption position-absolute d-none d-md-block">
                  <h3>Apple <span class="text-success">store Ipod</span></h3>
                  <h5 class="display-block font-weight-bold text-primary" style="font-size: 15px">Select Color</h5>
                  <div class="mt-5">
                    <button class="slide-detail-button">
                      Show Detail
                    </button>
                    <button class="slide-shop-button">
                      Shop Now
                    </button>
                  </div>
                </div>
              </div>
              <div class="block-slider carousel-item">
                <img class="d-block w-100" src="../../../public/images/h4-slide4.webp" alt="Third slide">
                <div class="caption position-absolute d-none d-md-block">
                  <h3>Apple <span class="text-success">store Ipod</span></h3>
                  <h5 class="display-block font-weight-bold text-primary" style="font-size: 15px">& Phone</h5>
                  <div class="mt-5">
                    <button class="slide-detail-button">
                      Show Detail
                    </button>
                    <button class="slide-shop-button">
                      Shop Now
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="fill: green;">
              <span class="carousel-control-prev-icon" aria-hidden="true">
              </span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"
              ></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="promo-area">
        <div class="container">
          <div class="row" style="padding: 30px 20px;justify-content:space-between">
            <div class="col-md-3 my-2">
              <div class="bg-primary promo-content">
                30 days Return
              </div>
            </div>
            <div class="col-md-3 my-2">
              <div class="bg-warning promo-content">
                New products
              </div>
            </div>
            <div class="col-md-3 my-2">
              <div class="bg-success promo-content">
                Free shipping
              </div>
            </div>
            <div class="col-md-3 my-2">
              <div class="bg-danger promo-content">
                Secure payments
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="product-area">
        <span class="mg-top" style="color:#E8AA42">
          Latest Product
        </span>
        <div class="container mt-5">
          <div class="row">
            <?php foreach($products as $product): ?>
              <div class="col-12 col-md-3 mb-5">
                <div class="latest-item mx-5 mx-md-1">
                  <img src="../../../public/images/products/<?= $product->image ?>" alt="product image" style="height:200px">
                  <span class="ml-2 mt-3 d-block" style="font-size: 20px;">
                    <?= $product->name ?>
                  </span>
                  <span class="ml-2 d-block text-primary" style="font-size: 15px;font-weight: bold;">
                    <?= number_format($product->price) ?> MMK
                  </span>
                  <a href="../details_page/index.php?pid=<?= $product->id ?>" class="btn btn-primary btn-sm ml-2 mt-2 font-weight-bold text-white">
                    See More
                  </a>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </section>
  <?php include("../layouts/footer.php") ?>