<?php 
	$sql_quest_aktiv	= "SELECT cquest_questID FROM `char_quest` WHERE `cquest_gelesen`=0 AND `cquest_userID`= '" . $_SESSION['userID'] . "'";
	$query_quest_aktiv  = mysql_query($sql_quest_aktiv);
	$zeige_an=@mysql_result($query_quest_aktiv,0,0);
	
	if ($zeige_an>0) {
		$quest_title = text_ausgabe("quest", $zeige_an, $bg['sprache']);
		$quest_text  = text_ausgabe("quest_text", $zeige_an, $bg['sprache']);
	
		$sql_quest_aktiv	= "UPDATE `char_quest` SET `cquest_gelesen`=1 WHERE `cquest_userID`= '" . $_SESSION['userID'] . "' AND cquest_questID=".$zeige_an;
		mysql_query($sql_quest_aktiv);
	}
?>

<div id="dialog-quest" title="Quest">
    <form name="quest_anzeige" action="index.php?<?php echo $queryString; ?>" method="post">
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span><?php echo $quest_title; ?></p><br>
		<p><?php echo $quest_text; ?></p>
    </form>
</div>
<script type="text/javascript" >
    var $jq = jQuery.noConflict();
    $jq("#dialog-quest").dialog({
        autoOpen: false,
        resizable: false,
        height: 400,
        width: 660,
        modal: true,
        buttons: {
            'OK': function() {
                $jq(this).dialog("close");
            }
        }
    });
</script>
<?php
	if (mysql_num_rows($query_quest_aktiv)>0) {
		echo '<script type="text/javascript">$jq("#dialog-quest").dialog("open");</script>';
	}
?>