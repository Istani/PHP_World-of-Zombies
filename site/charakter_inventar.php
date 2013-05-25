<script type="text/javascript">
function handleCardDrop( event, ui ) {
	var $jq = jQuery.noConflict();
	var slotNumber = $jq(this).data( 'SID' );
	var cardNumber = ui.draggable.data( 'IID' ).item;
	var uniqid = ui.draggable.data( 'IID' ).uniq;
	$jq("#hidden").load("change_item.php?slot="+slotNumber+"&slot_id="+cardNumber+"&slot_uniq="+uniqid);
}
</script>

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
					
                    echo '<script type="text/javascript">var $jq = jQuery.noConflict();
						$jq(function() {
							window.location = \'index.php?site=charakter\';
						});
					</script>';
                }
            }
        }
    }
?>
<div id="dialog-benutzen" title="Item Benutzen">
	<form name="item_use" action="index.php?<?php echo $queryString; ?>#tabs-3" method="post">
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
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><?php
			$equip=$char_helm;
			echo item_bilder($equip, "equip");
		?></td>
		<td>&nbsp;</td>
		<td><?php
			$equip=$char_fahrzeug;
			echo item_bilder($equip, "equip");
		?></td>
	</tr>
	<tr>
		<td>Nahkampf</td>
		<td>Fernkampf</td>
		<td>&nbsp;</td>
		<td>Handschuhe</td>
		<td>R&uuml;stung</td>
		<td>&nbsp;</td>
		<td></td>
	</tr>
	<tr>
		<td>
		<!--- Drag & Drop -->
			<div id="slot_nahkampf">
				<div id="slot_dropme_nakampf">
				<?php
					$equip=$char_nahkampf;
					$equip_uniq=$char_nahkampf_uniq;
					echo item_bilder($equip, "equip",0,$equip_uniq);
				?>
				</div>
			</div>
			<script type="text/javascript">
			var $jq = jQuery.noConflict();
			$jq('#slot_nahkampf').data( 'SID', "nahkampf").droppable( {
				accept: 'div',
				hoverClass: 'hovered',
				drop: handleCardDrop
			} );
			$jq('#slot_dropme_nakampf').data( 'IID', { item: <?php echo $equip; ?>, uniq: <?php echo $equip_uniq; ?>}).draggable( {
				cursor: 'move',
				revert: true
			} );
			</script>
		<!--- ENDE Drag & Drop -->
		</td>
		<td>
		<!--- Drag & Drop -->
			<div id="slot_schusswaffe">
				<div id="slot_dropme_schusswaffe">
				<?php
					$equip=$char_schusswaffe;
					$equip_uniq=$char_schusswaffe_uniq;
					echo item_bilder($equip, "equip",0,$equip_uniq);
				?>
				</div>
			</div>
			<script type="text/javascript">
			var $jq = jQuery.noConflict();
			$jq('#slot_schusswaffe').data( 'SID', "schusswaffe").droppable( {
				accept: 'div',
				hoverClass: 'hovered',
				drop: handleCardDrop
			} );
			$jq('#slot_dropme_schusswaffe').data( 'IID', { item: <?php echo $equip; ?>, uniq: <?php echo $equip_uniq; ?>}).draggable( {
				cursor: 'move',
				revert: true
			} );
			</script>
		<!--- ENDE Drag & Drop -->
		</td>
		<td>&nbsp;</td>
		<td>
		<!--- Drag & Drop -->
			<div id="slot_handschuhe">
				<div id="slot_dropme_handschuhe">
				<?php
					$equip=$char_handschuhe;
					$equip_uniq=$char_handschuhe_uniq;
					echo item_bilder($equip, "equip",0,$equip_uniq);
				?>
				</div>
			</div>
			<script type="text/javascript">
			var $jq = jQuery.noConflict();
			$jq('#slot_handschuhe').data( 'SID', "handschuhe").droppable( {
				accept: 'div',
				hoverClass: 'hovered',
				drop: handleCardDrop
			} );
			$jq('#slot_dropme_handschuhe').data( 'IID', { item: <?php echo $equip; ?>, uniq: <?php echo $equip_uniq; ?>}).draggable( {
				cursor: 'move',
				revert: true
			} );
			</script>
		<!--- ENDE Drag & Drop -->
		</td>
		<td>
		<!--- Drag & Drop -->
			<div id="slot_amor">
				<div id="slot_dropme_amor">
				<?php
					$equip=$char_amor;
					$equip_uniq=$char_amor_uniq;
					echo item_bilder($equip, "equip",0,$equip_uniq);
				?>
				</div>
			</div>
			<script type="text/javascript">
			var $jq = jQuery.noConflict();
			$jq('#slot_amor').data( 'SID', "amor").droppable( {
				accept: 'div',
				hoverClass: 'hovered',
				drop: handleCardDrop
			} );
			$jq('#slot_dropme_amor').data( 'IID', { item: <?php echo $equip; ?>, uniq: <?php echo $equip_uniq; ?>}).draggable( {
				cursor: 'move',
				revert: true
			} );
			</script>
		<!--- ENDE Drag & Drop -->
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>Schuhe</td>
		<td></td>
		<td>Rucksack</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>
		<!--- Drag & Drop -->
			<div id="slot_schuhe">
				<div id="slot_dropme_schuhe">
				<?php
					$equip=$char_schuhe;
					$equip_uniq=$char_schuhe_uniq;
					echo item_bilder($equip, "equip",0,$equip_uniq);
				?>
				</div>
			</div>
			<script type="text/javascript">
			var $jq = jQuery.noConflict();
			$jq('#slot_schuhe').data( 'SID', "schuhe").droppable( {
				accept: 'div',
				hoverClass: 'hovered',
				drop: handleCardDrop
			} );
			$jq('#slot_dropme_schuhe').data( 'IID', { item: <?php echo $equip; ?>, uniq: <?php echo $equip_uniq; ?>}).draggable( {
				cursor: 'move',
				revert: true
			} );
			</script>
		<!--- ENDE Drag & Drop -->
		</td>
		<td>&nbsp;</td>
		<td>
		<!--- Drag & Drop -->
			<div id="slot_rucksack">
				<div id="slot_dropme_rucksack">
				<?php
					$equip=$char_rucksack;
					$equip_uniq=$char_rucksack_uniq;
					echo item_bilder($equip, "equip",0,$equip_uniq);
				?>
				</div>
			</div>
			<script type="text/javascript">
			var $jq = jQuery.noConflict();
			$jq('#slot_rucksack').data( 'SID', "rucksack").droppable( {
				accept: 'div',
				hoverClass: 'hovered',
				drop: handleCardDrop
			} );
			$jq('#slot_dropme_rucksack').data( 'IID', { item: <?php echo $equip; ?>, uniq: <?php echo $equip_uniq; ?>}).draggable( {
				cursor: 'move',
				revert: true
			} );
			</script>
		<!--- ENDE Drag & Drop -->
		</td>
	</tr>
