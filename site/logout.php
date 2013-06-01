<?php
include("../_settings.php");
include("../_mysql.php");

    setcookie("loginName", "" , time()+60*60*24*30, "/");
    setcookie("passwort", "" , time()+60*60*24*30, "/");
    foreach ($_SESSION as $text => $key) {
        unset($_SESSION[$text]);
        unset($_SESSION[$key]);
    }
    echo  "<center>"
        . "Sie haben sich erfolgreich angemeldet <br />"
        . "Bitten warten sie einen Moment. Sie werden automatisch weitergeleitet.<br />"
        . "Falls dies nicht der Fall sein sollte klicken sie bitte <a href='../index.php'>hier</a>"
        . "<meta http-equiv='refresh' content='1; URL=../index.php' />"
        . "</center>";
?>