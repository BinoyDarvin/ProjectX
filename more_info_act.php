<?php
include_once 'includer.php';

$user_id = login_check();
$acc_num = $_GET['acc_num'];
$result = db_query('SELECT * FROM transactions WHERE user_id = :details AND act_no = :act_no', array(':details'=>$user_id, ':act_no' => $acc_num), true);
$account_details = db_query("SELECT * FROM acc_details WHERE user_id = :user_id AND act_no = :acc_num", array(":user_id"=>$user_id, ":acc_num"=>$acc_num), true);

?>


<html>


<h1>Bank details</h1>
<?php
$runner = 0;

$output1 = "
<div class='max-contain'>
<div class='details-card'><p>Bank : {$account_details[$runner]['bank_name']}</p>
<p>Balance : {$account_details[$runner]['balance']}</p>
<p>Account Number : {$account_details[$runner]['act_no']}</p>

<p>
IFSC Code : {$account_details[$runner]['ifsc']}
</p>

<p>Registered Account : {$account_details[$runner]['mob_number']}</p>
</div>
</div>";

html_generate('styles/more_info_act.css', $output1);

?>


<h1>Mini statement </h1>
<?php
$output2 = '';
$runner = 0;

while($runner < sizeof($result)){

$output2.= "
<div class='demo-card-event mdl-card mdl-shadow--2dp'>
  <div class='mdl-card__title mdl-card--expand'>
    <h4>
      {$result[$runner]['amt']}<br>
      {$result[$runner]['type']}<br>

    </h4>
  </div>
  <div class='mdl-card__actions mdl-card--border'>
    <a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect'>
      {$result[$runner]['date']}
    </a>
    <div class='mdl-layout-spacer'></div>
    <i class='material-icons'>event</i>
  </div>
</div>";









$runner++;
}

html_generate('styles/more_info_act.css', $output2);
?>






</html>
