<?php 

  include("../../../../vendor/autoload.php");

  use Libs\Database\ProductTable;
  use Libs\Database\MYSQL;
  use Helpers\HTTP;

  $table = new ProductTable(new MYSQL());

  if($_FILES['cover_image']['error'] == 0){

    $cover_name = $_FILES['cover_image']['name'];
    $cover_error = $_FILES['cover_image']['error'];
    $cover_tmp = $_FILES['cover_image']['tmp_name'];
    $cover_type = $_FILES['cover_image']['type'];
  
    if($cover_error){
      HTTP::redirect('/admin/product/index.php','image_error');
    }
  
    if($cover_type === 'image/png' || $cover_type === 'image/jpg' || $cover_type === 'image/jpeg' || $cover_type === 'image/webp'){
      move_uploaded_file($cover_tmp,"../../../../public/images/products/".$cover_name);
    }
   }else{
    $cover_name = $_GET["pimg"];
  }

  $id = $_GET["pid"] ?? "undefined";

  $name = $_POST["name"] ?? "undefined";
  $category_id = $_POST["category"] ?? "undefined";
  $quantity = $_POST["quantity"] ?? "undefined";
  $price = $_POST["price"] ?? "undefined";
  $image = $cover_name;
  $description = $_POST["description"] ?? "undefined";
  $summary = $_POST["summary"] ?? "undefined";

  $table->edit($id, $name, $category_id, $quantity, $price, $image, $description, $summary);

  HTTP::redirect("/admin/product/index.php","success");

  
  