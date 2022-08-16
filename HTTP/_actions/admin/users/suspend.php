<?php 

  include("../../../../vendor/autoload.php");

  use Libs\Database\UsersTable;
  use Libs\Database\MYSQL;
  use Helpers\HTTP;

  $user_id = $_GET["uuid"];
  
  $table = new UsersTable(new MYSQL());

  $user = $table->findById($user_id);

  if($table->suspended($user_id) == 0){
    $suspended = 1;
    $table->suspend($user_id, $suspended);
    HTTP::redirect("/admin/users/index.php","ban");
  }else{
    $suspended = 0;
    $table->suspend($user_id, $suspended);
    HTTP::redirect("/admin/users/index.php","active");
  }
