
<?php
echo "Log file";



$filename = "MonitorCheckHostSrv.log";
$source_file = fopen( $filename, "r" ) or die("Couldn't open $filename");
while (!feof($source_file)) {
    $buffer = fread($source_file, 4096);  // use a buffer of 4KB
    $buffer = str_replace($old,$new,$buffer);
    ///
}
?>
