<?php
    if (isset($_SESSION['loginName'])) {
        $sql_query2 = "SELECT * FROM `nachricht_eingang` WHERE `empfaenger`='" . $_SESSION['userID']."' AND `status`=0";
        $result2 = mysql_query($sql_query2);
        $nachrichten = mysql_num_rows($result2);

        $sql_query = "SELECT * FROM `char` WHERE userID = '" . $_SESSION['userID'] . "'";
        $result = mysql_query($sql_query);
        $dsatz = mysql_fetch_assoc($result);

	$max_wert_ausdauer = $dsatz['gesundheit'];
        $char_wasser	=	$dsatz['wasser'];
        $char_nahrung	=	$dsatz['nahrung'];
        $char_gold		=	$dsatz['goldklumpen'];
        $char_slave		=	$dsatz['zombieslave'];
		
		$sql_skill="INSERT INTO char_skill SET userID=".$_SESSION['userID'].", lvl=1, skillID=1";
		mysql_query($sql_skill);
    }
	
	echo '<table width="100%">';
	echo '<tr>';
	
	echo '<td>';
	echo text_ausgabe("Willkommen", 0, $bg['sprache']);
    if (isset($_SESSION['loginName'])) {
        echo $_SESSION['loginName'];
        echo '</td>';

        echo '<td style="text-align:center;">';
        echo $nachrichten;
        echo '&nbsp;' . text_ausgabe("char_status", 3, $bg['sprache']) . '';
        echo '</td>';

        echo '<td>';
        echo '|';
        echo '</td>';

        echo '<td style="text-align:center; ">';
        echo $char_slave;
        echo '&nbsp;<span class="'.text_ausgabe("char_status", 4, $bg['sprache']).'_text">' . text_ausgabe("char_status", 4, $bg['sprache']) . '</font>';
        echo '</td>';

        echo '<td>';
        echo '|';
        echo '</td>';

        echo '<td style="text-align:center; ">';
        echo $char_gold;
        echo '&nbsp;<span class="'.text_ausgabe("char_status", 2, $bg['sprache']).'_text">' . text_ausgabe("char_status", 2, $bg['sprache']) . '</font>';
        echo '</td>';

        echo '<td>';
        echo '|';
        echo '</td>';

        echo '<td style="text-align:center; width:120px;">';
		echo '<div id="'.text_ausgabe("char_status", 0, $bg['sprache']) . '_bar" class="'.text_ausgabe("char_status", 0, $bg['sprache']) . '_bg"></div>';
?>
	<script>
		var $jq = jQuery.noConflict();
		$jq(function() {
			$jq( "#<?php echo text_ausgabe("char_status", 0, $bg['sprache']) ?>_bar" ).progressbar({
				value: <?php echo $char_wasser; ?>,
				max: <?php echo get_wert_plus_bonus($_SESSION['userID'], "wasser", $max_wert_ausdauer); ?>
			});
		});
	</script>
<?php
        echo '&nbsp;<span class="'.text_ausgabe("char_status", 0, $bg['sprache']).'_text">' . text_ausgabe("char_status", 0, $bg['sprache']) . '</font>';
        echo '</td>';

        echo '<td>';
        echo '|';
        echo '</td>';

		echo '<td style="text-align:center; width:120px;">';
		
		echo '<div id="' . text_ausgabe("char_status", 1, $bg['sprache']) . '_bar" class="' . text_ausgabe("char_status", 1, $bg['sprache']) . '_bg"></div>';
?>
	<script>
		var $jq = jQuery.noConflict();
		$jq(function() {
            $jq( "#<?php echo text_ausgabe("char_status", 1, $bg['sprache']) ?>_bar" ).progressbar({
				value: <?php echo $char_nahrung; ?>,
				max: <?php echo get_wert_plus_bonus($_SESSION['userID'], "nahrung", $max_wert_ausdauer); ?>
			});
		});
	</script>
<?php
    echo '&nbsp;<span class="'.text_ausgabe("char_status", 1, $bg['sprache']).'_text">' . text_ausgabe("char_status", 1, $bg['sprache']) . '</font>';
	echo '</td>';

    }
	echo '</tr>';
	echo '</table>';
?>
