<?php 

  include("../../../vendor/autoload.php");

  use Libs\Database\CartTable;
  use Libs\Database\MYSQL;

  $table = new CartTable(new MYSQL());

  session_start();
  $id = $_SESSION["user"][0]->id;

  $cart_items = $table->getByUserId($id);
?>
<?php include("../layouts/header.php") ?>
<section>
  <div class="details_product shop-area">
    <div class="container-fluid">
      <div class="row">
        <div class="shop-title bg-primary w-full">
          <h3 class="h3">SHOPPING CART </h3>
        </div>
      </div>
      <div class="details-area mt-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <form action="../test.php" method="post">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">PRODUCTS</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">QUANTITY</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($cart_items as $cart_item): ?>
                      <tr>
                        <td>
                          <img src="../../../public/images/products/<?= $cart_item->product_image ?>" alt="cart-item-img" style="height:70px">
                        </td>
                        <td>
                          <?= $cart_item->product_name ?>
                        </td>
                        <td>
                          <?= number_format($cart_item->product_price) ?>
                        </td>
                        <td>
                          <a href="../../../HTTP/_actions/site/order/plugin/minus-one.php?cid=<?= $cart_item->id ?>" style="font-size:20px">-</a>
                          <input type="cc" size="1" class="input-text qty text" title="Qty" value="<?= $cart_item->quantity ?>" min="0" step="0" name="quantity" disabled style="text-align:center">
                          <a href="../../../HTTP/_actions/site/order/plugin/plus-one.php?cid=<?= $cart_item->id ?>" style="font-size:20px">+</a>
                        </td>
                        <td>
                          <a href="../../../HTTP/_actions/site/order/delete.php?cid=<?= $cart_item->id ?>" class="btn btn-danger btn-sm">
                            x
                          </a>
                        </td>
                      </tr>
                      <?php endforeach ?>
                      <tr>
                        <td class="actions" colspan="6">
                          <div class="coupon">
                          <label for="coupon_code">Coupon:</label>
                          <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="coupon input-text " name="coupon_code">
                          <a 
                            class="btn btn-primary btn-sm ml-2"
                            href="#" 
                            style="text-decoration: none;" 
                            class="white bold"
                          >
                              Apply Coupon
                          </a>
                          <a 
                            class="btn btn-primary btn-sm ml-2"
                            href="../shop_page/" style="text-decoration: none;" 
                            class="white bold"
                          >
                            Update Cart
                          </a>
                          <a 
                            href="../checkout/index.php" 
                            class="btn btn-primary btn-sm ml-2 font-weight-bold"
                            type ="submit"
                          >
                            Checkout
                          </a>
                          <a 
                            class="btn btn-danger btn-sm ml-2 white bold"
                            href="../../../HTTP/_actions/site/order/remove-all.php" 
                            style="text-decoration: none;"
                          >
                            Remove All
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php include("../layouts/footer.php") ?>