<?php
	if (!isset($_SESSION['userID'])) {
		echo '<div class="ui-tabs ui-widget ui-widget-content ui-corner-all">';
		include("site/login.php");
		echo '</div>';
		
	} else {

	$sql_admin = "SELECT * FROM `login` WHERE `userID` = '". $_SESSION['userID'] ."'";
	$result_admin = mysql_query($sql_admin);
	$ds_admin = mysql_fetch_assoc($result_admin);
	$rechte = $ds_admin['rechte'];

        if ($rechte == "4"){ 
    
        ?>
	   <div class="ui-tabs ui-widget ui-widget-content ui-corner-all">
	   <h3><?php echo text_ausgabe("ADMIN", 0, $bg['sprache']); ?></h3>
       <a href="index.php?site=admin&db=quests"><?php echo text_ausgabe("ADMIN", 1, $bg['sprache']); ?></a><br>
	   <a href="index.php?site=admin&db=items"><?php echo text_ausgabe("ADMIN", 2, $bg['sprache']); ?></a><br>
	   <a href="index.php?site=admin&db=itemsedit"><?php echo text_ausgabe("ADMIN", 3, $bg['sprache']); ?></a><br>
       <a href="index.php?site=admin&db=mobs"><?php echo text_ausgabe("ADMIN", 4, $bg['sprache']); ?></a><br>
       <a href="index.php?site=admin&db=uniqs"><?php echo text_ausgabe("ADMIN", 5, $bg['sprache']); ?></a><br>
       <a href="index.php?site=admin&db=sets"><?php echo text_ausgabe("ADMIN", 6, $bg['sprache']); ?></a><br>
       <br>
       <a href="index.php?site=admin&db=alex">Spielwiese Alex</a><br>
       <a href="index.php?site=admin&db=sascha">Spielwiese Sascha</a><br>
       </div>
    
<?php

	   }
    }
?>