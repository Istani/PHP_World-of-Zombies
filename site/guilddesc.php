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
        echo '<meta http-equiv="refresh" content="2; URL=../index.php?site=guild">';
        echo "</center>";
        
        }else{
        
        $sql_query = "UPDATE INTO `guild_db`
				SET
					`guild_desc` = '" . $_POST["guild_desc"];
        mysql_query($sql_query);
            
        echo "<center>";
        echo "Du wirst in 2 Sekunden weitegeleitet.";
        echo "<br />";
        echo "Sollte dies nicht der fall sein <a href='index.php'>HIER KLICKEN</a>";
        echo '<meta http-equiv="refresh" content="2; URL=../index.php?site=guild">';
        echo "</center>";
        
        }
?>