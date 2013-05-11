<div id="tabs">
<ul>
<li><a href="#tabs-1">Information</a></li>
<li><a href="#tabs-2">Inventar</a></li>
<li><a href="#tabs-3">Skills</a></li>
</ul>
<div id="tabs-1">
<p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
</div>
<div id="tabs-2">
<?php
	//items auslesen
	$sql_query = "SELECT * FROM `char` WHERE `userID` = '" . $_SESSION['userID'] . "'";
	$result = mysql_query($sql_query);
	$dsatz = mysql_fetch_assoc($result);

		$char_nahkampf		=		$dsatz['nahkampf'];
		$char_schusswaffe	=		$dsatz['schusswaffe'];

		$char_rucksack		=		$dsatz['rucksack'];
		$char_helm			=		$dsatz['helm'];
		$char_amor			=		$dsatz['amor'];
		$char_handschuhe	=		$dsatz['handschuhe'];
		$char_schuhe		=		$dsatz['schuhe'];
		$char_fahrzeug		=		$dsatz['fahrzeug'];

		$max_wert_ausdauer = $dsatz['gesundheit'];

    $queryString = strstr($_SERVER['REQUEST_URI'], '?');
    $queryString = ($queryString===false) ? '' : substr($queryString,1);
    //echo var_dump($_POST);
    if (isset($_POST['aktion'])) {
        if ($_POST['aktion']=="item_benutzen") {
            if (inventory_remove($_SESSION['userID'], $_POST["itemid"], 1)) {
                $sql_item="SELECT * FROM item_db WHERE itemID=".$_POST["itemid"]." LIMIT 0,1";
                $query_item=mysql_query($sql_item);
                if (mysql_num_rows($query_item)>0) {
                    $item_row=mysql_fetch_assoc($query_item);
                    $wert=text_ausgabe("char_status", $item_row['refillart'], "deutsch");
                    $menge=$item_row['refill'];
                    $sql_update="UPDATE `char` SET ".$wert."=".$wert."+".$menge." WHERE `userID` = '" . $_SESSION['userID'] . "'";
                    mysql_query($sql_update);
		    $max_wert= get_wert_plus_bonus($_SESSION['userID'], strtolower($wert), $max_wert_ausdauer);
		    $sql_update="UPDATE `char` SET ".$wert."=".$max_wert." WHERE `userID` = '" . $_SESSION['userID'] . "' AND ".$wert.">".$max_wert;
                    mysql_query($sql_update);

                    echo '<meta http-equiv="refresh" content="0; URL=index.php?'.$queryString.'">';
                }
            }
        }
    }
?>
<div id="dialog-benutzen" title="Item Benutzen">
    <form name="item_use" action="index.php?<?php echo $queryString; ?>" method="post">
        <input type="hidden" name="aktion" value="item_benutzen">
        <input type="hidden" name="itemid" id="use_item">
        <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Sind Sie sicher das Sie Das item benutzen wollen</p>
    </form>
</div>
<table border=1>
	<tr>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;"><?php
		$equip=$char_helm;
		$title='title="'.item_hover($equip).'"';
		echo '<img class="equip" '.$title.' src="picture/items/'.$equip.'.png">';
		?></td>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;"><?php
		$equip=$char_fahrzeug;
        echo item_bilder($equip, "equip");
		?></td>
	</tr>
	<tr>
		<td style="width:75px; height:75px;"><?php
		$equip=$char_nahkampf;
        echo item_bilder($equip, "equip");
		?></td>
		<td style="width:75px; height:75px;"><?php
		$equip=$char_schusswaffe;
        echo item_bilder($equip, "equip");
		?></td>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;"><?php
		$equip=$char_handschuhe;
        echo item_bilder($equip, "equip");
		?></td>
		<td style="width:75px; height:75px;"><?php
		$equip=$char_amor;
        echo item_bilder($equip, "equip");
		?></td>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;">&nbsp;</td>
	</tr>
	<tr>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;"><?php
		$equip=$char_schuhe;
        echo item_bilder($equip, "equip");
		?></td>
		<td style="width:75px; height:75px;">&nbsp;</td>
		<td style="width:75px; height:75px;"><?php
		$equip=$char_rucksack;
        echo item_bilder($equip, "equip");
		?></td>
	</tr>
</table>
<br>
<?php
	$max_row=25;
	$i=0;$j=1;
	$max_felder=player_inventar_platz($_SESSION['userID']);
	echo '<table border="1">';
	echo '<tr>';
	$sql_inv="SELECT inventory.*, item_db.art FROM inventory INNER JOIN item_db ON inventory.itemID = item_db.itemID WHERE inventory.userID = '".$_SESSION['userID']."' ORDER BY inventory.itemID, menge DESC";
	$query_inv=mysql_query($sql_inv);
	while ($row_inv=mysql_fetch_assoc($query_inv)) {
		echo '<td style="width:24px; height:24px;">';
        if ($row_inv['art']==3) {
            echo '<span OnClick="dialog_aufrufen('.$row_inv['itemID'].')">';
        } else {
            echo '<span>';
        }
        echo item_bilder($row_inv['itemID'], "inv", $row_inv['menge']);
        echo '</span>';
		echo '</td>';
		$i++;$j++;
		if ($i==$max_row) {
			echo '</tr><tr>';
			$i=0;
		}
	}
	//$max_felder=ceil($max_felder/$max_row)*$max_row;
	while ($j<=$max_felder) {
		echo '<td  style="width:24px; height:24px;">&nbsp;</td>';
		$i++;$j++;
		if ($i==$max_row) {
			echo '</tr><tr>';
			$i=0;
		}
	}
	echo '</tr></table>';
?>
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

</div>
<div id="tabs-3">
<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
</div>
</div>

<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>

