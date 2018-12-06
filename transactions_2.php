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
   
}
    else
        die ("no sufficient bank balance");
}
else{
    echo("No sufficient data");
}

ś


?>
