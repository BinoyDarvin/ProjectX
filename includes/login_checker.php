<?php
//this function will check if the user is logged in or not
function login_check(){

if (isset($_COOKIE['ENGTOK'])) {

    //taking the token
    $token = $_COOKIE['ENGTOK'];
    //quering db with this token
    $user_id = db_query('SELECT user_id FROM login_tokens WHERE token = :token', array(':token' => sha1($token)), true)[0]['user_id'];

      if (isset($_COOKIE['ENGTOK_HELP'])) {
        //return the id of user
        return $user_id;

      }
      //else generate a new token for the user
      else{
       db_query('DELETE FROM login_tokens WHERE token = :token', array(':token' => sha1($_COOKIE['ENGTOK'])));
       $true = true;
       $token = bin2hex(openssl_random_pseudo_bytes (64, $true));
       //inserting this token to the requested user id
       db_query("INSERT INTO login_tokens VALUES('', :token, :user_id)", array(":token" => sha1($token),":user_id" => $user_id));
       //setiing a cookie with this token
       setcookie('ENGTOK', $token, (time() + 60 * 60 * 24 * 7), '/', NULL, NULL, TRUE);
       setcookie('ENGTOK_HELP', rand(1, 1000000), (time() + 60 * 60 * 24 * 3), '/', NULL, NULL, TRUE);
       return $user_id;

      }




}
return false;
}




 ?>
