<?php 

  include("../../../vendor/autoload.php");

  use Libs\Database\UsersTable;
  use Libs\Database\MYSQL;
  use Helpers\HTTP;

  $table = new UsersTable(new MYSQL());

  $user_email = $_POST["email"] ?? "undefined";
  $user_password = md5($_POST["password"]) ?? "undefined";

  $user = $table->findByEmailAndPassword($user_email, $user_password);

  if($user){
    if($table->suspended($user[0]->id)){
      HTTP::redirect("/site/auth/login.php","suspended");
    }

    session_start();
    $_SESSION["user"] = $user;

    HTTP::redirect("/site/landing_page/index.php");
  }else{
    HTTP::redirect("/site/auth/login.php","incorrect");
  }
