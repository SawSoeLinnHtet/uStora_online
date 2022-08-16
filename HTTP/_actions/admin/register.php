<?php 
  include("../../../vendor/autoload.php");

  use Libs\Database\MYSQL;
  use Libs\Database\AdminTable;
  use Helpers\HTTP;

  $table = new AdminTable(new MYSQL());

  $data = [
    "name" => $_POST["name"] ?? "undefined",
    "email" => $_POST["email"] ?? "undefined",
    "address" => $_POST["address"] ?? "undefined",
    "phone_number" => $_POST["phone-number"] ?? "undefined",
    "password" => md5( $_POST["password"]) ?? "undefined",
   ];

  if($table){
    $table->insert($data);

    HTTP::redirect('/admin/auth/login.php',"Registered=1");
  }else{
    HTTP::redirect("/admin/auth/register.php","Registered=0");    
  }

  