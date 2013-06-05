<script type="text/javascript" src="src/js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="src/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="src/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="src/js/jquery.cookie.js"></script>
<script type="text/javascript" src="src/js/jquery.dimensions.js"></script>
<script type="text/javascript" src="src/js/jquery.delegate.js"></script>
<script type="text/javascript" src="src/js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="src/js/jquery.tooltip.min.js"></script>
<link href="src/css/smoothness/jquery-ui-1.9.2.custom.css" rel="stylesheet">
<link href="src/css/jquery.dataTables.css" rel="stylesheet">
<link href="src/css/jquery.tooltip.css" rel="stylesheet">


<script type="text/javascript" >
var $jq = jQuery.noConflict();
$jq(function () {
	var icons = {
		header: "ui-icon-folder-collapsed",
		headerSelected: "ui-icon-folder-open"
	};
	$jq('#accordion').accordion({
		collapsible: true,
		icons: icons,
		autoHeight: false,
		active: 0,
	});
}); 
</Script>
	