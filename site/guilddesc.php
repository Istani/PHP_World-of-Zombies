<?php
include("../_settings.php");
include("../_mysql.php");

    if (!$_POST['guild_desc']){
        echo "<center>";
        echo "Sie m&uuml;ssen alle Felder ausf&uuml;llen<br />";
        echo "<br />";
        echo "Du wirst in 2 Sekunden weitegeleitet.";
        echo "<br />";
        echo "Sollte dies nicht der fall sein <a href='index.php'>HIER KLICKEN</a>";
        echo '<meta http-equiv="refresh" content="2; URL=index.php?site=guild">';
        echo "</center>";
        
        }else{
        
        $sql_query = "SELECT `guild_db`.*, `login`.`loginName` FROM `guild_db` LEFT JOIN `login` ON `guild_db`.`guild_master`=`login`.`userID` WHERE `guild_db`.`guild_name` = '" . $_SESSION['guildName'] . "'";
        $result = mysql_query($sql_query);
        $dsatz = mysql_fetch_assoc($result);

        $guildid    =   $dsatz['guild_id']; 
    
    if ($dsatz['guild_desc']){
        
        $sql_query = "UPDATE `guild_db`
				SET
					`guild_desc` = '" . $_POST["guild_desc"] . "'
				WHERE
				     `guild_id` = '$guildid'";
        mysql_query($sql_query);
        
    }else{
        
        $sql_query = "INSERT INTO `guild_db`
				SET
					`guild_desc` = '" . $_POST["guild_desc"] . "'
					WHERE
				     `guild_id` = '$guildid'";
        mysql_query($sql_query);
        }
            
        echo "<center>";
        echo "Du wirst in 2 Sekunden weitegeleitet.";
        echo "<br />";
        echo "Sollte dies nicht der fall sein <a href='index.php'>HIER KLICKEN</a>";
        echo '<meta http-equiv="refresh" content="2; URL=../index.php?site=guild">';
        echo "</center>";
        
        }
?>