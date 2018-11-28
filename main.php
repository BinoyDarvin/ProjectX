<?php

include_once 'includer.php';

if (login_check()) {
  $user_id = login_check();
  $user_name = (db_query('SELECT *FROM users WHERE id = :user_id', array(':user_id' => $user_id), true))[0]['username'];

//generating a page with custom html_generate function located at includes dir

$result  = db_query('SELECT *FROM main WHERE user_id  = :user_id', array(':user_id' => $user_id), true);

if (!$result) {
  $output = '<h1>No Accounts found..!</h1><br>
  <p>Please add a account <a href="add_account.php">Here..</a></p>';
}

else {

  $user_data = db_query('SELECT * FROM users WHERE')

}





html_generate('styles/main.css', $output);




}

else {
  redirect("login.php");
}





 ?>
