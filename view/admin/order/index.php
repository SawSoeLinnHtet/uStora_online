<?php 

  include("../../../vendor/autoload.php");

  use Libs\Database\OrderTable;
  use Libs\Database\MYSQL;

  $table = new OrderTable(new MYSQL());
  $orders = $table->getAllOrders();
?>
<?php include("../layouts/header.php") ?>

    <?php include("../layouts/aside.php") ?>
      <div class="col-9 col-lg-10 p-0 bg-dark">
        <div class="container table-responsive">
          <div class="row">
            <div class="col-12 col-lg-6">
              <h5 style="line-height: 70px;margin-left:20px">
                <i class="fa-solid fa-cart-arrow-down text-white mr-3" style="font-size:17px"></i>
                <span class="font-weight-bold text-white">
                  Orders
                </span>
              </h5>
            </div>
          </div>
          <div class="row p-3">
            <div class="container">
              <table class="table table-hover text-center table-dark" style="border-radius: 5px">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Order Time</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($orders as $key => $order): ?>
                  <tr>
                    <td class="">
                      <?= $key + 1 ?>
                    </td>
                    <td class="">
                      <?= $order->product_name ?>
                    </td>
                    <td class="">
                      <?= $order->user_name ?>
                    </td>
                    <td class="">
                      <?= $order->total_price ?>
                    </td>
                    <td class="">
                      <?= $order->created_at ?>
                    </td>
                    <td>
                      <p style="font-size: 13px;">
                        <a href="#" class="mr-2">
                          Deliver
                        </a>
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