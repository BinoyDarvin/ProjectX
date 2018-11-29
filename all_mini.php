<?php
include_once 'includer.php';


$user_id = login_check();
$result = db_query('SELECT * FROM transactions WHERE user_id = :details', array(':details'=>$user_id), true);




 ?>



<style>

body{
  text-align: center;
}

table{
  text-align: center;
  margin: 0 auto;
}

</style>


<h1>Account Statement </h1>
<table class="mdl-data-table mdl-js-data-table">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Account Number</th>
      <th>Amount</th>
      <th>Type</th>
      <th>Date</th>

    </tr>
  </thead>
  <tbody>
<?php
$output2 = '';
$runner = 0;

while($runner < sizeof($result)){

$output2.=<<<HEREDOC

    <tr>
      <td class="mdl-data-table__cell--non-numeric">{$result[$runner]['act_no']}</td>
      <td>{$result[$runner]['amt']}</td>
      <td>{$result[$runner]['type']}</td>
      <td>{$result[$runner]['date']}</td>
    </tr>
HEREDOC;







$runner++;
}

html_generate('styles/more_info_act.css', $output2);
?>





  </tbody>
</table>

</html>
