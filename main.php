<?php

include_once 'includer.php';

if (login_check()) {

  $user_id = login_check();
  $user_name = (db_query('SELECT *FROM users WHERE id = :user_id', array(':user_id' => $user_id), true))[0]['username'];

//generating a page with custom html_generate function located at includes dir

$result  = db_query('SELECT *FROM main WHERE user_id  = :user_id', array(':user_id' => $user_id), true);

if (!$result) {
  echo '<h1>No Accounts found..!</h1><br>
  <p>Please add a account <a href="add_account.php">Here..</a></p>';
}

else {

  $user_data = db_query('SELECT * FROM users WHERE id = :user_id', array(':user_id' => $user_id), true);
  $act_details = db_query('SELECT * FROM acc_details WHERE user_id = :user_id', array(':user_id' => $user_id), true);

  $i = 0;
  while($i < sizeof($act_details)){
  echo "<h1>".$act_details[$i]['bank_name']."</h1>";
  echo "<h2>Balance : ".$act_details[$i]['balance']."</h2>";
  echo "<h3>Phone : ".$act_details[$i]['mob_number']."</h3>";
  echo "<br>";
  echo "<a style='color:blue' href='more_info_act.php?acc_num={$act_details[$i]["act_no"]}'>Display more info</a>";


$i++;
}//end of loop


  echo "<p style='color:red;'>Please add a account <a href='add_account.php'>Here..</a></p>";
}





//html_generate('styles/main.css', $output);




}

else {
  redirect("login.php");
}





 ?>
