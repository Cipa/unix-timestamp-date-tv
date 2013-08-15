<?php 

//a custom tv to have a date field save as unix time stap to the db.
//works with clipper 1.1.3 and it should work with modx evolution
//date only(no time) - adding time might require a custom date parsing function
	
if (IN_MANAGER_MODE != 'true') {
	die('<h1>ERROR:</h1><p>Please use the Content Manager instead of accessing this file directly.</p>');
}

?>

<input type="text" value="<?php echo $row['value'] ?>" name="tv<?php echo $row['id'] ?>" id="tv<?php echo $row['id'] ?>" style="display: none">

<input type="text" onblur="documentDirty=true;" value="<?php echo $row['value'] ? gmdate('Y-m-d', intval($row['value'])) : '' ?>" class="DatePicker" name="tv<?php echo $row['id'] ?>date" id="tv<?php echo $row['id'] ?>date" autocomplete="off">

<script type="text/javascript">
window.addEvent('domready', function() { new DatePicker($('tv<?php echo $row['id'] ?>date'), {'yearOffset' : -10, 'format' : 'YYYY-mm-dd'});});
</script>


<script>
	
(function($) {

	$(document).ready(function () {

		(function detectDateChange<?php echo $row['id'] ?>(){
			
			var date = $('#tv<?php echo $row['id'] ?>date').val();
			
			$('#tv<?php echo $row['id'] ?>').val( Date.parse(date)/1000 );
			
			//save unix date to the hidden field(the real TV field)
			setTimeout(detectDateChange<?php echo $row['id'] ?>, 200);
		
		})();
	
	});


}) (jQuery);
	
</script>