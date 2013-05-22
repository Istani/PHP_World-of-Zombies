<h1>Status</h1>
<hr />
<table>
	<tr>
		<td style="width: 200px;"><b><?php echo $_SESSION['loginName']; ?></b></td>
		<td style="width: 200px;"></td>
		<td style="width: 200px;"><b>Spielzeit:</b></td>
		<td style="width: 200px;"></td>
	</tr>
	<tr>
		<td>Level: <?php echo $dsatz['level']; ?></td>
		<td>Klasse: <?php echo text_ausgabe("char_klasse", $dsatz['klasse'], $bg['sprache']); ?></td>
		<td colspan="2" ><?php echo $tage;?> Tage <?php echo $stunden - $tage*24;?> Std. <?php echo $min - $stunden*60;?> Min.</td>
	</tr>
	<tr>
		<td colspan="4"><hr /></td>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>Erfahrung:</td>
		<td></td>
		<td></td>
		<td><?php echo $dsatz["exp"] . "/" . $dsatz_exp["exp"]; ?></td>
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
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td>Nahrung:</td>
		<td><?php echo $dsatz['nahrung']; ?>/<?php echo get_wert_plus_bonus($_SESSION['userID'], "nahrung", $max_wert_ausdauer); ?></td>
		<td>Wasser:</td>
		<td><?php echo $dsatz['wasser']; ?>/<?php echo get_wert_plus_bonus($_SESSION['userID'], "wasser", $max_wert_ausdauer); ?></td>
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
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td>Gegenst&auml;nde hergestellt:</td>
		<td><?php echo $dsatz["Items_Crafting"]; ?></td>
		<td>Rohstoffe abgebaut:</td>
		<td><?php echo $dsatz["Items_Abbau"]; ?></td>
	</tr>
</table>