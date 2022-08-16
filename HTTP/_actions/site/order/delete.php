<?php 

  include("../../../../vendor/autoload.php");

  use Libs\Database\CartTable;
  use Libs\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CartTable(new MYSQL());

  $id = $_GET["cid"] ?? "undefined";

  $table->delete($id);

  HTTP::redirect("/site/cart/index.php","item_delete");

  