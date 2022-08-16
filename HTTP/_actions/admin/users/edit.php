<?php

include("../../../../vendor/autoload.php");

use Libs\Database\UsersTable;
use Libs\Database\MYSQL;
use Helpers\HTTP;

$table = new UsersTable(new MYSQL());
  $id = $_GET["uuid"];

  $name = $_POST["name"] ?? 'undefined';
  $email = $_POST["email"] ?? 'undefined';
  $address = $_POST["address"] ?? 'undefined';
  $phone_number = $_POST["phone-number"] ?? 'undefined';
  $city = $_POST["city"] ?? 'undefined';
  $postal_code = $_POST["postal-code"] ?? 'undefined';



  $table->edit($id, $name, $email, $address, $phone_number, $city, $postal_code);

  HTTP::redirect("/admin/users/","edit_success");


