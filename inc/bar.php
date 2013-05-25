<?php
    if (isset($_SESSION['loginName'])) {
        $sql_query2 = "SELECT * FROM `nachricht_eingang` WHERE `empfaenger`='" . $_SESSION['userID']."' AND `status`=0";
        $result2 = mysql_query($sql_query2);
        $nachrichten = mysql_num_rows($result2);

        $sql_query = "SELECT * FROM `char` WHERE userID = '" . $_SESSION['userID'] . "'";
        $result = mysql_query($sql_query);
        $dsatz = mysql_fetch_assoc($result);

		$max_wert_ausdauer  =   $dsatz['gesundheit']*$bg['vit_ausdauer_modifier'];
        $char_wasser	=	$dsatz['wasser'];
        $char_nahrung	=	$dsatz['nahrung'];
        $char_exp   	=	$dsatz['exp'];
        $char_gold		=	$dsatz['goldklumpen'];
        $char_slave		=	$dsatz['zombieslave'];
        $char_lvl       =   $dsatz['level'];
		
		$sql_skill="INSERT INTO char_skill SET userID=".$_SESSION['userID'].", lvl=1, skillID=1";
		mysql_query($sql_skill);
		
		$sql_exp = "SELECT * FROM `char_exp` WHERE `level` = '" . $_SESSION['lvl'] . "'";
		$result_exp = mysql_query($sql_exp);
		$dsatz_exp = mysql_fetch_assoc($result_exp);
		
		$needxp     =   $dsatz_exp["exp"];
    }
    
	
    	
	echo '<table width="100%">';
	echo '<tr>';
	
	echo '<td style="width: 300px;">';
	echo text_ausgabe("Willkommen", 0, $bg['sprache']);
    if (isset($_SESSION['loginName'])) {
        echo $_SESSION['loginName'];
        echo '</td>';

        echo '<td style="text-align:center;">';
        echo $nachrichten;
        echo '&nbsp;' . text_ausgabe("char_status", 3, $bg['sprache']) . '';
        echo '</td>';

        echo '<td>';
        echo '';
        echo '</td>';

        echo '<td style="text-align:center; ">';
        echo $char_slave;
        echo '&nbsp;<span class="'.text_ausgabe("char_status", 4, $bg['sprache']).'_text">' . text_ausgabe("char_status", 4, $bg['sprache']) . '</font>';
        echo '</td>';

        echo '<td>';
        echo '';
        echo '</td>';

        echo '<td style="text-align:center; ">';
        echo $char_gold;
        echo '&nbsp;<span class="'.text_ausgabe("char_status", 2, $bg['sprache']).'_text">' . text_ausgabe("char_status", 2, $bg['sprache']) . '</font>';
        echo '</td>';

        echo '<td>';
        echo '';
        echo '</td>';

        echo '<td style="text-align:center; width:180px;">';
		echo '<div id="wasser_bar" class="Wasser_bg"><div class="wasser-text"></div></div>';
?>
	<script>
		var $jq = jQuery.noConflict();
		progressLabel = $jq( ".wasser-text" );
		$jq(function() {
			$jq( "#wasser_bar" ).progressbar({
				value: <?php echo $char_wasser; ?>,
				max: <?php echo get_wert_plus_bonus($_SESSION['userID'], "wasser", $max_wert_ausdauer); ?>
			});
		});
		progressLabel.text( "<?php echo $char_wasser . " / " . get_wert_plus_bonus($_SESSION['userID'], "wasser", $max_wert_ausdauer);?>" );
	</script>
<?php
        echo '&nbsp;<span class="'.text_ausgabe("char_status", 0, $bg['sprache']).'_text">' . text_ausgabe("char_status", 0, $bg['sprache']) . '</font>';
        echo '</td>';

        echo '<td>';
        echo '';
        echo '</td>';

		echo '<td style="text-align:center; width:180px;">';
		
		echo '<div id="nahrung_bar" class="Nahrung_bg"><div class="nahrung-text"></div></div>';
?>
	<script>
		var $jq = jQuery.noConflict();
		progressLabel = $jq( ".nahrung-text" );
		$jq(function() {
            $jq( "#nahrung_bar" ).progressbar({
				value: <?php echo $char_nahrung; ?>,
				max: <?php echo get_wert_plus_bonus($_SESSION['userID'], "nahrung", $max_wert_ausdauer); ?>
			});
		});
		progressLabel.text( "<?php echo $char_nahrung . " / " . get_wert_plus_bonus($_SESSION['userID'], "nahrung", $max_wert_ausdauer);?>" );
	</script>
<?php
    echo '&nbsp;<span class="'.text_ausgabe("char_status", 1, $bg['sprache']).'_text">' . text_ausgabe("char_status", 1, $bg['sprache']) . '</font>';
	echo '</td>';
	echo '</tr>';
	echo '</table>';

echo '<div id="exp_bar" class="exp_bg"><div class="exp-text"></div></div>';
?>
    <script>
		var $jq = jQuery.noConflict();
		progressLabel = $jq( ".exp-text" );
		$jq(function() {
			var progressLabel = $jq( ".exp-text" );
            $jq( "#exp_bar" ).progressbar({
				value: <?php echo $char_exp; ?>,
				max: <?php echo $needxp; ?>
			});
		});
		progressLabel.text( "<?php echo "Level: " . $char_lvl . " - " . $char_exp . "/" . $needxp;?>" );
	</script>
<?php
    }
	
?>
