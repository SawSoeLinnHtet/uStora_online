<?php

  include("../../../../vendor/autoload.php");

  use Libs\Database\ProductTable;
  use Libs\Database\CartTable;
  use Libs\Database\MYSQL;

  use Helpers\HTTP;

  $id = $_GET["pid"] ?? "undefined";
  $quantity = $_POST["quantity"] ?? "undefined";

  $product_table = new ProductTable(new MYSQL());
  $cart_table = new CartTable(new MYSQL());
  $cart_item = $product_table->getById($id);

  session_start();
  $user_id = $_SESSION["user"][0]->id;

  $cart = [
    "product_id"=> $cart_item[0]->id,
    "product_image"=> $cart_item[0]->image,
    "product_name"=> $cart_item[0]->name,
    "product_price"=> $cart_item[0]->price,
    "user_id"=> $user_id,
    "quantity" => $quantity
  ];

  $cart_table->insert($cart);

  HTTP::redirect("/site/cart/index.php","success");

