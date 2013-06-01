<?php include("site/charakter_datenauslesen.php"); ?>
<div id="hidden"></div>

<div id="tabs">
	<ul>
		<li><a href="#tabs-2">Charakter</a></li>
		<li><a href="#tabs-3">Inventar</a></li>
		<li><a href="#tabs-4">F&auml;higkeiten</a></li>
	</ul>
	<div id="tabs-2">
		<?php include("site/charakter_informationen.php"); ?>
		
	</div>
	<div id="tabs-3">
		<?php include("site/charakter_inventar.php"); ?>
	</div>
	<div id="tabs-4">
		<?php include("site/charakter_skills.php"); ?>
	</div>

</div>

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