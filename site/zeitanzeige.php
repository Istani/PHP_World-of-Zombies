<?php
	include("../_settings.php");
	include("../_mysql.php");
	include("../_functions.php");

	zeit_anzeigen($dsatz["aktion_ende"]-time());
?>	
	<?php
	$min=$dsatz["aktion_start"];
	$value=time();
	$max=$dsatz["aktion_ende"];
	
	$max=$max-$min;
	$value=$value-$min;
	$min=$min-$min;
	?>
	<script>
	var $jq = jQuery.noConflict();
		$jq(function() {
			$jq( "#progressbar" ).progressbar({
			value: <?php echo $value; ?>,
			max: <?php echo $max; ?>
			});
			});
	</script>
	<?php 
		if ($value==$max) {
		?>
		<meta http-equiv="refresh" content="1; URL=index.php">
		<?php 
			}
		?>