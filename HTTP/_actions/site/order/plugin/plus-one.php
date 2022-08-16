<?php 

  include("../../../../../vendor/autoload.php");

  use Libs\Database\CartTable;
  use Libs\Database\MYSQL;
  use Helpers\HTTP;

  $id = $_GET["cid"] ?? "undefined";

  $table = new CartTable(new MYSQL());

  $row = $table->getQuantityById($id);

  $new_quantity = $row[0]->quantity + 1;

  $table->plusOne($id,$new_quantity);

  HTTP::redirect("/site/cart/index.php","success");


