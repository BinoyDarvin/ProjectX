<?php
require 'includer.php';
//checking if the submit button was clicked
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = db_query('SELECT *FROM users WHERE username = :username', array(':username' => $username), true);
  if ($result) {

    $orig_pass = $result[0]['password'];
    if (password_verify($password, $orig_pass)) {

      //generating the tokens
      $true = true;
      $token = bin2hex(openssl_random_pseudo_bytes (64, $true));
      //inserting this token to the requested user id
      $user_id = $result[0]['id'];
      db_query("INSERT INTO login_tokens VALUES('', :token, :user_id)", array(":token" => sha1($token),":user_id" => $user_id));
      //setiing a cookie with this token
      setcookie('ENGTOK', $token, (time() + 60 * 60 * 24 * 7), '/', NULL, NULL, TRUE);
      setcookie('ENGTOK_HELP', rand(1, 1000000), (time() + 60 * 60 * 24 * 3), '/', NULL, NULL, TRUE);
      //after login redirect the user
      redirect("main.php");






    }

    else {
      echo "Incorrect password";
    }

  }
  else {
  echo "Username does not exists";
  }

}



 ?>


 <form class="" action="" method="post">
  <h1>Login</h1>
  <p><input type="text" name="username" placeholder="Enter username"></p>
  <p><input type="password" name="password" placeholder="Enter password"></p>
  <button type="submit" name="submit">Login</button>


 </form>
