<?php	
include("../_settings.php");
include("../_mysql.php");
	if ($_GET['modus']=="delete") {
		//echo "DELETE FROM nachricht_eingang WHERE id=".$_GET['id'];
		mysql_query("DELETE FROM nachricht_eingang WHERE id=".$_GET['id']." AND empfaenger=".$_SESSION['userID']);
		mysql_query("DELETE FROM nachricht_ausgang WHERE id=".$_GET['id']." AND sender=".$_SESSION['userID']);
		echo 'Nachricht wurde gelöscht!<br>';
		echo "Du wirst in 2 Sekunden weitegeleitet.";
        echo "<br />";
        echo "Sollte dies nicht der fall sein <a href='../index.php?site=nachricht'>HIER KLICKEN</a>";
        echo '<meta http-equiv="refresh" content="2; URL=../index.php?site=nachricht">';
        echo "</center>";
	} else {
		$sql_sender="SELECT userID FROM login WHERE loginName='".$_POST['empf']."'";
		$query_sender=mysql_query($sql_sender);
		$_POST['empf']=mysql_result($query_sender,0,0);
		if ($_POST['empf']>0) {
			$sqlausgabe="INSERT INTO nachricht_eingang SET 
				sender=".$_SESSION['userID'].",
				empfaenger=".$_POST['empf'].",
				zeit=".time().",
				`status`=0,
				betreff='".$_POST['betreff']."',
				nachricht='".$_POST['nachricht']."'
			";
			mysql_query($sqlausgabe);
			$sqlausgabe1="INSERT INTO nachricht_ausgang SET 
				sender=".$_SESSION['userID'].",
				empfaenger=".$_POST['empf'].",
				zeit=".time().",
				`status`=0,
				betreff='".$_POST['betreff']."',
				nachricht='".$_POST['nachricht']."'
			";
			mysql_query($sqlausgabe1);
			echo 'Nachricht wurde versendet!<br>';
			echo "Du wirst in 2 Sekunden weitegeleitet.";
			echo "<br />";
			echo "Sollte dies nicht der fall sein <a href='../index.php?site=nachricht'>HIER KLICKEN</a>";
			echo '<meta http-equiv="refresh" content="2; URL=../index.php?site=nachricht">';
			echo "</center>";
		} else {
			echo 'Nachricht konte nicht verschickt werden. empfaenger unbekannt!<br>';
			echo "Du wirst in 5 Sekunden weitegeleitet.";
			echo "<br />";
			echo "Sollte dies nicht der fall sein <a href='../index.php?site=nachricht'>HIER KLICKEN</a>";
			echo '<meta http-equiv="refresh" content="5; URL=../index.php?site=nachricht">';
			echo "</center>";
		}
	}
?>