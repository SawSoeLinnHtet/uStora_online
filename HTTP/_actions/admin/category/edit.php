<?php 

include("../../../../vendor/autoload.php");

use Libs\Database\CategoryTable;
use Libs\Database\MYSQL;
use Helpers\HTTP;

$table = new CategoryTable(new MYSQL());

$id = $_GET["cgid"] ?? "undefined";
$name = $_POST["name"] ?? "undefined";

$table->edit($id, $name);

HTTP::redirect("/admin/category/index.php","success");