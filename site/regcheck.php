<?php
include("../_settings.php");
include("../_mysql.php");
    // Hier wird überprüft ob alle Felder ausgefüllt sind
    if (!$_POST['username'] || !$_POST['pw'] || !$_POST['mail']){
        echo "<center>";
        echo "Sie m&uuml;ssen alle Felder ausf&uuml;llen<br />";
        echo "<br />";
        echo "Du wirst in 2 Sekunden weitegeleitet.";
        echo "<br />";
        echo "Sollte dies nicht der fall sein <a href='index.php'>HIER KLICKEN</a>";
        echo '<meta http-equiv="refresh" content="2; URL=index.php">';
        echo "</center>";
        }else{
        
            $pw = $_POST["pw"];
            $pw = md5($pw);

            $sql_query = "INSERT INTO login 
				SET
					loginName='" . $_POST["username"] . "', 
					passwort='".$pw."', 
					email='".$_POST["mail"] ."', 
					registerDate=".time();
            mysql_query($sql_query);

        // Nach erfolreicher Registrierung Weiterleiten zu Index.php
        
        echo "<center>";
        echo $_POST['username'] ." , du hast dich erfolgreich Registriert.";
        echo "<br />";
        echo "Du wirst in 2 Sekunden weitegeleitet.";
        echo "<br />";
        echo "Sollte dies nicht der fall sein <a href='../index.php'>HIER KLICKEN</a>";
        echo '<meta http-equiv="refresh" content="2; URL=../index.php">';
        echo "</center>";

    }
?>