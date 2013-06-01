<h1>Status</h1>
<hr />
<table width="100%">
	<tr>
		<td style="width: 25%"><b><?php echo $_SESSION['loginName']; ?></b></td>
		<td style="width: 25%"></td>
		<td style="width: 25%"></td>
		<td style="width: 25%"><b>Spielzeit:</b></td>
	</tr>
	<tr>
		<td>Level: <?php echo $dsatz['level']; ?></td>
		<td>Klasse: <?php echo text_ausgabe("char_klasse", $dsatz['klasse'], $bg['sprache']); ?></td>
		<td>&nbsp;</td>
		<td><?php echo $tage;?> Tage <?php echo $stunden;?> Std. <?php echo $minuten;?> Min.</td>
	</tr>
	<tr>
		<td colspan="4">
			<hr />
			&nbsp;<br>
			&nbsp;<br>
		</td>
	</tr>
	<tr>
		<td>Erfahrung:</td>
		<td></td>
		<td></td>
		<td class="text_rechts"><?php echo $dsatz["exp"] . "/" . $dsatz_exp["exp"]; ?></td>
	</tr>
	<tr>
		<td colspan="4">
			<?php
			echo '<div id="Exp_bar_status" class="Exp_bg"></div>';
			?>
			<script>
			var $jq = jQuery.noConflict();
				$jq(function() {
				$jq( "#Exp_bar_status" ).progressbar({
					value: <?php echo $dsatz["exp"]; ?>,
					max: <?php echo $dsatz_exp["exp"]; ?>
				});
			});
			</script>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			&nbsp;<br>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td>Nahrung:</td>
		<td class="text_rechts"><?php echo $dsatz['nahrung']; ?>/<?php echo get_wert_plus_bonus($_SESSION['userID'], "nahrung", $max_wert_ausdauer); ?></td>
		<td>Wasser:</td>
		<td class="text_rechts"><?php echo $dsatz['wasser']; ?>/<?php echo get_wert_plus_bonus($_SESSION['userID'], "wasser", $max_wert_ausdauer); ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<?php
			echo '<div id="Nahrung_bar_status" class="Nahrung_bg"></div>';
			?>
			<script>
			var $jq = jQuery.noConflict();
				$jq(function() {
				$jq( "#Nahrung_bar_status" ).progressbar({
					value: <?php echo $char_nahrung; ?>,
					max: <?php echo get_wert_plus_bonus($_SESSION['userID'], "nahrung", $max_wert_ausdauer); ?>
				});
			});
			</script>
		</td>
		<td colspan="2">
			<?php
			echo '<div id="Wasser_bar_status" class="Wasser_bg"></div>';
			?>
			<script>
			var $jq = jQuery.noConflict();
				$jq(function() {
				$jq( "#Wasser_bar_status" ).progressbar({
					value: <?php echo $char_wasser; ?>,
					max: <?php echo get_wert_plus_bonus($_SESSION['userID'], "wasser", $max_wert_ausdauer); ?>
				});
			});
			</script>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			&nbsp;<br>
			&nbsp;<br>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td>Gegenst&auml;nde hergestellt:</td>
		<td class="text_rechts"><?php echo $dsatz["Items_Crafting"]; ?></td>
		<td>Rohstoffe abgebaut:</td>
		<td class="text_rechts"><?php echo $dsatz["Items_Abbau"]; ?></td>
	</tr>
</table>