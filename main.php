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
  html_generate('styles/main.css', $output, $user_name);
}

else {

  $user_data = db_query('SELECT * FROM users WHERE id = :user_id', array(':user_id' => $user_id), true);
  $act_details = db_query('SELECT * FROM acc_details WHERE user_id = :user_id', array(':user_id' => $user_id), true);


html_generate('styles/main.css', '', true, $user_name);

  $i = 0;
echo "<div class='card-container'>";

  while($i < sizeof($act_details)){



      $output = <<<HEREDOC

   <div class="bank-tile">
   <div class="demo-card-square mdl-card mdl-shadow--2dp">
   <div class="inside-tile">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">{$act_details[$i]['bank_name']}</h2>
  </div>
  <div class="mdl-card__supporting-text">
    Balance : {$act_details[$i]['balance']}
    <br>
    Phone : {$act_details[$i]['mob_number']}
  </div>
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href='more_info_act.php?acc_num={$act_details[$i]['act_no']}'>
     More Options
    </a>
  </div>
</div>
</div>





HEREDOC;

echo $output;
$i++;
}//end of loop




   echo '<div class="add-acc"><a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" href="add_account.php">
   <i class="material-icons">add</i>
 </a>
 Add an Account
 </div>
 </div>';



}






echo "</body>";
echo "</html>";



}

else {
  redirect("login.php");
}





 ?>
