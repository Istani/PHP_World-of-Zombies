<?php
	include("_settings.php");
	include("_mysql.php");
	include("_functions.php");
	include("site/cookiecheck.php");
    if (isset($_SESSION['userID'])) {
        $get_lastaktion="SELECT lastAktion FROM login WHERE userID=".$_SESSION['userID'];
        $query_lastaction=mysql_query($get_lastaktion);
        $lastaktion=mysql_result($query_lastaction,0,0);
        if ($lastaktion>=time()-300) {
            $differenz=time()-$lastaktion;
            $update_onlinetime="UPDATE login SET onlineTimer=onlineTimer+".$differenz." WHERE userID=".$_SESSION['userID'];
            mysql_query($update_onlinetime);
        }
        $set_lastaktion="UPDATE login SET lastAktion=".time()." WHERE userID=".$_SESSION['userID'];
        mysql_query($set_lastaktion);
    }
	/*
	$string='a:3:{s:5:"quest";i:2;s:3:"exp";i:10;s:11:"goldklumpen";i:5;}';
	$bla=unserialize($string);
	$bla["get_item"]=true;
	$bla["item"][1]['id']=1000;
	$bla["item"][1]['menge']=5;
	$bla["item"][1]['quality']=1000;
	$bla["item"][1]['level']=1000;
	$bla["quest"]=3;
	echo '<pre>';
	var_dump($bla);
	echo '</pre>';
	$string=serialize($bla);
	echo $string;
	*/
?>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Browser Game" />
		<meta name="author" content="zod-clan.de" />
		<meta name="keywords" content="Browsergame, bg, game, spiel, frei, kostenlos, zod, zod-clan.de, clan, Ikarus, Online" />
		<meta name="copyright" content="Copyright &copy; 2013 by <?php echo $bg["author"]; ?>" />
		<meta name="generator" content="<?php echo $bg["author"]; ?>" />
		<title><?php echo $bg['title']; ?></title>
		<link href="_stylesheet.css" rel="stylesheet" type="text/css" />
		<?php include("_javascript.php"); ?>
	</head>
	<body>
		<table class="page">
			<tr>
				<td colspan="2">
					<?php include("inc/header.php"); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="leiste">
						<?php include("inc/bar.php"); ?>
				</td>
			</tr>
			<tr>
				<td width="200">
					
						<?php include("inc/navigation.php"); ?>
				</td>
				<td>
					<div class="ui-tabs ui-widget ui-widget-content ui-corner-all">
						<?php include("inc/content.php"); ?>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="ui-tabs ui-widget ui-widget-content ui-corner-all">
						<?php include("inc/footer.php"); ?>
					</div>
				</td>
			</tr>
		</table>
	</body>  
</html>
