<?php
include 'config.php';
$ip=$_GET["ip"];
$cmd=$_GET["cmd"];

$output = shell_exec("java -jar $CHS $ip $cmd 2>&1");

echo "<pre>$output</pre>";
?>
