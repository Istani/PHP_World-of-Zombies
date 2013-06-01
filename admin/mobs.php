<?php


    $sql_rechte = "SELECT * FROM `login` WHERE `userID` = '". $_SESSION['userID'] ."'";
	$result_rechte = mysql_query($sql_rechte);
	$ds_rechte = mysql_fetch_assoc($result_rechte);

    $rechte = $ds_admin['rechte'];

    if ($rechte == "4"){

        if (isset($_POST['add'])){

        $sql_checkmob = "SELECT * FROM `mob_db` WHERE `mobID` = '". $_POST['itemID'] ."'";
	    $result_checkmob = mysql_query($sql_checkmob);
	    $ds_checkmob = mysql_fetch_assoc($result_checkmob);
	    $ID = $ds_checkmob['mob_id'];
            if (isset($ID)){
                echo text_ausgabe("item_db_error", 2, $bg['sprache']);
            }else{
    //Item wird in die Itemdb aufgenommen
    $sql_addmobdb = "INSERT INTO `mob_db` SET
                        `mob_art`       =     '" .$_POST["mob_art"]. "',
                        `mob_name`      =     '" .$_POST["mob_name"]. "',
                        `min_schaden`   =     '" .$_POST["min_schaden"]. "',
                        `max_schaden`   =     '" .$_POST["max_schaden"]. "',
                        `mob_leben`     =     '" .$_POST['mob_leben']. "',
                        `mob_lvl`       =     '" .$_POST['mob_lvl']. "',
                        `mob_exp`       =     '" .$_POST['mob_exp']. "',
                        `mob_drop`      =     '" .$_POST['mob_drop']. "'";
                mysql_query($sql_addmobdb);
                
                $lastID = mysql_insert_id();
                
    // Item Name wird in Texte eingefügt
    $sql_addmobname = "INSERT INTO `texte` SET
                        `kurz`    =     'mobname',
                        `id`      =     '" .$lastID. "',
                        `deutsch` =     '" .$_POST["mob_name"]. "'";
                mysql_query($sql_addmobname);
    // Item Text wird in Texte eingefügt
    $sql_addmobtext = "INSERT INTO `texte` SET
                        `kurz`    =     'mob_text',
                        `id`      =     '" .$lastID. "',
                        `deutsch` =     '" .$_POST["text"]. "'";
                mysql_query($sql_addmobtext);

    echo "<meta http-equiv='refresh' content='0; URL=index.php?site=admin&db=mobs' />";
        }
    }

?>

<h3><?php echo text_ausgabe("mob_db_hl", 1, $bg['sprache']); ?></h3>
<?php echo text_ausgabe("mob_db_feld", 1, $bg['sprache']); ?>

<div id="hidden"></div>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Normale</a></li>
		<li><a href="#tabs-2">Miniboss</a></li>
		<li><a href="#tabs-3">Boss Monster</a></li>
	</ul>
	<div id="tabs-1">
		<?php include("admin/mobs/add_mob_norm.php"); ?>
	</div>
	<div id="tabs-2">
		<?php include("admin/mobs/add_mob_mboss.php"); ?>
	</div>
	<div id="tabs-3">
		<?php include("admin/mobs/add_mob_boss.php"); ?>
	</div>
	
</div>

<?php
        }else{
        echo text_ausgabe("mob_db_norechte", 1, $bg['sprache']);
}
?>

<script>
	var $jq = jQuery.noConflict();
	$jq("#tabs").tabs({
					cookie: {
						expires: 365
					}
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


