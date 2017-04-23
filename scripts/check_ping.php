<pre>
<?php
$ping=$_GET["ip"];
$output = shell_exec("ping -c 10 $ping 2>&1");
echo "$output";
?>

</pre>
