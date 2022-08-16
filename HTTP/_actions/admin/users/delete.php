<?php 

include("../../../../vendor/autoload.php");

use Libs\Database\UsersTable;
use Libs\Database\MYSQL;
use Helpers\HTTP;

$table = new UsersTable(new MYSQL());
$id = $_GET["uuid"];

$table->delete($id);

HTTP::redirect("/admin/users/");