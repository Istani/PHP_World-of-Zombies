<?php
	$kampfzeit=180;
	$queryString = strstr($_SERVER['REQUEST_URI'], '?');
    $queryString = ($queryString===false) ? '' : substr($queryString,1);
	
    echo '<h1>'.text_ausgabe("ort", 2, $bg['sprache']).'</h1>';
	if (!check_quest(2, $_SESSION['userID'])) {
		// Das wird angezeigt wenn Quest 2 nicht erledigt!
		echo '<p>'.text_ausgabe("quest_text_beendung", 2, $bg['sprache']).'</p>';
		erledige_quest(2, $_SESSION['userID']);
		echo '<br>';
	}
	echo '<p>'.text_ausgabe("ort_text", 2, $bg['sprache']).'</p>';
    echo '<br>';
	if (isset($_GET['status'])) {
		$sql_char_level="SELECT `level` FROM `char` WHERE userID='".$_SESSION["userID"]."'";
		$query_char_level=mysql_query($sql_char_level);
		$level=mysql_result($query_char_level,0,0);
		switch ($_GET['status']) {
			case 'low':
				$level=$level-1;
				break;
			case 'high':
				$level=$level+1;
				break;
		}
		
		$sql_mob="SELECT mob_id FROM mob_db WHERE mob_level='".$level."' ORDER BY RAND( )";
		//echo $sql_char_level.';'.$sql_mob;
		$query_mob=mysql_query($sql_mob);
		if (mysql_num_rows($query_mob)>0) {
			$monster=mysql_result($query_mob,0,0);
			$sql['user_aktion']="UPDATE `char`
				SET aktion='KAMPF_MOB',
					aktion_id=".$monster.",
					aktion_start=".time().",
					aktion_ende=".(time()+($kampfzeit))."
				WHERE userID=".$_SESSION["userID"];
			mysql_query($sql['user_aktion']);
			echo "<meta http-equiv='refresh' content='0; URL=index.php' />";
		} else {
			echo text_ausgabe("mob_no", 0, $bg['sprache']).'<br>';
		}
		
		
		echo '<br>';
		echo '<br>';
	}
	echo '<a href="index.php?'.$queryString.'&status=low">'.text_ausgabe("fight", 0, $bg['sprache']).'</a>&nbsp;'.text_ausgabe("mob_low", 0, $bg['sprache']).'<br>';
	echo '<a href="index.php?'.$queryString.'&status=mid">'.text_ausgabe("fight", 0, $bg['sprache']).'</a>&nbsp;'.text_ausgabe("mob_mid", 0, $bg['sprache']).'<br>';
	echo '<a href="index.php?'.$queryString.'&status=high">'.text_ausgabe("fight", 0, $bg['sprache']).'</a>&nbsp;'.text_ausgabe("mob_high", 0, $bg['sprache']).'<br>';
	
?>
