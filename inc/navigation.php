<?php
	if (!isset($_SESSION['userID'])) {
		echo '<div class="ui-tabs ui-widget ui-widget-content ui-corner-all">';
		include("site/login.php");
		echo '</div>';
	} else {
	
	$sql_lastmap = "SELECT * FROM `char` WHERE `userID` = '". $_SESSION['userID'] ."'";
	$result = mysql_query($sql_lastmap);
	$dsatz = mysql_fetch_assoc($result);		
	
	$lastmap = $dsatz['last_map'];
?>
	<div class="ui-tabs ui-widget ui-widget-content ui-corner-all">
	<h3><?php echo text_ausgabe("NAVIGATION", 0, $bg['sprache']); ?></h3>
	<a href="index.php?map=<?php echo $lastmap; ?>"><?php echo text_ausgabe("NAVIGATION", 1, $bg['sprache']); ?></a><br>
	<a href="index.php?site=inventory"><?php echo text_ausgabe("NAVIGATION", 2, $bg['sprache']); ?></a><br>
	<a href="index.php?site=skills"><?php echo text_ausgabe("NAVIGATION", 9, $bg['sprache']); ?></a><br>
    <a href="index.php?site=ladder"><?php echo text_ausgabe("NAVIGATION", 6, $bg['sprache']); ?></a><br>		
	<a href="index.php?site=nachricht"><?php echo text_ausgabe("NAVIGATION", 3, $bg['sprache']); ?></a><br>
    <a href="index.php?site=guild"><?php echo text_ausgabe("NAVIGATION", 7, $bg['sprache']); ?></a><br>	
	<a href="site/logout.php"><?php echo text_ausgabe("NAVIGATION", 4, $bg['sprache']); ?></a><br>
    </div>
<?php
	
	}
	echo '<br><div class="ui-tabs ui-widget ui-widget-content ui-corner-all">';
	echo '<h3>DEBUG-Box</h3>';
	echo '<pre>';
	echo var_dump($_SESSION);
	//echo var_dump(inventory_add($_SESSION["userID"], 3, 200));
    echo '<h3>ItemListe</h3>';
	$sql_item="SELECT * FROM item_db ORDER BY itemID";
    $query_item=mysql_query($sql_item);
    while ($row_item=mysql_fetch_assoc($query_item)) {
        echo item_bilder($row_item['itemID'], "show", $row_item['stack']);
        echo "&nbsp;".$row_item['itemID']."&nbsp;".text_ausgabe("item", $row_item['itemID'], $bg['sprache']).'<br>';
    }
    echo '</pre>';
	echo '</div>';
?>
