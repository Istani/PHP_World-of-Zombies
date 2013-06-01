<?php
	$sammeldauer=300;
	$muell_livetime=60*60*24*7; // 60 Sek = 1 Min * 60 = 1 Std * 24 = 1 Tag * 7 = 7Tage ?!?
	
    $queryString = strstr($_SERVER['REQUEST_URI'], '?');
    $queryString = ($queryString===false) ? '' : substr($queryString,1);
    $parameters = array();
    parse_str($queryString, $parameters);
    $temp_gebiet=$parameters['map'];
	//$gebiet=$row['abbaugebiet'];
	
	if (isset($_GET['abbau'])) {
        // Abbau starten
        $sql['user_aktion']="UPDATE `char`
            SET aktion='MÜLL',
                aktion_id=".$_SESSION["userID"].",
                aktion_start=".time().",
                aktion_ende=".(time()+$sammeldauer)."
            WHERE userID=".$_SESSION["userID"];
        mysql_query($sql['user_aktion']);
        echo "<meta http-equiv='refresh' content='0; URL=index.php' />";
        die();
    }
	
	if (isset($_POST['weg'])) {
        //Zeug wegschmeißen
		if (inventory_remove($_SESSION["userID"], $_POST['item'], $_POST['menge'])) {
			mysql_query("INSERT INTO abfall SET zeitpunkt='".time()."',
												item='".$_POST['item']."',
												menge='".$_POST['menge']."',
												spieler='".$_SESSION["userID"]."'");
		}
        
    }
	
	echo '<h1>'.text_ausgabe("muell", 0, $bg['sprache']).'</h1>';
	if (!check_quest(3, $_SESSION['userID'])) {
		echo '<p>'.text_ausgabe("quest_text_beendung", 3, $bg['sprache']).'</p>';
		erledige_quest(3, $_SESSION['userID']);
		echo '<br>';
	}
	echo '<p>'.text_ausgabe("muell_text", 0, $bg['sprache']).'</p>';
	echo '<br>';
?>
    <table border="1" width="100%">
        <tr>
            <td>
<?php
	mysql_query("DELETE * FROM abfall WHERE zeitpunkt<=".(time()-$muell_livetime));
	$sql['abfall']="SELECT * FROM abfall WHERE spieler=".$_SESSION["userID"];
	$query['abfall']=mysql_query($sql['abfall']);
	if (mysql_num_rows($query['abfall'])>0) {
		if ((player_inventar_frei($_SESSION['userID'])>0) && (player_wasser_status($_SESSION['userID'])>5)) {
			echo '<a href="index.php?'.$queryString.'&abbau=self">'.text_ausgabe("muell_sammeln", 1, $bg['sprache']).'</a><br><br>';
		} else {
			echo text_ausgabe("muell_sammeln_not", 0, $bg['sprache']).'<br><br>';
		}
	} else {
		echo text_ausgabe("muell_sammeln_not", 0, $bg['sprache']).'<br><br>';
	}
    echo '<br>';
?>
		</td>
	</tr>
	<tr>	
		<td>
<?php
	// Items wegwerfen
	$sql_inv="SELECT itemID, sum(menge) as anz FROM inventory WHERE inventory.userID = '".$_SESSION['userID']."' GROUP BY itemID ORDER BY itemID";
	$query_inv=mysql_query($sql_inv);
	echo '<table>';
	while ($row_inv=mysql_fetch_assoc($query_inv)) {
		echo '<tr>';
		echo '<td>';
		echo item_bilder($row_inv['itemID'], "show");
        echo "&nbsp;".text_ausgabe("item", $row_inv['itemID'], $bg['sprache']);
		echo '</td><td>';
		echo '<form method="post">';
		echo '<input type="hidden" name="item" value="'.$row_inv['itemID'].'">';
		echo '<input type="text" name="menge" value="'.$row_inv['anz'].'">';
		echo '<input type="submit" name="weg" value="'.text_ausgabe("wegwerfen", 0, $bg['sprache']).'">';
		echo '</form>';
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
?>		
		</td>
	</tr>
</table>