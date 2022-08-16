<?php 

  include("../../../../vendor/autoload.php");

  use Libs\Database\ProductTable;
  use Libs\Database\MYSQL;
  use Helpers\HTTP;

  $table = new ProductTable(new MYSQL());

  $id = $_GET["pid"] ?? "undefined";

  $table->delete($id);

  HTTP::redirect("/admin/product/index.php","success_delete");