<?php
include_once 'includer.php';
if (login_check()) {
  redirect("main.php");
}

 ?>

<h1>Hey, Welcome Dude!</h1>
<a href="login.php">Login</a>
<br>
<a href="create-account.php">Create account</a>
