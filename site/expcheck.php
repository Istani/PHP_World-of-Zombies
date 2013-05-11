<?php 

	$sql_lvlup="UPDATE `char` SET level=level+1, exp=exp-exp WHERE `userID` = '" . $_SESSION['userID'] . "'";
	mysql_query($sql_lvlup);

<script type="text/javascript" >
    var $jq = jQuery.noConflict();
    $jq("#dialog-benutzen").dialog({
        autoOpen: false,
        resizable: false,
        height: 250,
        width: 360,
        modal: true,
        buttons: {
            'Ja': function() {
                document.item_use.submit();
            },
            'Nein': function() {
                $jq(this).dialog("close");
            }
        }
    });
    function dialog_aufrufen($item) {
        var $jq = jQuery.noConflict();
        document.getElementById("use_item").value=$item;
        $jq("#use_item").value=$item;
        $jq("#dialog-benutzen").dialog("open");
        return false;
    };
</script>
?>