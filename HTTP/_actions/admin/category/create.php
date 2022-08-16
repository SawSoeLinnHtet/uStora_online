<?php 

include("../../../../vendor/autoload.php");

use Libs\Database\CategoryTable;
use Libs\Database\MYSQL;
use Helpers\HTTP;

$table = new CategoryTable(new MYSQL());
$name = $_POST["name"] ?? "undefined";

if($table){
  $table->insert($name);

  HTTP::redirect("/admin/category/create.php","success");
}else{
  HTTP::redirect("/admin/category/create.php","fail");
}
