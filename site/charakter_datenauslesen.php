<?php

	/*
		Bisher kann nur Nahkampf ausgerüstet werden!
	*/

	//items auslesen
	$sql_query = "SELECT * FROM `char` WHERE `userID` = '" . $_SESSION['userID'] . "'";
	$result = mysql_query($sql_query);
	$dsatz = mysql_fetch_assoc($result);

	$char_nahkampf	=	$dsatz['nahkampf'];
	$char_nahkampf_uniq = $dsatz['nahkampf_uniq'];;
	$char_schusswaffe	=	$dsatz['schusswaffe'];

	$char_rucksack	=	$dsatz['rucksack'];
	$char_helm	=	$dsatz['helm'];
	$char_amor	=	$dsatz['amor'];
	$char_handschuhe	=	$dsatz['handschuhe'];
	$char_schuhe	=	$dsatz['schuhe'];
	$char_fahrzeug	=	$dsatz['fahrzeug'];

	$char_wasser	=	$dsatz['wasser'];
	$char_nahrung	=	$dsatz['nahrung'];
	$max_wert_ausdauer = $dsatz['gesundheit'];

	$sql_exp = "SELECT * FROM `char_exp` WHERE `level` = '" . $_SESSION['lvl'] . "'";
	$result_exp = mysql_query($sql_exp);
	$dsatz_exp = mysql_fetch_assoc($result_exp);

	$sql_time = "SELECT * FROM `login` WHERE `userID` = '" . $_SESSION['userID'] . "'";
	$result_time = mysql_query($sql_time);
	$dsatz_time = mysql_fetch_assoc($result_time);

	$tage = (int)($dsatz_time['onlineTimer']/60/60/24);
	$stunden = (int)($dsatz_time['onlineTimer']/60/60-$tage*24);
	$minuten = (int)($dsatz_time['onlineTimer']/60-($tage*24+$stunden)*60);
	
	$stunden=sprintf ( "%02d",$stunden);
	$minuten=sprintf ( "%02d",$minuten);

?>