<?php
	$sql_update = "UPDATE `char` 
			SET
				`last_map` = 'trainingslager'
			WHERE 
				`userID` = '". $_SESSION['userID'] ."'
					";
    mysql_query($sql_update);
	
	$sql_query = "SELECT * FROM `char` WHERE userID = '" . $_SESSION['userID'] . "'";
	$result = mysql_query($sql_query);
	$dsatz = mysql_fetch_assoc($result);
	echo text_ausgabe("map", 1, $bg['sprache']); ?>&nbsp;<a href="index.php?map=weltkarte"><?php echo text_ausgabe("map", 0, $bg['sprache']); 
	?></a>
<table class="karte">
	<tr>
		<td class="karte_ueber_zeile karte_ueber_spalte"></td>
		<td class="karte_ueber_zeile">A</td>
		<td class="karte_ueber_zeile">B</td>
		<td class="karte_ueber_zeile">C</td>
		<td class="karte_ueber_zeile">D</td>
		<td class="karte_ueber_zeile">E</td>
		<td class="karte_ueber_zeile">F</td>
	</tr>
	<tr>
		<td class="karte_ueber_spalte">1</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle"><a href="index.php?map=wald"><?php echo text_ausgabe("gebiet", 1, $bg['sprache']); ?></a></td>
        <td class="karte_celle"><a href="index.php?map=see"><?php echo text_ausgabe("ort", 1, $bg['sprache']); ?></a></td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
	</tr>
	<tr>
		<td class="karte_ueber_spalte">2</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
	</tr>
	<tr>
		<td class="karte_ueber_spalte">3</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
        <td class="karte_celle"><a href="index.php?map=werkstatt"><?php echo text_ausgabe("ort", 0, $bg['sprache']); ?></a></td>
		<td class="karte_celle">&nbsp;</td>
	</tr>
	<tr>
		<td class="karte_ueber_spalte">4</td>
		<td class="karte_celle"><a href="index.php?map=wohngebiet"><?php echo text_ausgabe("ort", 2, $bg['sprache']); ?></a></td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
	</tr>
	<tr>
		<td class="karte_ueber_spalte">5</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle"><a href="index.php?map=schrottplatz"><?php echo text_ausgabe("gebiet", 2, $bg['sprache']); ?></a></td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
	</tr>
	<tr>
		<td class="karte_ueber_spalte">6</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
	</tr>	
</table>
