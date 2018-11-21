<p id="message"></p>
<br>
<form name='myformtrack'>
	<input type="text" name="orderid" placeholder="Enter OrderId">
	<input type="text" name="email" placeholder="Enter Your email">
	
	<button type="button" onclick="checkUserAvailabilitys()">Click Me!</button>
</form>   

<script>
function checkUserAvailabilitys() {
    var form = document.myformtrack;
    var urlWcsp = '<?php echo $block->getUrl("excellence/hello/trackorders",array("_secure"=>true) )?>';
 // alert(urlWcsp);
var dataString = jQuery(form).serialize();
jQuery.ajax( {
    type: 'POST',
    url: urlWcsp,
    //data: { foton : jQuery('input:checkbox:checked').push(this).val()},
         data: dataString,
    success: function(data) {
      jQuery('#message').html(data);
     console.log(data);

    }
} );
}
</script>