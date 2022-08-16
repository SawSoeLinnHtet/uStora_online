<?php 

  include("../../../../vendor/autoload.php");

  use Libs\Database\UsersTable;
  use Libs\Database\MYSQL;
  use Helpers\HTTP;

  $table = new UsersTable(new MYSQL());

  if($_FILES['cover-image']['error'] == 0){

    $cover_name = $_FILES['cover-image']['name'];
    $cover_error = $_FILES['cover-image']['error'];
    $cover_tmp = $_FILES['cover-image']['tmp_name'];
    $cover_type = $_FILES['cover-image']['type'];
  
    if($cover_error){
      HTTP::redirect('/site/profile/edit.php','image_error');
    }
  
    if($cover_type === 'image/png' || $cover_type === 'image/jpg' || $cover_type === 'image/jpeg' || $cover_type === 'image/webp'){
      move_uploaded_file($cover_tmp,"../../../../public/images/users/".$cover_name);
    }
   }else{
    $cover_name = $_GET["uimg"] ?? "undefined";
  }

  $id = $_GET["uid"] ?? "undefined";

  $name = $_POST["name"] ?? 'undefined';
  $email = $_POST["email"] ?? 'undefined';
  $image = $cover_name;
  $address = $_POST["address"] ?? 'undefined';
  $phone_number = $_POST["phone-number"] ?? 'undefined';
  $city = $_POST["city"] ?? 'undefined';
  $postal_code = $_POST["postal-code"] ?? 'undefined';

  $table->siteEdit($id, $name, $email, $image, $address, $phone_number, $city, $postal_code);

  $user = $table->findById($id);

  HTTP::redirect("/site/profile/index.php","edit_success");