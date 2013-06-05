<?php
	$mysql['host']  =   "127.0.0.1";
	$mysql['user']  =   "root";
	$mysql['pw']    =   "";
	$mysql['db']    =   "zodgame";
	
	mysql_connect($mysql['host'], $mysql['user'], $mysql['pw']) or die ("Es konnte keine Verbindung zum Datenbankserver aufgebaut werden!");
	mysql_select_db($mysql['db']) or die ("Die Datenbank konnte nicht geöffnet werden!");
	
?>
