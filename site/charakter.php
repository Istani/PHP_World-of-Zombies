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

		$char_wasser	=	$dsatz['wasser'];
        $char_nahrung	=	$dsatz['nahrung'];
		$max_wert_ausdauer = $dsatz['gesundheit'];
	
	$sql_exp = "SELECT * FROM `char_exp` WHERE `level` = '" . $_SESSION['lvl'] . "'";
	$result_exp = mysql_query($sql_exp);
	$dsatz_exp = mysql_fetch_assoc($result_exp);
	
	$sql_time = "SELECT * FROM `login` WHERE `userID` = '" . $_SESSION['userID'] . "'";
	$result_time = mysql_query($sql_time);
	$dsatz_time = mysql_fetch_assoc($result_time);

    $tage       =   (int)($dsatz_time['onlineTimer']/60/60/24);
    $stunden    =   number_format($dsatz_time['onlineTimer']/60/60);
    $min        =   number_format($dsatz_time['onlineTimer']/60);
?>

<div id="tabs">

<ul>
<li><a href="#tabs-2">Charakter</a></li>
<li><a href="#tabs-3">Inventar</a></li>
<li><a href="#tabs-4">F&auml;higkeiten</a></li>
</ul>

<div id="tabs-2">
<h1>Status</h1>
<hr />
<table>
    <tr>
        <td style="width: 200px;"><b><?php echo $_SESSION['loginName']; ?></b></td>
        <td style="width: 200px;"></td>
        <td colspan="2" style="width: 400px;"><b>Spielzeit:</b></td>
    </tr>
    <tr>
        <td>Level: <?php echo $dsatz['level']; ?></td>
        <td>Klasse: <?php echo text_ausgabe("char_klasse", $dsatz['klasse'], $bg['sprache']); ?></td>
        <td colspan="2" ><?php echo $tage;?> Tage <?php echo $stunden - $tage*24;?> Std. <?php echo $min - $stunden*60;?> Min.</td>
    </tr>
    <tr>
        <td colspan="4"><hr /></td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>Erfahrung:</td>
        <td><?php echo $dsatz["exp"] . "/" . $dsatz_exp["exp"]; ?></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="4">
        <?php
echo '<div id="Exp_bar_status" class="Exp_bg"></div>';
?>
	<script>
		var $jq = jQuery.noConflict();
		$jq(function() {
			$jq( "#Exp_bar_status" ).progressbar({
				value: <?php echo $dsatz["exp"]; ?>,
				max: <?php echo $dsatz_exp["exp"]; ?>
			});
		});
	</script>
        </td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td>Nahrung:</td>
        <td><?php echo $dsatz['nahrung']; ?></td>
        <td>Wasser:</td>
        <td><?php echo $dsatz['wasser']; ?></td>
    </tr>
    <tr>
        <td colspan="2">
	    <?php
echo '<div id="Nahrung_bar_status" class="Nahrung_bg"></div>';
?>
	<script>
		var $jq = jQuery.noConflict();
		$jq(function() {
			$jq( "#Nahrung_bar_status" ).progressbar({
				value: <?php echo $char_nahrung; ?>,
				max: <?php echo get_wert_plus_bonus($_SESSION['userID'], "nahrung", $max_wert_ausdauer); ?>
			});
		});
	</script>
		</td>
        <td colspan="2">
		<?php
echo '<div id="Wasser_bar_status" class="Wasser_bg"></div>';
?>
	<script>
		var $jq = jQuery.noConflict();
		$jq(function() {
			$jq( "#Wasser_bar_status" ).progressbar({
				value: <?php echo $char_wasser; ?>,
				max: <?php echo get_wert_plus_bonus($_SESSION['userID'], "wasser", $max_wert_ausdauer); ?>
			});
		});
	</script>
		</td>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td>Gegenst&auml;nde hergestellt:</td>
        <td><?php echo $dsatz["Items_Crafting"]; ?></td>
        <td>Rohstoffe abgebaut:</td>
        <td><?php echo $dsatz["Items_Abbau"]; ?></td>
    </tr>
