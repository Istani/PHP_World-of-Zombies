<?php
	// Du sollst nicht cheaten
	if (isset($_SESSION['userID'])) {
		$char=get_player_status($_SESSION['userID']);
		if ($char['nahrung']>$char['max_nahrung']) {
			$char['nahrung']=$char['max_nahrung'];
		}
		if ($char['wasser']>$char['max_wasser']) {
			$char['wasser']=$char['max_wasser'];
		}
		$update_char="UPDATE `char` SET nahrung=".$char['nahrung'].", wasser=".$char['wasser']." WHERE userID=".$_SESSION['userID'];
		mysql_query($update_char);
	}
?>