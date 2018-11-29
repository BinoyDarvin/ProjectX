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

          redirect('success_create.php');
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

$output = <<<HEREDOC
<div class="container">
<h1 class="form-head">Create Account</h1>
 <form class="" action="" method="post">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="username">
    <label class="mdl-textfield__label" for="sample3">Username</label>
  </div>
  <br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="password">
    <label class="mdl-textfield__label" for="sample3">Password</label>
  </div>

  <br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="email">
    <label class="mdl-textfield__label" for="sample3">Email</label>
  </div>

  <br>
  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" name="submit">
  Create account
  </button>
</form>

</div>


HEREDOC;



html_generate('styles/login.css', $output);






?>
