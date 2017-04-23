
<?php
echo "Log file <hr>";



$filename = "MonitorCheckHostSrv.log";
$file_handle = fopen($filename, "r");
while (!feof($file_handle)) {
   $line = fgets($file_handle);
   echo $line; echo '<br>';
}
fclose($file_handle);
    ///

?>
