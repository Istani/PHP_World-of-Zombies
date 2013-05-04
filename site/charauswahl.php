<?php
        if (isset($_POST['class_1'])){$sql_differenz="`klasse`='1',";}
        if (isset($_POST['class_2'])){$sql_differenz="`klasse`='2',";}
        if (isset($_POST['class_3'])){$sql_differenz="`klasse`='3',";}
        if (isset($sql_differenz)) {
                $sql_query = "INSERT INTO `char` SET 
                        `userID`        ='" . $_SESSION["userID"] . "',  
                        ".$sql_differenz."
                        `rucksack`      ='2'";
                mysql_query($sql_query);
                //setzten der Session
                $sql_query = "SELECT * FROM `char` WHERE `userID` = '" . $_SESSION['userID'] . "'";
                $result = mysql_query($sql_query);
                $dsatz = mysql_fetch_assoc($result);
                if(isset($dsatz["klasse"])){
                        $_SESSION["class"] = $dsatz["klasse"];
                }
                inventory_add($_SESSION['userID'], 5, 10);
                inventory_add($_SESSION['userID'], 6, 10);
                // Skills Klassenspezifisch erlernen

                // Quest 1 Abschließen & Quest 2 anzeigen
                // Weil Quest 1 Quest 2 freigibt
		erledige_quest(1, $_SESSION['userID']);
                
                echo "<center>";
                echo $_SESSION['loginName'] ." , du hast ein Charakter erfolgreich gespeichert.";
                echo "<br />";
                echo "Du wirst in 2 Sekunden weitegeleitet.";
                echo "<br />";
                echo "Sollte dies nicht der fall sein <a href='index.php'>HIER KLICKEN</a>";
                echo '<meta http-equiv="refresh" content="2; URL=index.php">';
                echo "</center>";
                die();
        }
	$sql_check="SELECT * FROM char_quest WHERE cquest_questID=1 AND cquest_userID=".$_SESSION['userID'];
        $query_check=mysql_query($sql_check);
        if (mysql_num_rows($query_check)==0) {
        	$sql_quest_add="INSERT INTO char_quest SET cquest_userID=".$_SESSION['userID'].", cquest_questID=1, cquest_gelesen=1";
		@mysql_query($sql_quest_add);        
        }
?>


<!-- Registration -->
    <form method="post">
    <table border="0">
        <tr>
            <td colspan="3" align="center"><h3><?php echo text_ausgabe("quest", 1, $bg['sprache']); ?></h3></td>
        </tr>
	<tr><td><br /></td></tr>
	<tr>
            <td colspan="3" align="center"><?php echo text_ausgabe("quest_text", 1, $bg['sprache']); ?></td>
        </tr>
	<tr><td><br /></td></tr>
        <tr>
            <td align="center"><?php echo text_ausgabe("char_klasse", 0, $bg['sprache']); ?>&nbsp;<b><?php echo text_ausgabe("char_klasse", 1, $bg['sprache']); ?></b><br><br></td>
            <td align="center"><?php echo text_ausgabe("char_klasse", 0, $bg['sprache']); ?>&nbsp;<b><?php echo text_ausgabe("char_klasse", 2, $bg['sprache']); ?></b><br><br></td>
            <td align="center"><?php echo text_ausgabe("char_klasse", 0, $bg['sprache']); ?>&nbsp;<b><?php echo text_ausgabe("char_klasse", 3, $bg['sprache']); ?></b><br><br></td>
        </tr>
        <tr>
            <td align="center"><br><?php echo text_ausgabe("char_klasse_text", 1, $bg['sprache']); ?></td>
            <td align="center"><br><?php echo text_ausgabe("char_klasse_text", 2, $bg['sprache']); ?></td>
            <td align="center"><br><?php echo text_ausgabe("char_klasse_text", 3, $bg['sprache']); ?></td>
        </tr>
	<tr>
            <td align="center"><input type="submit" name="class_1" value="Klasse_1"/></td>
            <td align="center"><input type="submit" name="class_2" value="Klasse_2"/></td>
            <td align="center"><input type="submit" name="class_3" value="Klasse_3"/></td>
        </tr>
    </table>
    </form>
