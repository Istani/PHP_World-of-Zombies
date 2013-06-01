<h1>- Nachricht -</h1>
<?php
	$sql_nachrichten="SELECT * FROM nachricht_eingang WHERE id='".$_GET['id']."'";
	$query_nachrichten=mysql_query($sql_nachrichten);
	while($row_nachricht=mysql_fetch_assoc($query_nachrichten)) {
		if ($row_nachricht['empfaenger']==$_SESSION['userID']) {
			mysql_query("UPDATE nachricht_eingang SET status=1 WHERE id='".$_GET['id']."'");
		}
		if (($row_nachricht['empfaenger']==$_SESSION['userID']) && ($row_nachricht['sender']>0)) {
			echo '<a href="index.php?site=nachricht_schreiben&id='.$_GET['id'].'">Antworten</a><br><br>';
		}
		echo '<table>';
		echo '<tr>';
		echo '<td>Betreff:</td>';
		echo '<td>'.$row_nachricht['betreff'].'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Von:</td>';
		echo '<td>';
		$sql_sender="SELECT loginName FROM login WHERE userID='".$row_nachricht['sender']."'";
		$query_sender=mysql_query($sql_sender);
		echo mysql_result($query_sender,0,0);
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>An:</td>';
		echo '<td>';
		$sql_sender="SELECT loginName FROM login WHERE userID='".$row_nachricht['empfaenger']."'";
		$query_sender=mysql_query($sql_sender);
		echo mysql_result($query_sender,0,0);
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Am:</td>';
		echo '<td>'. date("d.m.Y / H:i:s",$row_nachricht['zeit']).' Uhr</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Nachricht:</td>';
		echo '<td>'.nl2br($row_nachricht['nachricht']).'</td>';
		echo '</tr>';
		echo '</table>';
		if (($row_nachricht['empfaenger']==$_SESSION['userID']) && ($row_nachricht['sender']>0)) {
			echo '<br><br><a href="../index.php?site=nachricht_schreiben&id='.$_GET['id'].'">Antworten</a>';
		}
	}
?>

