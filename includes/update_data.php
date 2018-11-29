<?php


//Update transaction table
$result = db_custom_query('universal_open_bank', 'SELECT * FROM users WHERE act_no = :act_no AND mobile_no = :mobile_no', array(':act_no' => $act_no, ':mobile_no' => $mobile_number), true);
$universal_bank_user_id = $result[0]['id'];
db_custom_query('universal_open_bank', 'SELECT * FROM transactions WHERE user_id = :user_id',array(':user_id' =>$universal_bank_user_id ), true);

//insert the stuff into baby tables
db_query("INSERT INTO transactions VALUES('', :user_id,:act_no, :amt, :type, :date)", array(':user_id' => $user_id, ':amt' => $trans[$i]['transaction'],':act_no' => $trans[$i]['act_no'] , ':type' => $trans[$i]['type'], ':date' => $trans[$i]['date']));



 ?>
