<?php
	$sql_update = "UPDATE `char` 
			SET
				`last_map` = 'trainingslager'
			WHERE 
				`userID` = '". $_SESSION['userID'] ."'
					";
    mysql_query($sql_update);
	
	$map_id=1;
	
	$sql_query = "SELECT * FROM `char` WHERE userID = '" . $_SESSION['userID'] . "'";
	$result = mysql_query($sql_query);
	$dsatz = mysql_fetch_assoc($result);
	echo text_ausgabe("map", $map_id, $bg['sprache']); ?>&nbsp;<a href="index.php?map=weltkarte"><?php echo text_ausgabe("map", 0, $bg['sprache']); 
	?></a><br><br>
<table class="karte" style="background-image:url(picture/maps_background/<?php echo $_GET['map']; ?>.png);">
<?php
	$sql_map_ausmasse="SELECT min(y_cord) as y_min,min(x_cord) as x_min,max(y_cord) as y_max,max(x_cord) as x_max FROM map_gebiete WHERE map_id=".$map_id;
	$query_map_ausmasse=mysql_query($sql_map_ausmasse);
	if (mysql_num_rows($query_map_ausmasse)>0) {
		$y_min=mysql_result($query_map_ausmasse,0,0);
		$x_min=mysql_result($query_map_ausmasse,0,1);
		$y_max=mysql_result($query_map_ausmasse,0,2);
		$x_max=mysql_result($query_map_ausmasse,0,3);
	}
	$pixel=(int)(920/$x_max+1);
	for ($i=$y_min-1;$i<=$y_max+1;$i++) {
		echo '<tr>';
		for ($j=$x_min-1;$j<=$x_max+1;$j++) {
			echo '<td class="karte_celle" width="'.$pixel.'" height="'.$pixel.'">';
			echo get_gebiet_anz($map_id, $i, $j,$pixel, $_SESSION['userID']);
			echo '</td>';
		}
		echo '</tr>';
	}
?>
</table>

<table class="karte" style="background-image:url(picture/maps_background/<?php echo $_GET['map']; ?>.png);">
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
		<td class="karte_celle"><?php if (check_quest(3, $_SESSION['userID'])) { ?><a href="index.php?map=wald"><?php echo text_ausgabe("gebiet", 1, $bg['sprache']); ?></a><?php } ?></td>
        <td class="karte_celle"><?php if (check_quest(4, $_SESSION['userID'])) { ?><a href="index.php?map=see"><?php echo text_ausgabe("ort", 1, $bg['sprache']); ?></a><?php } ?></td>
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
        <td class="karte_celle"><?php if (check_quest(3, $_SESSION['userID'])) { ?><a href="index.php?map=werkstatt"><?php echo text_ausgabe("ort", 0, $bg['sprache']); ?></a><?php } ?></td>
		<td class="karte_celle">&nbsp;</td>
	</tr>
	<tr>
		<td class="karte_ueber_spalte">4</td>
		<td class="karte_celle"><?php if (check_quest(1, $_SESSION['userID'])) { ?><a href="index.php?map=wohngebiet"><?php echo text_ausgabe("ort", 2, $bg['sprache']); ?></a><?php } ?></td>
		<td class="karte_celle"><a href="index.php?map=huette"><?php echo text_ausgabe("ort", 4, $bg['sprache']); ?></a></td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle"><?php if (check_quest(2, $_SESSION['userID'])) { ?><a href="index.php?map=gabfall"><?php echo text_ausgabe("ort", 3, $bg['sprache']); ?></a><?php } ?></td>
		<td class="karte_celle">&nbsp;</td>
	</tr>
	<tr>
		<td class="karte_ueber_spalte">5</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle">&nbsp;</td>
		<td class="karte_celle"><?php if (check_quest(3, $_SESSION['userID'])) { ?><a href="index.php?map=schrottplatz"><?php echo text_ausgabe("gebiet", 2, $bg['sprache']); ?></a><?php } ?></td>
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