</table>
</div>
<div id="tabs-3">
<h1>Ausr&uuml;stung</h1>
<hr /><br>
<?php
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
<table>
	<tr>
		<td style="width:100px;">&nbsp;</td>
		<td style="width:100px;">&nbsp;</td>
		<td style="width:25px;">&nbsp;</td>
		<td style="width:100px;">&nbsp;</td>
		<td style="width:100px;">Helm</td>
		<td style="width:25px;">&nbsp;</td>
		<td style="width:100px;">Fahrzeug</td>
	</tr>
	<tr>
		<td style="width:100px; height:75px;">&nbsp;</td>
		<td style="width:100px; height:75px;">&nbsp;</td>
		<td style="width:25px; height:75px;">&nbsp;</td>
		<td style="width:100px; height:75px;">&nbsp;</td>
		<td style="width:100px; height:75px;"><?php
		$equip=$char_helm;
		$title='title="'.item_hover($equip).'"';
		echo '<img class="equip" '.$title.' src="picture/items/'.$equip.'.png">';
		?></td>
		<td style="width:25px; height:75px;">&nbsp;</td>
		<td style="width:100px; height:75px;"><?php
		$equip=$char_fahrzeug;
        echo item_bilder($equip, "equip");
		?></td>
	</tr>
	<tr>
		<td style="width:100px;">Nahkampf</td>
		<td style="width:100px;">Fernkampf</td>
		<td style="width:25px;">&nbsp;</td>
		<td style="width:100px;">Handschuhe</td>
		<td style="width:100px;">R&uuml;stung</td>
		<td style="width:25px;">&nbsp;</td>
		<td style="width:100px;"></td>
	</tr>
	<tr>
		<td style="width:100px; height:75px;"><?php
		$equip=$char_nahkampf;
        echo item_bilder($equip, "equip");
		?></td>
		<td style="width:100px; height:75px;"><?php
		$equip=$char_schusswaffe;
        echo item_bilder($equip, "equip");
		?></td>
		<td style="width:25px; height:75px;">&nbsp;</td>
		<td style="width:100px; height:75px;"><?php
		$equip=$char_handschuhe;
        echo item_bilder($equip, "equip");
		?></td>
		<td style="width:100px; height:75px;"><?php
		$equip=$char_amor;
        echo item_bilder($equip, "equip");
		?></td>
		<td style="width:25px; height:75px;">&nbsp;</td>
		<td style="width:100px; height:75px;">&nbsp;</td>
	</tr>
	<tr>
		<td style="width:100px;"></td>
		<td style="width:100px;"></td>
		<td style="width:25px;"></td>
		<td style="width:100px;"></td>
		<td style="width:100px;">Schuhe</td>
		<td style="width:25px;"></td>
		<td style="width:100px;">Rucksack</td>
	</tr>
	<tr>
		<td style="width:100px; height:75px;">&nbsp;</td>
		<td style="width:100px; height:75px;">&nbsp;</td>
		<td style="width:25px; height:75px;">&nbsp;</td>
		<td style="width:100px; height:75px;">&nbsp;</td>
		<td style="width:100px; height:75px;"><?php
		$equip=$char_schuhe;
        echo item_bilder($equip, "equip");
		?></td>
		<td style="width:25px; height:75px;">&nbsp;</td>
		<td style="width:100px; height:75px;"><?php
		$equip=$char_rucksack;
        echo item_bilder($equip, "equip");
		?></td>
	</tr>
</table>
<br>
<h1>Inventar</h1>
<hr /><br>
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
<div id="tabs-4">
<?php
	echo '<h1>F&auml;higkeiten</h1><hr /><br>';
	echo '<table width="100%" border="1">';

	// SQL Alle Skills
	$sql_skills="SELECT `skill_db`.*, `char_skill`.`lvl` FROM `skill_db` INNER JOIN `char_skill` ON `skill_db`.`skill_ID`=`char_skill`.`skillID` WHERE userID=".$_SESSION['userID']." ORDER BY `erlernbar` DESC, `maxlvl` DESC";
	$query_skills=mysql_query($sql_skills);
	while ($row_skills=mysql_fetch_assoc($query_skills)) {
		echo '<tr>';
		echo '<td width="100%">';
		echo skill_bilder($row_skills['skill_ID']);
		echo text_ausgabe("skill", $row_skills['skill_ID'], $bg['sprache']);
		echo '</td>';
		echo '<td>';
		echo $row_skills['lvl'].'/'.$row_skills['maxlvl'];
		echo '</td>';
		echo '<td>';
		if ($row_skills['erlernbar']==1) {
			echo text_ausgabe("erlernbar", 0, $bg['sprache']);
		} else {
			echo text_ausgabe("erlernbar", 1, $bg['sprache']);
		}
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td colspan="3">';
		echo text_ausgabe("skill_beschreibung", $row_skills['skill_ID'], $bg['sprache']);
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';


?>
</div>

</div>



 <script>
var $jq = jQuery.noConflict();
	$jq("#tabs").tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
	$jq("#tabs li").removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
</script>

<style>
  .ui-tabs-vertical { width: 55em; }
  .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
  .ui-tabs-vertical .ui-tabs-* {
	font-family: Verdana;
	font-size: 14px;
	vertical-align:top;
	border-collapse:collapse;
	text-align: left;
    color: #ffffff;
}

li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
  .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
  .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; border-right-width: 1px; }
  .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
  </style>
