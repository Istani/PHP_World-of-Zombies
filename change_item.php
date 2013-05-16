<?php
	include("_settings.php");
	include("_mysql.php");
	include("_functions.php");

	$item_change="UPDATE `char` SET ".$_GET['slot']."='".$_GET['slot_id']."', ".$_GET['slot']."_uniq='".$_GET['slot_uniq']."' WHERE userID='".$_SESSION['userID']."'";
  	if (mysql_query($item_change)){
        $item_remove="DELETE * FROM ´inventory´ WHERE itemID='" . $_GET['slot_id'] ."' and uniqID='" . $_GET['slot_uniq'] ."'";
        mysql_query($item_remove);
   }
   
   	$item_change_eq="DELETE * FROM ´inventory´ WHERE itemID='" . $_GET['slot_id'] ."' and uniqID='" . $_GET['slot_uniq'] ."'";
  	if (mysql_query($item_change_eq)){
        $item_remove_eq="UPDATE `char` SET ".$_GET['slot']."='".$_GET['slot_id']."', ".$_GET['slot']."_uniq='".$_GET['slot_uniq']."' WHERE userID='".$_SESSION['userID']."'";
        mysql_query($item_remove_eq);
   }	
	
?>