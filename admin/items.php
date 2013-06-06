<?php
$sql_itemdb = "SELECT * FROM `login` WHERE `userID` = '". $_SESSION['userID'] ."'";
$result_itemdb = mysql_query($sql_itemdb);
$ds_itemdb = mysql_fetch_assoc($result_itemdb);
$rechte = $ds_admin['rechte'];

if ($rechte == "4"){ 
        if (isset($_POST['add'])){
        $dateityp = GetImageSize($_FILES['datei']['tmp_name']);
        if($dateityp[2] == 3) {
        if (file_exists("picture/items/".$_POST['itemID'].".png")) {
            unlink("picture/items/" . $_POST['itemID'] . ".png"); // Falls schon vorhanden, Bild loeschen
            }
            move_uploaded_file($_FILES['datei']['tmp_name'], "picture/items/".$_POST['itemID'].".png");
            echo "Das Bild wurde Erfolgreich nach picture/items/" . $_POST['itemID'] . ".png hochgeladen";

            $sql_checkitem = "SELECT * FROM `item_db` WHERE `itemID` = '" . $_POST['itemID'] . "'";
            $result_checkitem = mysql_query($sql_checkitem);
	    $ds_checkitem = mysql_fetch_assoc($result_checkitem);
	    $ID = $ds_checkitem['itemID'];
            if (isset($ID)){
                echo text_ausgabe("item_db_error", 1, $bg['sprache']);
            }else{
                //Item wird in die Itemdb aufgenommen
                $sql_additemdb = "INSERT INTO `item_db` SET
                        `Info`          =     '" .$_POST["name"]. "',
                        `itemID`        =     '" .$_POST["itemID"]. "',
                        `min_lvl`       =     '" .$_POST["min_lvl"]. "',
                        `max_lvl`       =     '" .$_POST["max_lvl"]. "',
                        `art`           =     '" .$_POST['art']. "',
                        `stack`         =     '" .$_POST['stack']. "',
                        `mindmg`        =     '" .$_POST['mindmg']. "',
                        `maxdmg`        =     '" .$_POST['maxdmg']. "',
                        `def`           =     '" .$_POST['def']. "',
                        `mdef`          =     '" .$_POST['mdef']. "',
                        `hit`           =     '" .$_POST['hit']. "',
                        `crit`          =     '" .$_POST['crit']. "',
                        `refill`        =     '" .$_POST['refill']. "',
                        `refillart`     =     '" .$_POST['refillart']. "',
                        `platz`         =     '" .$_POST["platz"]. "',
                        `munitonsart`   =     '0'";
                mysql_query($sql_additemdb);

                // Item Name wird in Texte eingefuegt
                $sql_additem = "INSERT INTO `texte` SET
                        `kurz`    =     'item',
                        `id`      =     '" .$_POST["itemID"]. "',
                        `deutsch` =     '" .$_POST["name"]. "'";
                mysql_query($sql_additem);
                // Item Text wird in Texte eingefuegt
                $sql_additemtext = "INSERT INTO `texte` SET
                        `kurz`    =     'item_text',
                        `id`      =     '" .$_POST["itemID"]. "',
                        `deutsch` =     '" .$_POST["text"]. "'";
                mysql_query($sql_additemtext);
                echo "<meta http-equiv='refresh' content='0; URL=index.php?site=admin&db=items' />";
            }
        }
    }
    ?>  
<h3><?php echo text_ausgabe("item_db_hl", 1, $bg['sprache']); ?></h3>
<?php echo text_ausgabe("item_db_feld", 1, $bg['sprache']); ?>

        <div id="hidden"></div>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Nahkampf</a></li>
		<li><a href="#tabs-2">Fernkampf</a></li>
		<li><a href="#tabs-3">Use Items</a></li>
		<li><a href="#tabs-4">Taschen</a></li>
		<li><a href="#tabs-5">Amulette</a></li>
		<li><a href="#tabs-6">Ringe</a></li>
		<li><a href="#tabs-7">Helme</a></li>
		<li><a href="#tabs-8">R&uuml;stungen</a></li>
		<li><a href="#tabs-9">Handschuhe</a></li>
		<li><a href="#tabs-10">Schuhe</a></li>
		<li><a href="#tabs-11">Fahrzeuge</a></li>
		<li><a href="#tabs-12">etc</a></li>
	</ul>
	<div id="tabs-1">
		<?php include("admin/items/add_nahkampf.php"); ?>
	</div>
	<div id="tabs-2">
		<?php include("admin/items/add_fernkampf.php"); ?>
	</div>
	<div id="tabs-3">
		<?php include("admin/items/add_useabel.php"); ?>
	</div>
	<div id="tabs-4">
		<?php include("admin/items/add_taschen.php"); ?>
	</div>
	<div id="tabs-5">
		<?php include("admin/items/add_amu.php"); ?>
	</div>
	<div id="tabs-6">
		<?php include("admin/items/add_ring.php"); ?>
	</div>
	<div id="tabs-7">
		<?php include("admin/items/add_helm.php"); ?>
	</div>
	<div id="tabs-8">
		<?php include("admin/items/add_amor.php"); ?>
	</div>
	<div id="tabs-9">
		<?php include("admin/items/add_gloves.php"); ?>
	</div>
	<div id="tabs-10">
		<?php include("admin/items/add_boots.php"); ?>
	</div>
	<div id="tabs-11">
		<?php include("admin/items/add_fahrzeug.php"); ?>
	</div>
	<div id="tabs-12">
		<?php include("admin/items/add_etc.php"); ?>
	</div>
</div>

<?php       
    } else {
    echo text_ausgabe("item_db_norechte", 1, $bg['sprache']);    
    }
?>

<script>
    var $jq = jQuery.noConflict();
    $jq("#tabs").tabs({
        cookie: {expires: 365}
    }).addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $jq("#tabs li").removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
</script>

<style>
    .ui-tabs-vertical {
        width: 99%;
    }
    .ui-tabs-vertical .ui-tabs-nav {
        padding: 0px;
        float: left;
        width: 120px;
    }
    .ui-tabs-vertical .ui-tabs-* {
        font-family: Verdana;
        font-size: 14px;
        vertical-align:top;
        border-collapse:collapse;
        text-align: left;
        color: #ffffff;
    }
    li {
        clear: left;
        width: 100%;
        border-bottom-width: 1px !important;
        border-right-width: 0 !important;
    }
    .ui-tabs-vertical .ui-tabs-nav li a {
        display:block;
    }
    .ui-tabs-vertical .ui-tabs-panel {
        float: right;
        width: 740px;
    }
</style>