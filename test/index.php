<table border ="1" style = "width:50%">
    <tr>
        <td>E-Commerce Website</td>
         <td>No. of Products </td>
    </tr>
    <tr>
        <td>Lelong</a></td>
        <td class="result_data">Calculating ...</td><!-- initial content. Loading ... -->
    </tr>
<tr>
        <td>Lelong</a></td>
        <td class="lelong">loading</td><!-- initial content. Loading ... -->
    </tr>
</table>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



$(document).ready(function(){

    // use ajax, call the PHP
    $.ajax({
        url: 'lelong.php', // path of lelong
        success: function(response){
            $('.result_data').text(response);
        }
    })
});
</script>
