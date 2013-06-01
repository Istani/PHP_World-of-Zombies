<?php
include("../_settings.php");
include("../_mysql.php");
    
    // Hier wird überprüft ob alle Felder ausgefüllt sind
    if (!$_POST['guildname'] || !$_POST['kurz']){
        echo "<center>";
        echo "Sie m&uuml;ssen alle Felder ausf&uuml;llen<br />";
        echo "<br />";
        echo "Du wirst in 2 Sekunden weitegeleitet.";
        echo "<br />";
        echo "Sollte dies nicht der fall sein <a href='../index.php?site=guild'>HIER KLICKEN</a>";
        echo '<meta http-equiv="refresh" content="2; URL=../index.php?site=guild">';
        echo "</center>";
        }else{

            $sql_query = "INSERT INTO `guild_db` 
				SET
					`guild_name`     =   '" . $_POST["guildname"] . "', 
					`guild_kurz`     =   '" . $_POST['kurz'] . "',
					`guild_master`   =   '" . $_SESSION['userID'] . "'
                    ";
            mysql_query($sql_query);
            
            $sql_query1 = "SELECT * FROM `guild_db` WHERE `guild_name` = '" . $_POST["guildname"] . "'";
            $result1 = mysql_query($sql_query1);
            $dsatz1 = mysql_fetch_assoc($result1);

            $gID = $dsatz1['guild_id'];
            
            $sql_query2 = "INSERT INTO `guild_ranking`
				SET
					`guild_id`   =   '$gID',
					`title`      =   '3',
					`userID`     =   '" . $_SESSION['userID'] . "'
                     ";
            mysql_query($sql_query2);

            $sql_query1 = "UPDATE `char`
				SET
					gilde='" . $_POST["guildname"] . "'
                WHERE
                    userID='" . $_SESSION['userID'] . "'    
                    ";
            mysql_query($sql_query1);
            
            $_SESSION['guildName'] = $_POST['guildname'];

        // Nach erfolreicher Registrierung Weiterleiten zu Index.php
        
        echo "<center>";
        echo $_SESSION['loginName'] ." , du hast deine Gilde erfolgreich Registriert.";
        echo "<br />";
        echo "Du wirst in 2 Sekunden weitegeleitet.";
        echo "<br />";
        echo "Sollte dies nicht der fall sein <a href='../index.php?site=guild'>HIER KLICKEN</a>";
        echo '<meta http-equiv="refresh" content="2; URL=../index.php?site=guild">';
        echo "</center>";

    }
?>