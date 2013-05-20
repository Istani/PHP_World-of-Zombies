<?php
	include("_settings.php");
	include("_mysql.php");
	include("_functions.php");

    $item_check = "SELECT * FROM `char` WHERE userID='" . $_SESSION['userID'] . "'";
    $item_check_res = mysql_query($item_check);
    $item_dsatz = mysql_fetch_assoc($item_check_res);

//echo var_dump($_GET);
// Alle Items abfangen die nicht ausgerüstet werden


if ($_GET['slot']=="inventar") { 
	// Item wird ins inventar gelegt...
	$item_add="INSERT INTO `inventory` SET itemID='" .$_GET['slot_id'] ."', uniqID='".$_GET['slot_uniq']."', userID='".$_SESSION['userID']."', menge=1";
	mysql_query($item_add);
	foreach ($item_dsatz as $key => $value) {
		if ((@$item_dsatz[$key]==$_GET['slot_id']) && (@$item_dsatz[$key.'_uniq']==$_GET['slot_uniq'])) {
			$auswahl=$key;
		}
	}
	if ($auswahl!="") {
		$item_change="UPDATE `char` SET ".$auswahl."='0', ".$auswahl."_uniq='0' WHERE userID='".$_SESSION['userID']."'";
		mysql_query($item_change);
	}
} elseif ($item_dsatz[$_GET['slot']] == '0') {
	// Zieh dich an !
	$item_change="UPDATE `char` SET ".$_GET['slot']."='".$_GET['slot_id']."', ".$_GET['slot']."_uniq='".$_GET['slot_uniq']."' WHERE userID='".$_SESSION['userID']."'";
  	if (mysql_query($item_change)){
        $item_remove="DELETE FROM `inventory` WHERE itemID='" . $_GET['slot_id'] ."' and uniqID='" . $_GET['slot_uniq'] ."'";
        mysql_query($item_remove);
	}
} else {
	// Ausrüstung wechsel dich
	$item_change="UPDATE `char` SET ".$_GET['slot']."='".$_GET['slot_id']."', ".$_GET['slot']."_uniq='".$_GET['slot_uniq']."' WHERE userID='".$_SESSION['userID']."'";
  	if (mysql_query($item_change)){
        $item_remove="DELETE FROM `inventory` WHERE itemID='" . $_GET['slot_id'] ."' and uniqID='" . $_GET['slot_uniq'] ."'";
        mysql_query($item_remove);
		$item_add="INSERT INTO `inventory` SET itemID='" .$item_dsatz[$_GET['slot']] ."', uniqID='" .$item_dsatz[$_GET['slot']."_uniq"] ."', userID='".$_SESSION['userID']."', menge=1";
		mysql_query($item_add);
	}
}

//Seite neuladen
?>
<meta http-equiv="refresh" content="0;url=index.php?site=charakter#tabs-3">