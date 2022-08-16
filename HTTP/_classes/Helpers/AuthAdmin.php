<?php

namespace Helpers;

class AuthAdmin
{
  static function check(){
    session_start();

    if(isset($_SESSION["admin"])){
      return $_SESSION["admin"][0];
    }else{
      HTTP::redirect("/admin/auth/login.php");
    }
  }
}