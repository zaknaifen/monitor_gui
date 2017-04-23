<?php
$ping=$_GET["name"];
$output = shell_exec("ping -c 10 8.8.8.8 2>&1");
echo $output; 





?>
