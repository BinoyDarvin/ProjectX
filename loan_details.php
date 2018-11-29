<?php

include_once 'includer.php';

$user_id = login_check(); //to be given by binoy c darvin

$result = db_query("SELECT * FROM loan_details WHERE user_id = :user_id", array(":user_id"=>$user_id), $return = true);
if($result == null)
    {
    echo "<h1>You have no current loans</h1>";
    exit();
    }

html_generate('styles/loan_details.css', '');
?>



<style>
    table{
        text-align: center;
        margin: 0 auto;
    }


</style>
<h1>Loan details </h1>

<table class="mdl-data-table mdl-js-data-table">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Bank Name</th>
      <th>Amount Paid</th>
        <th>Due Amount</th>
        <th>Duration</th>
    </tr>
  </thead>
  <tbody>    
    
    
    
    
<?php

    $i = 0;
while($i < sizeof($result)){
  
echo "   
    <tr>
      <td class='mdl-data-table__cell--non-numeric'>
        {$result[$i]['bank_name']}
    </td>
      <td>{$result[$i]['paid_amount']}</td>
      <td>{$result[$i]['due_amount']}</td>
        <td>{$result[$i]['duration']}</td>
    </tr>";   
    
  $i++;  
}//end of while
?>
    
    

    
   
  </tbody>
</table>    
</html>
