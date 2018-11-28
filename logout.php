<?php
require 'includer.php';
//checking submit button was clicked or not
if (!login_check()) {
  redirect("login.php");
}
if (isset($_POST['logout'])) {

//enter here only if logged in
if (!login_check()) {
  redirect("index.php");
}



  if (isset($_POST['alldevices'])) {
    logout(true);
    redirect("index.php");
  }
  else {
    logout();
    redirect("index.php");
  }


}




 ?>






<form class="" action="" method="post">
  <h1>Logout</h1>
  <input type="checkbox" name="alldevices"><span>Logout of all devices</span>
  <button type="submit" name="logout">Logout</button>
</form>
