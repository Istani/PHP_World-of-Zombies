<?php 
	// PFADE müssen angepasst werden!
	include("_mysql.php");
	system("C:\\xampp\\mysql\\bin\\mysqldump.exe -u ".$mysql['user']." -p".$mysql['pw']." --no-data -h ".$mysql['host']." ".$mysql['db']." > C:\\xampp\\htdocs\\zod\\TEMP_MYSQL_STRUKTUR.sql", $fp); 
	if ($fp==0) echo "Daten exportiert"; else echo "Es ist ein Fehler aufgetreten"; 
?>

