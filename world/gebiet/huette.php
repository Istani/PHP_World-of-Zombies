<?php
	$heildauer=60;
	
	$sql_query = "SELECT * FROM `char` WHERE userID = '" . $_SESSION['userID'] . "'";
    $result = mysql_query($sql_query);
    $dsatz = mysql_fetch_assoc($result);
	
	$max_wert_ausdauer  =   $dsatz['gesundheit']*$bg['vit_ausdauer_modifier'];
    $char_wasser	=	$dsatz['wasser'];
    $char_nahrung	=	$dsatz['nahrung'];
	
	$max_wasser=get_wert_plus_bonus($_SESSION['userID'], "wasser", $max_wert_ausdauer);
	$max_nahrung=get_wert_plus_bonus($_SESSION['userID'], "nahrung", $max_wert_ausdauer);
	
	$diff=($max_wasser-$char_wasser)+($max_nahrung-$char_nahrung);
	$sammeldauer=$heildauer*($diff/10);
	

	$queryString = strstr($_SERVER['REQUEST_URI'], '?');
    $queryString = ($queryString===false) ? '' : substr($queryString,1);
    $parameters = array();
    parse_str($queryString, $parameters);
    $temp_gebiet=$parameters['map'];
	//$gebiet=$row['abbaugebiet'];
	
	if (isset($_GET['abbau'])) {
        // Abbau starten
        $sql['user_aktion']="UPDATE `char`
            SET aktion='SCHLAFEN',
                aktion_id=0,
                aktion_start=".time().",
                aktion_ende=".(time()+$sammeldauer)."
            WHERE userID=".$_SESSION["userID"];
        mysql_query($sql['user_aktion']);
        echo "<meta http-equiv='refresh' content='0; URL=index.php' />";
        die();
    }
	echo '<h1>'.text_ausgabe("huette", 0, $bg['sprache']).'</h1>';
    echo text_ausgabe("huette_text", 0, $bg['sprache']).'<br><br>';
?>
    <table border="1" width="100%">
        <tr>
            <td>
<?php
	echo zeit_anzeigen($sammeldauer).'<br>';
	echo '<a href="index.php?'.$queryString.'&abbau=self">'.text_ausgabe("schlafen", 0, $bg['sprache']).'</a><br><br>';
?>		
		</td>
	</tr>
</table>