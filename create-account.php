<?php
require 'includer.php';

//only execute if submit button is clicked
if (isset($_POST['submit'])) {

  //taking the values from forms
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  //validating the inputs



if (count(db_query('SELECT *FROM users WHERE email = :email', array(':email' => $email), true)) == 0) {


  if (strlen($username) > 5 && strlen($username) < 16) {

    if (preg_match('/[a-zA-z0-9]+/', $username)) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          //now we can insert values into database
          db_query('INSERT INTO users VALUES("", :username, :password, :email)', array(':username' => $username, ':password' => password_hash($password, PASSWORD_DEFAULT), ':email' => $email));

        }//end of if 3
        else {
          echo "Invalid email";
        }//end of else 2

    }//end of if 2
    else {
      echo "Username error. Invalid charactors..";
    }//end of else 2



  }//end of if 1
  else {
    echo "Username length error";
  }//end of else 1

}//end of if 0

else {
  echo "Account already exists";
}//end of else 0



}








?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Account</title>
</head>
<body>


<form action="" method="POST">
<h1>Create an Account</h1>
<p><input type="text" name="username" placeholder="Enter your username"></p>
<p><input type="password" name="password" placeholder="Enter your password"></p>
<p><input type="email" name="email" placeholder="Enter your email"></p>
<p><button type="submit" name="submit">Create Account</button></p>
</form>

</body>
</html>
