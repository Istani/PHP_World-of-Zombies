<?php
	include("_settings.php");
	include("_mysql.php");
	include("_functions.php");

    $item_check = "SELECT * FROM `char` WHERE userID='" . $_SESSION['userID'] . "'";
    $item_check_res = mysql_query($item_check);
    $item_dsatz = mysql_fetch_assoc($item_check_res);


if ($item_dsatz[$_GET['slot']] == '0' && $item_dsatz[$_GET['slot']."_uniq"] == '0'){

   $item_change="UPDATE `char` SET ".$_GET['slot']."='".$_GET['slot_id']."', ".$_GET['slot']."_uniq='".$_GET['slot_uniq']."' WHERE userID='".$_SESSION['userID']."'";
  	if (mysql_query($item_change)){
        $item_remove="DELETE * FROM `inventory` WHERE itemID='" . $_GET['slot_id'] ."' and uniqID='" . $_GET['slot_uniq'] ."'";
        mysql_query($item_remove);
        }

if ($item_dsatz[$_GET['slot']] == $_GET['slot_id'] && $item_dsatz[$_GET['slot']."_uniq"] == $_GET['slot_uniq']){

   $item_change="UPDATE `char` SET ".$_GET['slot']."='".$_GET['slot_id']."', ".$_GET['slot']."_uniq='".$_GET['slot_uniq']."' WHERE userID='".$_SESSION['userID']."'";
  	if (mysql_query($item_change)){
        $item_remove="DELETE * FROM `inventory` WHERE itemID='" . $_GET['slot_id'] ."' and uniqID='" . $_GET['slot_uniq'] ."'";
        mysql_query($item_remove);
        inventory_add($_SESSION['userID'], $_GET['slot_id'], 1, $_GET['slot_uniq']);
        }
        
   }else{  
	
    $item_change_eq="UPDATE `char` SET ".$_GET['slot']."= '0' and ".$_GET['slot']."_uniq='0' WHERE '".$_GET['slot']."='".$_GET['slot_id']."' and '".$_GET['slot']."_uniq='".$_GET['slot_uniq']."'";
    if(mysql_query($item_change_eq)){
        
        }
    }	
	
?>