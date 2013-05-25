<?php
	$sql_update = "UPDATE `char` 
			SET
				`last_map` = 'trainingslager'
			WHERE 
				`userID` = '". $_SESSION['userID'] ."'
					";
    mysql_query($sql_update);
	
	$map_id=1;
	$breite_max=920;
	
	$sql_query = "SELECT * FROM `char` WHERE userID = '" . $_SESSION['userID'] . "'";
	$result = mysql_query($sql_query);
	$dsatz = mysql_fetch_assoc($result);
	echo text_ausgabe("map", $map_id, $bg['sprache']); ?>&nbsp;<a href="index.php?map=weltkarte"><?php echo text_ausgabe("map", 0, $bg['sprache']); 
	?></a><br><br>
<table class="karte" width="<?php echo $breite_max; ?>" style="background-image:url(picture/maps_background/<?php echo $_GET['map']; ?>.png);">
<?php
	$sql_map_ausmasse="SELECT min(y_cord) as y_min,min(x_cord) as x_min,max(y_cord) as y_max,max(x_cord) as x_max FROM map_gebiete WHERE map_id=".$map_id;
	$query_map_ausmasse=mysql_query($sql_map_ausmasse);
	if (mysql_num_rows($query_map_ausmasse)>0) {
		$y_min=mysql_result($query_map_ausmasse,0,0);
		$x_min=mysql_result($query_map_ausmasse,0,1);
		$y_max=mysql_result($query_map_ausmasse,0,2);
		$x_max=mysql_result($query_map_ausmasse,0,3);
	}
	$x_min--;
	$y_min--;
	$x_max++;
	$y_max++;
	
	// Damit die Map immer Quadratisch ist
	if ($x_max>$y_max) {
		$y_max=$x_max;
	} else {
		$x_max=$y_max;
	}
	
	$anz_breite=(($x_max)-($x_min));
	$anz_breite++;
	$pixel=(int)($breite_max/$anz_breite);
	$breite=0;
	$hohe=0;
	for ($i=$y_min;$i<=$y_max;$i++) {
		echo '<tr>';
		for ($j=$x_min;$j<=$x_max;$j++) {
			echo '<td class="karte_celle" width="'.$pixel.'" height="'.$pixel.'">';
			echo get_gebiet_anz($map_id, $i, $j,$pixel, $_SESSION['userID']);
			echo '</td>';
		}
		echo '</tr>';
	}
	
?>
</table>
