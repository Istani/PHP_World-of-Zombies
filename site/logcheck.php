<?php
include("../_settings.php");
include("../_mysql.php");

    if (!$_POST['username'] || !$_POST['pw']){

        echo "<center>"
            . "Sie m&uuml;ssen alle Felder ausf&uuml;llen<br />"
            . "Bitten warten sie einen Moment. Sie werden automatisch weitergeleitet.<br />"
            . "Falls dies nicht der Fall seinen sollte.<br />"
            . "<a href='../index.php?site=login'>Zur&uuml;ck</a>"
            . "<meta http-equiv='refresh' content='3; URL=../index.php' />"
            . "</center>";

    }else{

        $pw = $_POST["pw"];
        $pw = md5($pw);

        //?berpr?fung der Anmelde daten SELECT
        $sql_query = "SELECT * FROM login WHERE `loginName` = '" . $_POST['username'] . "' and `passwort` = '$pw'";
        $result = mysql_query($sql_query);
        $dsatz = mysql_fetch_assoc($result);

        // setzten der Session
        if(isset($dsatz["loginName"])){

        // Mysqldb Update der logins
        $sql_query = "UPDATE login SET lastLogin = ".time()." WHERE loginName = '" . $_POST['username'] . "' and passwort = '$pw'";
        mysql_query($sql_query);
               
        $_SESSION["loginName"] = $dsatz["loginName"];
        $_SESSION["userID"] = $dsatz["userID"];
        
        $sql_query1 = "SELECT * FROM `char` WHERE `userID` = '" . $dsatz['userID'] . "'";
        $result1 = mysql_query($sql_query1);
        $dsatz1 = mysql_fetch_assoc($result1);
        
        $_SESSION["guildName"] = $dsatz1["gilde"];
        $_SESSION["lvl"] = $dsatz1["level"];
        
		setcookie("loginName", $_POST['username'] , time()+60*60*24*30, "/");
		setcookie("passwort", $pw , time()+60*60*24*30, "/");
                
        echo  "<center>"
            . $_SESSION["loginName"] . ", sie haben sich erfolgreich angemeldet <br />"
            . "Bitten warten sie einen Moment. Sie werden automatisch weitergeleitet.<br />"
            . "Falls dies nicht der Fall sein sollte klicken sie bitte <a href='../index.php'>hier</a>"
            . "<meta http-equiv='refresh' content='3; URL=../index.php' />"
            . "</center>";
        }else{
        echo  "<center>" 
            . "Falscher Benutzername oder Falsches Passwort. <br />"
            . "<a href='../index.php'>Hier Klicken</a>"
            . "</center>";
        }
    }
?>