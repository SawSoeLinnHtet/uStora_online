<?php 

 namespace Helpers;

 class AuthSite
 {
  static function check(){
    session_start();

    if($_SESSION["user"]){
      return $_SESSION["user"][0];
    }
  }
 }