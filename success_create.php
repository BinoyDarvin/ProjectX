<?php
include_once 'includer.php';


$output = <<<HEREDOC

<div class='success-card'>
<h1>Success!</h1>
<a href='login.php'  class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">Login Now</a>
</div>



HEREDOC;


html_generate('styles/success_create.css', $output);



 ?>
