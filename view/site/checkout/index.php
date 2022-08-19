<?php 
  include("../../../vendor/autoload.php");

  use Libs\Database\CartTable;
  use Libs\Database\MYSQL;
   
  session_start();
  $id = $_SESSION["user"][0]->id;

  $table = new CartTable(new MYSQL());

  $carts = $table->getByUserId($id);
?>

<?php include("../layouts/header.php") ?>
<section>
  <div class="details_product shop-area">
    <div class="container-fluid">
      <div class="row">
        <div class="shop-title bg-primary w-full">
          <h3 class="h3">CHECKOUT</h3>
        </div>
      </div>
      <div class="details-area mt-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="checkout-area table-responsive">
                <table class="table table-white">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">PRODUCTS</th>
                      <th scope="col">PRICE</th>
                      <th scope="col">TOTLE PRICE</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $grand_total = 0; ?>
                    <?php foreach($carts as $cart): ?>
                    <tr>
                      <td>
                        <img src="../../../public/images/products/<?=  $cart->product_image ?>" alt="cart-item-img" style="height:70px">
                      </td>
                      <td>
                        <?= $cart->product_name ?>
                      </td>
                      <td>
                        <?= number_format($cart->product_price)." x ".$cart->quantity ?>
                      </td>
                      <td>
                        <?=  $cart->product_price * $cart->quantity  ?> MMK
                      </td>
                    </tr>
                    <?php $grand_total += ($cart->product_price * $cart->quantity); ?>
                    <?php endforeach ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        <span>
                          Grand Total
                        </span>
                      </td>
                      <td>
                        <?= $grand_total ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="actions">
                        <a href="../cart/" class="btn btn-info btn-sm px-3 text-white">
                          Back
                        </a>
                      </td>
                      <td></td>
                      <td></td>
                      <td class="actions">
                        <a href="../../../HTTP/_actions/site/check_out/check-out.php" class="btn btn-primary btn-sm px-3 float-right">
                          Order Now
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include("../layouts/footer.php") ?>