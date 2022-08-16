<?php 
include("../../../vendor/autoload.php");

use Libs\Database\AdminTable;
use Libs\Database\MYSQL;
use Helpers\HTTP;

$table = new AdminTable(new MYSQL());

$admin_email = $_POST["email"] ?? "undefined";
$admin_password = md5($_POST["password"]) ?? "undefined";

$admin = $table->findByEmailAndPassword($admin_email, $admin_password);

if($admin){
  if($table->suspended($admin[0]->id)){
    HTTP::redirect("/admin/auth/login.php", "Suspended=1");
  }
  session_start();
  $_SESSION["admin"] = $admin;

  HTTP::redirect("/admin/dashboard/index.php");
}else{
  HTTP::redirect("/admin/auth/login.php","incorrect=1");
}
