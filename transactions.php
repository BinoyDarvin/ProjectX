<?php
include 'includer.php';

html_generate('styles/transactions.css', '');

 ?>
 <style>

body{
  padding-top: 60px;
  text-align: center;
}

 </style>
<h1>Transfer Money</h1>
<form name = "transaction" action = "" method = "POST">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
   <input class="mdl-textfield__input" type="text" id="sample3" name = "amount">
   <label class="mdl-textfield__label" for="sample3">Enter the amount</label>
 </div>

<br>

 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="sample3" name = "recipient_account_number">
  <label class="mdl-textfield__label" for="sample3">Recipient account number</label>
 </div>
<br>

 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="sample3" name = "confirm_recipient_account_number">
  <label class="mdl-textfield__label" for="sample3">Confirm recipient account number</label>
 </div>

<br>

 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="sample3" name = "user_account_number">
  <label class="mdl-textfield__label" for="sample3">User account number</label>
 </div>

<br>


 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <input class="mdl-textfield__input" type="text" id="sample3" name = "recipient ifsc">
  <label class="mdl-textfield__label" for="sample3">Recipient IFSC</label>
 </div>

<br>


    <button type="submit" name ="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">SEND MONEY</button>


</form>
</html>

<?php

if(isset($_POST['recipient_account_number']))
{
    $con = new PDO("mysql:host=localhost;dbname=projectx","root", "");
    $con2 = new PDO("mysql:host=localhost;dbname=universal_open_bank","root", "");

    include_once "includer.php";
    $user_account_number = $_POST['user_account_number'];
     //login_check();
    $account_number = $_POST['recipient_account_number'];
    $confirm_account_number = $_POST['confirm_recipient_account_number'];
    $ifsc = $_POST['recipient_ifsc'];
    $transaction_amount =0+$_POST['amount'];


    $account_details = db_custom_query("universal_open_bank","SELECT * FROM users WHERE act_no = :act_no", array("act_no"=>$user_account_number), true);

    $user_id = $account_details[0]['id'];

    echo "<pre>";
    print_r($account_details);
    echo "</pre>";

    $available_balance =0+$account_details[0]['balance'];


    if($transaction_amount < $available_balance )
    {
            // here the amount is reduced from the one who sent and added a transaction to his ransaction table

            $balance_amount = $available_balance - $transaction_amount;
            $senter_balance_update = "UPDATE acc_details SET balance = :balance_amount WHERE user_id = :user_id AND act_no = :act_no";
            $result = $con->prepare($senter_balance_update);

            $transfer_prepared_data = array("balance_amount" => $balance_amount, "user_id" => $user_id, "act_no" =>$user_account_number);
            if($result -> execute($transfer_prepared_data))
            {
                echo "Transaction completed successfully";

                $transfer_sql = "INSERT INTO transactions VALUES(NULL,:id,:account_number,:amount,NULL,:type)";

                $stmt = $con->prepare($transfer_sql);
                $transfer_data = array("id"=>$user_id,"amount"=>$transaction_amount,"type"=>"debit","account_number"=>$user_account_number);
                $stmt->execute($transfer_data);

                //senter data entry ends here

                $credit_account_details = db_custom_query("universal_open_bank","SELECT * FROM users WHERE ifsc = :ifsc AND act_no = :act_no", array(":ifsc"=>$ifsc, "act_no"=> $account_number ), true);
                echo "<pre>";
                print_r($credit_account_details);
                echo "</pre>";

                $credited_balance_update = "UPDATE users SET balance = :balance_amount WHERE ifsc = :ifsc AND act_no = :act_no";
                $credited_result = $con2->prepare($credited_balance_update);
                $credited_preparing_data = array("balance_amount" => $credit_account_details[0]['balance']+$transaction_amount, "ifsc" => $ifsc, "act_no" => $account_number);

                $credited_result->execute($credited_preparing_data);

                // credit balance incrimented

                // from here on enterin credit transaction details

                $credit_transaction_query = "INSERT INTO transactions VALUES(NULL,:id,:account_number,:amount,NULL,:type)";
                $credit_transfer_data = array("id"=>$credit_account_details[0]['id'],"amount"=>$transaction_amount,"type"=>"credit","account_number"=>$account_number);

                $credit_stmt= $con2->prepare($credit_transaction_query);

                $credit_stmt->execute($credit_transfer_data);

            }
            else
                die ("Error while transfering data");







    }
    else
        die ("no sufficient bank balance");
}
else{
    echo("No sufficient data");
}




?>
