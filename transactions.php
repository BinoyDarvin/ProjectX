<html>


<form name = "transaction" action = "" method = "POST"><br><br>
    <input type = "text" name = "amount" placeholder = "Enter your amount" ><br><br>
    <input type = "text" name = "recipient_account_number" placeholder = "recipient_account_number"><br><br>
    <input type = "text" name = "confirm_recipient_account_number" placeholder = "confirm_recipient_account_number"><br><br>
    <input type = 'text' name = "user_account_number" placeholder="user account number"><br><br>
    <input type = "text" name = "recipient ifsc" placeholder = "recipient_ifsc"><br><br>
    <button type="submit" name ="submit" >send</button>


</form>
</html>

<?php

if(isset($_POST['recipient_account_number']))
{
    $con = new PDO("mysql:host=localhost;dbname=projectx","root", "");

    include_once "includer.php";
    $user_account_number = $_POST['user_account_number'];
    $user_id = login_check(); //login_check();
    $account_number = $_POST['recipient_account_number'];
    $confirm_account_number = $_POST['confirm_recipient_account_number'];
    $ifsc = $_POST['recipient_ifsc'];
    $transaction_amount =0+$_POST['amount'];


    $account_details = db_query("SELECT * FROM acc_details WHERE user_id = :user_id AND act_no = :act_no", array(":user_id"=>$user_id, "act_no"=>$_SESSION['account_number']), true);


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

                $transfer_sql = "INSERT INTO transactions VALUES(NULL,:user_id,:amount,:type,NULL)";

                $stmt = $con->prepare($transfer_sql);
                $transfer_data = array("user_id"=>$user_id,"amount"=>$transaction_amount,"type"=>"debit");
                $stmt->execute($transfer_data);

                //senter data entry ends here


                $credit_account_details = db_query("SELECT * FROM acc_details WHERE ifsc = :ifsc AND act_no = :act_no", array(":ifsc"=>$ifsc, "act_no"=> $account_number ), true);

                $credited_balance_update = "UPDATE acc_details SET balance = :balance_amount WHERE ifsc = :ifsc AND act_no = :act_no";
                $credited_result = $con->prepare($credited_balance_update);
                $credited_preparing_data = array("balance_amount" => $credit_account_details[0]['balance']+$transaction_amount, "ifsc" => $ifsc, "act_no" => $account_number);

                $credited_result->execute($credited_preparing_data);

                // credit balance incrimented

                // from here on enterin credit transaction details

                $credit_transaction_query = "INSERT INTO transactions VALUES(NULL,:user_id,:amount,:type,NULL)";
                $credit_transfer_data = array("user_id"=>$credit_account_details[0]['user_id'],"amount"=>$transaction_amount,"type"=>"credit");

                $credit_stmt= $con->prepare($credit_transaction_query);

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
