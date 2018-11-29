<?php



include_once 'includer.php';


if (login_check()) {
$user_id = login_check();
//if the button is clicked just enetr the values to db
if(isset($_POST['add_account'])) {


//configuring values
$bank_name = $_POST['bank_name'];
$act_no = $_POST['act_no'];
$ifsc = $_POST['ifsc'];
$mobile_number = $_POST['mobile_number'];

$result = db_custom_query('universal_open_bank', 'SELECT * FROM users WHERE act_no = :act_no AND mobile_no = :mobile_no', array(':act_no' => $act_no, ':mobile_no' => $mobile_number), true);
if (!$result) {
  die('User not found...Check your details and try again!');
}
else {

$universal_bank_user_id = $result[0]['id'];


$trans = db_custom_query('universal_open_bank', 'SELECT * FROM transactions WHERE user_id = :user_id',array(':user_id' =>$universal_bank_user_id ), true);


  $i = 0;
  while($i < sizeof($trans)){

  db_query("INSERT INTO transactions VALUES('', :user_id,:act_no, :amt, :type, :date)", array(':user_id' => $user_id, ':amt' => $trans[$i]['transaction'],':act_no' => $trans[$i]['act_no'] , ':type' => $trans[$i]['type'], ':date' => $trans[$i]['date']));
  $i++;
}//end of loop
}//end of else





//insert into acc_details
db_query("INSERT INTO acc_details VALUES('',:user_id,:bank_name,:balance,:act_no,:mob_number,:ifsc)",array(':user_id' => $user_id, ':bank_name' => $result[0]['bank_name'],':balance' => $result[0]['balance'],':act_no' => $result[0]['act_no'],':mob_number' => $result[0]['mobile_no'] ,':ifsc' => $result[0]['ifsc']));

//getting id from acc_details

$acc_id = db_query('SELECT * FROM acc_details WHERE act_no = :act_no', array(':act_no' => $act_no), true)[0]['id'];


//insert into main
db_query("INSERT INTO main VALUES('', :user_id, :bank_details_id)", array(':user_id' => $user_id, ':bank_details_id' => $acc_id ));

redirect('main.php');



}




//print add acnt page
$output ='
<form action="" method="post">

<h1>Fill in the details</h1>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="bank_name">
    <label class="mdl-textfield__label" for="sample3">Bank Name</label>
</div>



<br>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="act_no">
    <label class="mdl-textfield__label" for="sample3">Account Number</label>
  </div>


<br>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="ifsc">
    <label class="mdl-textfield__label" for="sample3">IFSC Code</label>
  </div>



<br>

<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="mobile_number">
    <label class="mdl-textfield__label" for="sample3">Mobile Number</label>
  </div>

<br>
<button type="submit" name="add_account" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
Submit
</button>





</form>';



html_generate('styles/add_account.css', $output);






}

else {
  redirect("login.php");
}














 ?>
