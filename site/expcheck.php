<script type="text/javascript" >
    var $jq = jQuery.noConflict();
    $jq("#dialog-benutzen").dialog({
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
    function dialog_aufrufen($item) {
        var $jq = jQuery.noConflict();
        $jq("#dialog-benutzen").dialog("open");
        return false;
    };
</script>

<?php 
	$sql_exp       = "SELECT * FROM `char_exp` WHERE `level` = '" . $_SESSION['lvl'] . "'";
	$result_exp    = mysql_query($sql_exp);
	$dsatz_exp     = mysql_fetch_assoc($result_exp);
    $needxp        = $dsatz['exp'];
	
	$sql_lvlup="UPDATE `char` SET level=level+1, exp=exp-exp WHERE `userID` = '" . $_SESSION['userID'] . "'";
	mysql_query($sql_lvlup);
	
	$sql_query = "SELECT * FROM login WHERE `loginName` = '" . $_POST['username'] . "' and `passwort` = '$pw'";
?>