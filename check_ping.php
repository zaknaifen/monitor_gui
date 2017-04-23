<?php
$ip =$_GET["ip"];
echo '<table border ="0" style = "width:50%">
    <tr>
        <td></td>
         <td>Output</td>
    </tr>
    <tr>
        <td>Ping</a></td>
        <td class="result_data"><img src=images/loading.gif></td>
    </tr>

</table>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>
$(document).ready(function(){

    // use ajax, call the PHP
    $.ajax({
        url: \'scripts/check_ping.php?ip=';
        echo $ip;
        echo '\', // path of lelong
        success: function(response){
            $(\'.result_data\').html(response);
        }
    })
});
</script>';

?>
