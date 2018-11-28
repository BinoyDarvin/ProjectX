<?php


function html_generate($style_loc, $body){

echo <<<HEREDOC
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href={$style_loc}>
</head>
<body>
{$body}

</body>
</html>
HEREDOC;


}

?>
