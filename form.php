<?php

$id_del =$_POST["id_del"];
$ip =$_POST["aip"];
$type =$_POST["atype"];
$desc =$_POST["adesc"];

include "config.php";


if ($id_del)
{
$conn_del = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn_del) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM monitor_main WHERE id=" . $id_del;

if (mysqli_query($conn_del, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn_del);
}

mysqli_close($conn_del);
}


if ($ip and $type and $desc)
{
	echo $type;
	
	$conn_add = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn_add) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = " insert into monitor_main values ('','  $ip  ','$type','  $desc  ')";

if (mysqli_query($conn_add, $sql)) {
    echo "Record added successfully";
} else {
    echo "Error adding record: " . mysqli_error($conn_add);
}

mysqli_close($conn_add);
	
	
	}


echo "<h1>Hosts</h1>";
echo "Add/Del form";
echo "<table width=100%><tr><td width=5%>ID</td><td width=15%>IP</td><td width=5%>Type</td><td>Description</td><td width=10%>Action</td></tr></table>";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id,ip,type,opis FROM monitor_main";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		echo "<table width=100% border=1><tr><td width=5%>" . $row["id"]; 
		echo "</td><td width=15%>" . $row["ip"];
		echo "</td><td width=5%>" . $row["type"];
		echo "</td><td>" . $row["opis"];
		echo "</td><td width=10%>
		<form action=\"#\" method=\"post\">
		<input name=id_del type=hidden value=" . $row["id"]; 
		echo "><input type=submit value=del></form>";
		
		
		echo "</td></tr>";
      
        
        echo "</table>";
        
        
        
    }
} else {
    echo "0 results";
}

mysqli_close($conn);







?>
<form action="#" method="post" id=addform>

<table border=0 width=100%>
	<tr>
		<td width=5%></td>
		<td width=15%><input name=aip size=11 type=text title="IP A.B.C.D" pattern=^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$></td>
		<td width=5%> <select name=atype form=addform>
		<option value=W>W</option>
		<option value=L>L</option> 
		</select>
</td>
		<td><input type=text size=60 name=adesc></td>
		<td width=10%><input type=submit value=add></td>
	</tr>
</table>
</form>

