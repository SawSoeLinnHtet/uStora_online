<?php 

include("../../../../vendor/autoload.php");

use Helpers\HTTP;
use Libs\Database\UsersTable;
use Libs\Database\MYSQL;

$table = new UsersTable(new MYSQL());

$data = [
  "name" => $_POST["name"] ?? 'underfined',
  "email" => $_POST["email"] ?? 'underfined',
  "password" => md5($_POST["password"]) ?? 'underfined',
  "address" => $_POST["address"] ?? 'underfined',
  "phone_number" => $_POST["phone-number"] ?? 'underfined',
  "city" => $_POST["city"] ?? 'underfined',
  "postal_code" => $_POST["postal-code"] ?? 'underfined',
];

if($table){
  $table->insert($data);
  HTTP::redirect("/admin/users/index.php","Registered=1");
}else{
  HTTP::redirect("/admin/users/create.php","fail=1");
}