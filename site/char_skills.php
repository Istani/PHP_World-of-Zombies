<?php
	echo '<h1>Fähigkeiten</h1>';
	echo '<table width="100%" border="1">';
	
	// SQL Alle Skills
	$sql_skills="SELECT * FROM `skill_db` ORDER BY erlernbar, maxlvl DESC";
	$query_skills=mysql_query($sql_skills);
	while ($row_skills=mysql_fetch_assoc($query_skills)) {
		echo '<tr>';
		echo '<td width="100%">';
		echo text_ausgabe("skill", $row_skills['skill_ID'], $bg['sprache']);
		echo '</td>';
		echo '<td>';
		$sql_char_skill="SELECT lvl FROM `char_skill` WHERE userID='".$_SESSION["userID"]."' AND skillID='".$row_skills['skill_ID']."'";
		$query_char_skill=mysql_query($sql_char_skill);
		$skill_level=0;
		if (mysql_num_rows($query_char_skill)>0) {
			$skill_level=mysql_result($query_char_skill,0,0);
		}
		echo $skill_level.'/'.$row_skills['maxlvl'];
		echo '</td>';
		echo '<td>';
		if ($row_skills['erlernbar']==1) {
			echo text_ausgabe("erlernbar", 0, $bg['sprache']);
		} else {
			echo text_ausgabe("erlernbar", 1, $bg['sprache']);
		}
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td colspan="3">';
		echo text_ausgabe("skill_beschreibung", $row_skills['skill_ID'], $bg['sprache']);
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
?>
