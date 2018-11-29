<?php

include_once 'includer.php';

$user_id = login_check(); //to be given by binoy c darvin

$result = db_query("SELECT * FROM loan_details WHERE user_id = :user_id", array(":user_id"=>$user_id), $return = true);
if($result == null)
    {
    echo "<h1>you have no current loans</h1>";
    exit();
    }
?>

s

<html>

<h1>Loan details </h1>

<?php
    
    $runner = 0;

    echo "Bank name  :".$result[$runner]['bank_name']."<br>";
    echo "loan_amount  :".$result[$runner]['loan_amount']."<br>";
    echo "amount_paid  :".$result[$runner]['paid_amount']."<br>";
    echo "due amount  :".$result[$runner]['due_amount']."<br>";
    echo "duration  :".$result[$runner]['duration']."<br>";
?>
</html>