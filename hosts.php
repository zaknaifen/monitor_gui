<?php 

function checkhost($ip)
{
	

  $fP = fSockOpen($ip, 80, $errno, $errstr, 1); 
  if (!$fP) { 
	  echo "<a title=\"no connection\"><div style=\"padding: 30px; background-color:#f05252;\"></div></a>"; } 
	else {
		checkAgent($ip);
	}
  

}

function checkAgent($ip)
{
	
	$fP = fSockOpen($ip, 6789, $errno, $errstr, 1); 
  if (!$fP) { 
	  echo "<a title=\"agent N/A\"><div style=\"padding: 30px; background-color:#ffd700;\"></div></a>"; } 
	else {
		echo "<a title=\"OK\"><div style=\"padding: 30px; background-color:#5bc763;\"></div></a>";
	}
	
}


?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>		
	$.get('hosts.php', function(data) {
	$('#hosts').html(data);
});
	</script>	

	<div id=hosts>	
			
			<?php
			
			
			
include "config.php";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT ip,type,opis FROM monitor_main";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo "<table width=300 border=1><tr><td colspan=2>" . $row["opis"] . "\t |". $row["type"];
		echo "</td><td rowspan=2 width=10%>";
		checkhost($row["ip"]);
		
		echo "</td></tr>";
		echo "<tr><td width=40%><a target=ifa href=status.php?ip=" . $row["ip"]. ">" . $row["ip"]. "</a> </td><td>";
		
		echo "<a href=check_ping.php?ip=" . $row["ip"]. " target=ifa>ping</a>";
		
		echo "</td></tr>";
      
        
        echo "</table>";
        
        
        
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>	
			
</div>
