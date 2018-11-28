<?php
include_once 'includer.php';


if (login_check()) {

//if the button is clicked just enetr the values to db
if(isset($_POST['add_account'])) {

//configuring values
$bank_name = $_POST['bank_name'];
$act_no = $_POST['act_no'];
$ifsc = $_POST['ifsc'];
$mobile_number = $_POST['mobile_number'];
$balance = 50000;
$last_transaction_id = 12;




db_query("INSERT INTO acc_details VALUES('',:bank_name,:balance,:last_transaction_id,:act_no,:mob_number,:ifsc)",array(':bank_name' => $bank_name,':balance' => $balance,':last_transaction_id' => $last_transaction_id,':act_no' => $act_no,':mob_number' => $mobile_number,':ifsc' => $ifsc));

redirect('main.php');



}




//print add acnt page
$output ='
<form action="" method="post">


<p>Bank name
<input type="text" name="bank_name">
</p>

<p>Account Number
<input type="number" name="act_no">
</p>
<p>IFSC Code
<input type="text" name="ifsc">
</p>
<p>Mobile Number
<input type="number" name="mobile_number" value="">
</p>

<button type="submit" name="add_account">
Submit
</button>





</form>';



html_generate('styles/add_account.css', $output);






}

else {
  redirect("login.php");
}














 ?>
