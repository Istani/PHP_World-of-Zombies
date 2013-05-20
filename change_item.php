<?php
	include("_settings.php");
	include("_mysql.php");
	include("_functions.php");

    $item_check = "SELECT * FROM `char` WHERE userID='" . $_SESSION['userID'] . "'";
    $item_check_res = mysql_query($item_check);
    $item_dsatz = mysql_fetch_assoc($item_check_res);


/* Neu SK */
if ($item_dsatz[$_GET['slot']] == '0') {
	// Noch kein Item ausgerüstet
	$item_change="UPDATE `char` SET ".$_GET['slot']."='".$_GET['slot_id']."', ".$_GET['slot']."_uniq='".$_GET['slot_uniq']."' WHERE userID='".$_SESSION['userID']."'";
  	if (mysql_query($item_change)){
        $item_remove="DELETE FROM `inventory` WHERE itemID='" . $_GET['slot_id'] ."' and uniqID='" . $_GET['slot_uniq'] ."'";
        mysql_query($item_remove);
	}
} else {
	// Was hattest du vorher an?
	$item_change="UPDATE `char` SET ".$_GET['slot']."='".$_GET['slot_id']."', ".$_GET['slot']."_uniq='".$_GET['slot_uniq']."' WHERE userID='".$_SESSION['userID']."'";
  	if (mysql_query($item_change)){
        $item_remove="DELETE FROM `inventory` WHERE itemID='" . $_GET['slot_id'] ."' and uniqID='" . $_GET['slot_uniq'] ."'";
        mysql_query($item_remove);
		$item_add="INSERT INTO `inventory` SET itemID='" .$item_dsatz[$_GET['slot']] ."', uniqID='" .$item_dsatz[$_GET['slot']."_uniq"] ."', userID='".$_SESSION['userID']."', menge=1";
		mysql_query($item_add);
	}
}
	
?>