</table>

<br>
<h1>Inventar</h1>
<hr /><br>
<?php
	$max_row=14; // 25 bei 25px bildern
	$i=0;$j=1;
	$max_felder=player_inventar_platz($_SESSION['userID']);
	echo '<table border="1">';
	echo '<tr>';
	$sql_inv="SELECT inventory.*, item_db.art FROM inventory INNER JOIN item_db ON inventory.itemID = item_db.itemID WHERE inventory.userID = '".$_SESSION['userID']."' ORDER BY inventory.itemID, menge DESC";
	$query_inv=mysql_query($sql_inv);
	while ($row_inv=mysql_fetch_assoc($query_inv)) {
	echo '<td>';
        if ($row_inv['art']==3) {
            echo '<span OnClick="dialog_aufrufen('.$row_inv['itemID'].')">';  // wegen benutzen
        } else {
            echo '<span>';
        }
			?>
			<div id="slot_inventar_<?php echo $i; ?>">
				<div id="item_<?php echo $row_inv['invID']; ?>">
					<?php echo item_bilder($row_inv['itemID'], "inv", $row_inv['menge'], $row_inv['uniqID']); ?>
				</div>
			</div>
			<script type="text/javascript">
			var $jq = jQuery.noConflict();
			$jq('#item_<?php echo $row_inv['invID']; ?>').data( 'IID', { item: <?php echo $row_inv['itemID']; ?>, uniq: <?php echo $row_inv['uniqID']; ?>}).draggable( {
				cursor: 'move',
				revert: true
			} );

			var $jq = jQuery.noConflict();
			$jq('#slot_inventar_<?php echo $i; ?>').data( 'SID', "inventar").droppable( {
				accept: 'div',
				hoverClass: 'hovered',
				drop: handleCardDrop
			} );
			</script>
			<?php
		echo '</span>';
	echo '</td>';
	$i++;$j++;
	if ($i==$max_row) {
		echo '</tr><tr>';
		$i=0;
	}
}

while ($j<=$max_felder) {
	?>
	<td id="slot_inventar_<?php echo $i; ?>">
		<?php echo item_bilder(0, "inv"); ?>
		<script type="text/javascript">
		var $jq = jQuery.noConflict();
		$jq('#slot_inventar_<?php echo $i; ?>').data( 'SID', "inventar").droppable( {
			accept: 'div',
			hoverClass: 'hovered',
			drop: handleCardDrop
		} );
		</script>
	<?php
	echo '</td>';
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
