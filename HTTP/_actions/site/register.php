<?php 

  include("../../../vendor/autoload.php");

  use Libs\Database\UsersTable;
  use Libs\Database\MYSQL;
  use Helpers\HTTP;

  $table = new UsersTable(new MYSQL());

  $password = md5($_POST["password"]) ?? "underfined";
  $comfirm_password = md5($_POST["comfirm-password"]) ?? "underfined";

  if($password != $comfirm_password){
    HTTP::redirect("/site/auth/register.php","password");
  }

  $data = [
    "name" => $_POST["name"] ?? "undefined",
    "email" => $_POST["email"] ?? "undefined",
    "password" => $password,
    "address" => $_POST["address"] ?? "undefined",
    "phone_number" => $_POST["phone-number"] ?? "undefined",
    "city" => $_POST["city"] ?? "undefined",
    "postal_code" => $_POST["postal-code"] ?? "undefined"
  ];

  if($table){
    $table->insert($data);
    HTTP::redirect("/site/auth/register.php","success");
  }else{
    HTTP::redirect("/site/auth/register.php","fail");
  }