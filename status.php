<?php 


include "config.php";

$ip =$_GET["ip"];

echo '
<table border ="1" style = "width:60%">
    <tr>
        <td></td>
         <td>Output </td>
    </tr>
    <tr>
        <td>Ping</a></td>
        <td >';
        
        $fP = fSockOpen($ip, 80, $errno, $errstr, 1); 
  if (!$fP) { 
	  echo "<a title=\"no connection\"><div style=\"padding: 30px; background-color:#f05252; text-align: center;\"></div>No connection</a>"; } 
	else {
		echo "<a title=\"OK\"><div style=\"padding: 30px; background-color:#5bc763;text-align: center;\">OK</div></a>";
	}
       echo  '</td><!-- initial content. Loading ... -->
    </tr>
<tr>
        <td>Agent</a></td>
        <td >';
              $fP = fSockOpen($ip, 6789, $errno, $errstr, 1); 
  if (!$fP) { 
	  echo "<a title=\"Agent N/A\"><div style=\"padding: 30px; background-color:#ffd700; text-align: center;\">Agent N/A</div></a>"; } 
	else {
		echo "<a title=\"OK\"><div style=\"padding: 30px; background-color:#5bc763; text-align: center;\">OK</div></a>";
	}
        
        
        echo '</td>
    
<tr>
        <td>Agent version</a></td>
        <td class="result_data_version">loading</td><!-- initial content. Loading ... -->
    </tr>    
    
<tr>
        <td>Host HDD</a></td>
        <td class="result_data_hdd">loading</td><!-- initial content. Loading ... -->
    </tr>    
    
 <tr>
        <td>Host ipconfig</a></td>
        <td class="result_data_ip">loading</td><!-- initial content. Loading ... -->
    </tr>    
       
</table>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

$(document).ready(function(){

    // use ajax, call the PHP
    $.ajax({
        url: \'scripts/CheckHost.php?ip=';
        echo $ip;
        echo '&cmd=';
        echo '/version';
        echo'\', // path of lelong
        success: function(response){
            $(\'.result_data_version\').html(response);
        }
    })
});
</script>

<script>

$(document).ready(function(){

    // use ajax, call the PHP
    $.ajax({
        url: \'scripts/CheckHost.php?ip=';
        echo $ip;
        echo '&cmd=';
        echo 'hdd';
        echo'\', // path of lelong
        success: function(response){
            $(\'.result_data_hdd\').html(response);
        }
    })
});
</script>


<script>

$(document).ready(function(){

    // use ajax, call the PHP
    $.ajax({
        url: \'scripts/CheckHost.php?ip=';
        echo $ip;
        echo '&cmd=';
        echo '/ipconfig';
        echo'\', // path of lelong
        success: function(response){
            $(\'.result_data_ip\').html(response);
        }
    })
});
</script>



';
