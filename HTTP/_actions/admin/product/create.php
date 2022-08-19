<?php 



include("../../../../vendor/autoload.php");

use Libs\Database\ProductTable;
use Libs\Database\MYSQL;
use Helpers\HTTP;

$table = new ProductTable(new MYSQL());

$cover_name = $_FILES['cover_image']['name'];
$cover_error = $_FILES['cover_image']['error'];
$cover_tmp = $_FILES['cover_image']['tmp_name'];
$cover_type = $_FILES['cover_image']['type'];

var_dump($cover_type);
if($cover_error){
  HTTP::redirect('/admin/product/create.php','image_error');
}
if($cover_type === 'image/png' || $cover_type === 'image/jpg' || $cover_type === 'image/jpeg' || $cover_type === 'image/webp'){
  move_uploaded_file($cover_tmp,"../../../../public/images/products/".$cover_name);

  $data = [
    'name' => $_POST["name"] ?? "undefined",
    'category_id' => $_POST["category"] ?? "undefined",
    'price' => $_POST["price"] ?? "undefined",
    'image' => $cover_name,
    'quantity' => $_POST["quantity"] ?? "undefined",
    'description' => $_POST["description"] ?? "undefined",
    'summary' => $_POST["summary"] ?? "undefined"
  ];
}else{
  HTTP::redirect('/admin/product/create.php','image_type');
}
if($data){
  $table->insert($data);
  HTTP::redirect("/admin/product/index.php","created_success");
}else{
  HTTP::redirect("/admin/product/create.php","created_fail");
}

