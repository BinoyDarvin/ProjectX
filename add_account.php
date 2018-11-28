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
$balance = 50000;
$last_transaction_id = 12;



//insert into acc_details
db_query("INSERT INTO acc_details VALUES('',:user_id,:bank_name,:balance,:last_transaction_id,:act_no,:mob_number,:ifsc)",array(':user_id' => $user_id, ':bank_name' => $bank_name,':balance' => $balance,':last_transaction_id' => $last_transaction_id,':act_no' => $act_no,':mob_number' => $mobile_number,':ifsc' => $ifsc));

//getting id from acc_details

$acc_id = db_query('SELECT * FROM acc_details WHERE act_no = :act_no', array(':act_no' => $act_no), true)[0]['id'];


//insert into main
db_query("INSERT INTO main VALUES('', :user_id, :bank_details_id)", array(':user_id' => $user_id, ':bank_details_id' => $acc_id ));

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
