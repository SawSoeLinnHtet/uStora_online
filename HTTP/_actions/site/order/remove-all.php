<?php 

  include("../../../../vendor/autoload.php");

  use Libs\Database\CartTable;
  use Libs\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CartTable(new MYSQL());

  session_start();
  $id = $_SESSION["user"][0]->id;

  $table->removeAllByUserid($id);

  HTTP::redirect("/site/cart/index.php","success");