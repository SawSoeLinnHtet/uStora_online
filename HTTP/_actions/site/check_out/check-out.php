<?php 

  include("../../../../vendor/autoload.php");

  use Libs\Database\CartTable;
  use Libs\Database\OrderTable;
  use Libs\Database\MYSQL;
  use Helpers\HTTP;
  use Helpers\AuthSite;

  $cart_table = new CartTable(new MYSQL());
  $order_table = new OrderTable(new MYSQL());
  $auth = AuthSite::check();
  $user_id = $auth->id;
  $carts = $cart_table->getByUserId($user_id);

  foreach($carts as $cart){
    $product_id = $cart->product_id;
    $product_price = $cart->product_price;
    $total_price = $cart->product_price * $cart->quantity;
    $user_id = $user_id;
    $quantity = $cart->quantity;

    $order_table->insert($product_id, $product_price, $total_price, $user_id, $quantity);
  }

  $cart_table->removeAllByUserid($user_id);

  HTTP::redirect("/site/landing_page/index.php","order_success");