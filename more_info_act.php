<?php
include_once 'includer.php';

$user_id = login_check();
$acc_num = $_GET['acc_num'];



$result = db_query('SELECT * FROM acc_details WHERE user_id = :details AND act_no = :acc_num', array(':details'=>$user_id, ':acc_num' => $acc_num), true);


$transaction_id = $result[0]['last_transaction_id'];
$transaction_result = db_query('SELECT * FROM transactions WHERE id = :data', array(':data'=>$transaction_id), true);


?>


<html>


<h1>account details</h1><br>
<?php
$runner = 0;


while($runner < sizeof($result))
{ ?>


bank name = <?php echo $result[$runner]['bank_name']."<br>" ?>
account number =<?php echo $result[$runner]['act_no']."<br>" ?>
ifsc =<?php echo $result[$runner]['ifsc']."<br>" ?>

<?php  $runner++;
echo "$runner";
}?>


<h1>mini statement </h1>
<?php

$i=0;
while($i < sizeof($transaction_result))
{
echo $transaction_result[$i]['amt']."&nbsp:&nbsp&nbsp&nbsp&nbsp".$transaction_result[$i]['date']."<br>";
$i++;

}

?>
</html>
