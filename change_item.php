<?php
	include("_settings.php");
	include("_mysql.php");
	include("_functions.php");

    $item_check = "SELECT * FROM `char` WHERE userID='" . $_SESSION['userID'] . "'";
    $item_check_res = mysql_query($item_check);
    $item_dsatz = mysql_fetch_assoc($item_check_res);
	
	/*
		- Alle Fehlermeldungen fehlen noch!
		- Items nur in richtige Slots ausrüsten (item_art aus DB prüfen)
	*/
	
	//var_dump($_GET);

// Alle Items abfangen die nicht ausgerüstet werden
$sql_check_items="SELECT art FROM item_db WHERE itemID=".$_GET['slot_id'];
$query_check_item=mysql_query($sql_check_items);
$item_art=mysql_result($query_check_item,0,0);

//Ausrüstbare Arten
$art=array(1,2,4,5,6,7,8,9,10,11);

$sql_check_items="SELECT beschreibung FROM item_art WHERE art=".$item_art;
$query_check_item=mysql_query($sql_check_items);
$slot_art=mysql_result($query_check_item,0,0);
// Check item slot!
$slot_check=false;
if (str_replace($slot_art,"ikarus ist dumm",$_GET['slot'])!=$_GET['slot']) {
	$slot_check=true;
}


$wechseldich=true;
if (in_array($item_art, $art)) {
	if ($_GET['slot']=="inventar") {
		// Item wird ins inventar gelegt...
		foreach ($item_dsatz as $key => $value) {
			if ((@$item_dsatz[$key]==$_GET['slot_id']) && (@$item_dsatz[$key.'_uniq']==$_GET['slot_uniq'])) {
				$auswahl=$key;
			}
		}
		if ($auswahl!="") {
			$item_add="INSERT INTO `inventory` SET itemID='" .$_GET['slot_id'] ."', uniqID='".$_GET['slot_uniq']."', userID='".$_SESSION['userID']."', menge=1";
			mysql_query($item_add);
			$item_change="UPDATE `char` SET ".$auswahl."='0', ".$auswahl."_uniq='0' WHERE userID='".$_SESSION['userID']."'";
			mysql_query($item_change);
		}
	} elseif (($item_dsatz[$_GET['slot']] == '0') && ($slot_check)) {
		// Zieh dich an !
		$item_change="UPDATE `char` SET ".$_GET['slot']."='".$_GET['slot_id']."', ".$_GET['slot']."_uniq='".$_GET['slot_uniq']."' WHERE userID='".$_SESSION['userID']."'";
		if (mysql_query($item_change)){
			$item_remove="DELETE FROM `inventory` WHERE itemID='" . $_GET['slot_id'] ."' and uniqID='" . $_GET['slot_uniq'] ."'";
			mysql_query($item_remove);
		}
	} elseif ($slot_check) {
		// Ausrüstung wechsel dich
		$item_change="UPDATE `char` SET ".$_GET['slot']."='".$_GET['slot_id']."', ".$_GET['slot']."_uniq='".$_GET['slot_uniq']."' WHERE userID='".$_SESSION['userID']."'";
		if (mysql_query($item_change)){
			$item_remove="DELETE FROM `inventory` WHERE itemID='" . $_GET['slot_id'] ."' and uniqID='" . $_GET['slot_uniq'] ."'";
			mysql_query($item_remove);
			$item_add="INSERT INTO `inventory` SET itemID='" .$item_dsatz[$_GET['slot']] ."', uniqID='" .$item_dsatz[$_GET['slot']."_uniq"] ."', userID='".$_SESSION['userID']."', menge=1";
			mysql_query($item_add);
		}
	} else {
		$wechseldich=false;
	}
	//Seite neuladen
	if ($wechseldich) {
		?>
		<script type="text/javascript">
			var $jq = jQuery.noConflict();
			$jq(function() {
				window.location = 'index.php?site=charakter';
			});
		</script>
		<?php
	}
	//Nicht neuladen wenn nichts passiert ist
}
?>
