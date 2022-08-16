<?php 

  include("../../../../vendor/autoload.php");

  use Libs\Database\CategoryTable;
  use Libs\Database\MYSQL;
  Use Helpers\HTTP;

  $table = new CategoryTable(new MYSQL());

  $id = $_GET["cgid"] ?? "undefined";

  $table->delete($id);
  HTTP::redirect("/admin/category/index.php","success");
