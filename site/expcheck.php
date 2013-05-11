<div id="dialog-levelup" title="Level UP">
    <form name="level_up" action="index.php?<?php echo $queryString; ?>" method="post">
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Herzlichen Glückwunsch!<br> Du bist nun Level: <?php echo $_SESSION['lvl']+1; ?></p>
    </form>
</div>
<script type="text/javascript" >
    var $jq = jQuery.noConflict();
    $jq("#dialog-levelup").dialog({
        autoOpen: false,
        resizable: false,
        height: 250,
        width: 360,
        modal: true,
        buttons: {
            'OK': function() {
                $jq(this).dialog("close");
            }
        }
    });
    function exp_aufrufen() {
        var $jq = jQuery.noConflict();
        $jq("#dialog-levelup").dialog("open");
        return false;
    };
</script>
<?php 
	$sql_exp       = "SELECT * FROM `char_exp` WHERE `level` = '" . $_SESSION['lvl'] . "'";
	$result_exp    = mysql_query($sql_exp);
	$dsatz_exp     = mysql_fetch_assoc($result_exp);
    $needxp        = $dsatz_exp['exp'];
	
	$sql_lvlup="UPDATE `char` SET level=level+1, skpoints=skpoints+1 exp=exp-".$needxp." WHERE `userID` = '" . $_SESSION['userID'] . "' AND exp>".$needxp;
	mysql_query($sql_lvlup);
	
	$sql_neues_level="SELECT `level` FROM `char` WHERE `userID` = '" . $_SESSION['userID'] . "'";
	$query_neues_level=mysql_query($sql_neues_level);
	if ($_SESSION['lvl']<>mysql_result($query_neues_level,0,0)) {
		echo '<script type="text/javascript" >exp_aufrufen()</script>';
		$_SESSION['lvl']=mysql_result($query_neues_level,0,0);
	}
?>