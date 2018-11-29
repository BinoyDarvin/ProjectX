<?php
include_once 'includer.php';
if (login_check()) {
  redirect("main.php");
}

//generating the view
$body = "






";



html_generate('styles/index.css',$body );







?>



<div class="container">
<h1>Welcome to <span class="otium">Otium</span></h1>


<a href="login.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Login</a>
<br>
<a href="create-account.php" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Create account</a>
</div>