<?php
include_once 'db.php';

function logout( $all = false){

  if ($all) {
    //this will delete tokens and all cookies
    db_query('DELETE FROM login_tokens WHERE user_id = :user_id', array(':user_id' => login_check()));
    setcookie('ENGTOK', '', (time() - 3600), '/', NULL, NULL, TRUE);
    setcookie('ENGTOK_HELP', '' , (time() - 3600), '/', NULL, NULL, TRUE);
  }
  else {
    //this will delete only one token
    db_query('DELETE FROM login_tokens WHERE token = :token', array(':token' => sha1($_COOKIE['ENGTOK'])));
    setcookie('ENGTOK', '', (time() - 3600), '/', NULL, NULL, TRUE);
    setcookie('ENGTOK_HELP', '' , (time() - 3600), '/', NULL, NULL, TRUE);
  }



}









 ?>
