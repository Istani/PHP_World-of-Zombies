<?php
     
    $sql_itemdb = "SELECT * FROM `login` WHERE `userID` = '". $_SESSION['userID'] ."'";
	$result_itemdb = mysql_query($sql_itemdb);
	$ds_itemdb = mysql_fetch_assoc($result_itemdb);
	
    $rechte = $ds_admin['rechte'];
    
    if ($rechte == "4"){ 
?>  

<h3><?php echo text_ausgabe("item_db_hl", 1, $bg['sprache']); ?></h3>
<?php echo text_ausgabe("item_db_feld", 2, $bg['sprache']); ?>

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
    }else{
        echo text_ausgabe("item_db_norechte", 1, $bg['sprache']);    
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
   

   