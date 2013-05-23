<?php

	/*
		Bisher kann nur Nahkampf ausgerüstet werden!
	*/

	//items auslesen
	$sql_query = "SELECT * FROM `char` WHERE `userID` = '" . $_SESSION['userID'] . "'";
	$result = mysql_query($sql_query);
	$dsatz = mysql_fetch_assoc($result);

	$char_nahkampf	=	$dsatz['nahkampf'];
	$char_nahkampf_uniq = $dsatz['nahkampf_uniq']; // Hättest ja auch ruhig mal alle uniqs auslesen können... FU Alex
	
	$char_schusswaffe	=	$dsatz['schusswaffe'];
	$char_schusswaffe_uniq	=	$dsatz['schusswaffe_uniq'];

	$char_rucksack	=	$dsatz['rucksack'];
	$char_rucksack_uniq	=	$dsatz['rucksack_uniq'];
	$char_helm	=	$dsatz['helm'];
	$char_helm_uniq	=	$dsatz['helm_uniq'];
	$char_amor	=	$dsatz['amor'];
	$char_amor_uniq	=	$dsatz['amor_uniq'];
	$char_handschuhe	=	$dsatz['handschuhe'];
	$char_handschuhe_uniq	=	$dsatz['handschuhe_uniq'];
	$char_schuhe	=	$dsatz['schuhe'];
	$char_schuhe_uniq	=	$dsatz['schuhe_uniq'];
	$char_fahrzeug	=	$dsatz['fahrzeug'];
	$char_fahrzeug_uniq	=	$dsatz['fahrzeug_uniq'];
	
	$char_ring_L	=	$dsatz['ring_L'];
	$char_ring_L_uniq	=	$dsatz['ring_L_uniq'];
	$char_ring_R	=	$dsatz['ring_R'];
	$char_ring_R_uniq	=	$dsatz['ring_R_uniq'];
	$char_amulett	=	$dsatz['amulett'];
	$char_amulett_uniq	=	$dsatz['amulett_uniq'];
	
	
	

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