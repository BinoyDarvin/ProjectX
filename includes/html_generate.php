<?php


function html_generate($style_loc, $body, $menu = false, $username = "User"){

echo <<<HEREDOC
<!DOCTYPE HTML>
<html>
<head>
<!--importing google fonts-->
<link href="https://fonts.googleapis.com/css?family=Black+Han+Sans|Pacifico" rel="stylesheet">


<!--importing material lite-->

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

<link rel="stylesheet" href={$style_loc}>
</head>
<body>
HEREDOC;

if($menu){

$menuout = <<<HEREDOC

<!-- Left aligned menu below button -->
<div class='menu'>

<div class='btn'>
<button id="demo-menu-lower-left"
        class="mdl-button mdl-js-button mdl-button--icon">
  <i class="material-icons">more_vert</i>

</button>
<span class='username'>{$username}</span>
</div>
<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-left">

    <li class="mdl-menu__item mdl-menu__item--full-bleed-divider">
    <a href='all_mini.php'>Account Statement</a>
    </li>

  <li class="mdl-menu__item">
  <a href='loan_details.php'>Loans</a>
  </li>


  <li class="mdl-menu__item mdl-menu__item--full-bleed-divider">
  <a href='transactions.php'>Send Money</a>
  </li>

  <li class="mdl-menu__item">
  <a href='logout.php'>Logout</a>
  </li>
</ul>

</div>
HEREDOC;

echo $menuout;
}//end of while

echo $body;



}

?>
