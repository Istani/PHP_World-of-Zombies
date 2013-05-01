<?php
	$mysql['host']  =   "localhost";
	$mysql['user']  =   "db11106940-bg";
	$mysql['pw']    =   "zodwa1000";
	$mysql['db']    =   "db11106940-game";
	
	mysql_connect($mysql['host'], $mysql['user'], $mysql['pw']) or die ("Es konnte keine Verbindung zum Datenbankserver aufgebaut werden!");
	mysql_select_db($mysql['db']) or die ("Die Datenbank konnte nicht geöffnet werden!");
	
?>