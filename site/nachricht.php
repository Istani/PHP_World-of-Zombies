<h1>- Nachrichten -</h1>
<?php echo '<br><a href="index.php?site=nachricht_schreiben">Neue Nachricht schreiben</a>'; ?>
<h2>Inbox:</h2>
<table width="100%" border="1">
	<THEAD>
		<tr>
			<th>Am:</th>
			<th>Von:</th>
			<th>Betreff:</th>
			<th>Aktion:</th>
		</tr>
	</thead>
	<tbody>
<?php
	$sql_nachrichten="SELECT * FROM nachricht_eingang WHERE empfaenger='".$_SESSION['userID']."' ORDER BY `status`, zeit DESC";
	$query_nachrichten=mysql_query($sql_nachrichten);
	while($row_nachricht=mysql_fetch_assoc($query_nachrichten)) {
		if ($row_nachricht['status']==0) {
			echo '<tr class="neue_nachricht">';
		} else {
			echo '<tr>';
		}
		echo '<td>'.date("d.m.Y",$row_nachricht['zeit']).'&nbsp;'.date("H:i:s",$row_nachricht['zeit']).'</td>';
		echo '<td>';
		if($row_nachricht['sender']==0) {
			echo "SYSTEM";
		} else {
			$sql_sender="SELECT loginName FROM login WHERE userID='".$row_nachricht['sender']."'";
			$query_sender=mysql_query($sql_sender);
			echo mysql_result($query_sender,0,0);
		}
		echo '</td>';
		echo '<td width="100%">'.$row_nachricht['betreff'].'</td>';
		echo '<td><a href="index.php?site=nachricht_lesen&id='.$row_nachricht['id'].'">LESEN</a>&nbsp;|&nbsp;<a href="site/nachrichtcheck.php?modus=delete&id='.$row_nachricht['id'].'">LÖSCHEN</a></td>';
		echo '</tr>';
	}
?>
	</tbody>
</table>
<br><br>
<h2>Outbox:</h2>
<table width="100%" border="1">
	<THEAD>
		<tr>
			<th>Am:</th>
			<th>An:</th>
			<th>Betreff:</th>
			<th>Aktion:</th>
		</tr>
	</thead>
	<tbody>
<?php
	$sql_nachrichten="SELECT * FROM nachricht_ausgang WHERE sender='".$_SESSION['userID']."' ORDER BY zeit DESC";
	$query_nachrichten=mysql_query($sql_nachrichten);
	while($row_nachricht=mysql_fetch_assoc($query_nachrichten)) {
		if ($row_nachricht['status']==0) {
			echo '<tr class="neue_nachricht">';
		} else {
			echo '<tr>';
		}
		echo '<td>'.date("d.m.Y",$row_nachricht['zeit']).'&nbsp;'.date("H:i:s",$row_nachricht['zeit']).'</td>';
		echo '<td>';
		if($row_nachricht['empfaenger']==0) {
			echo "SYSTEM";
		} else {
			$sql_sender="SELECT loginName FROM login WHERE userID='".$row_nachricht['empfaenger']."'";
			$query_sender=mysql_query($sql_sender);
			echo mysql_result($query_sender,0,0);
		}
		echo '</td>';
		echo '<td width="100%">'.$row_nachricht['betreff'].'</td>';
		echo '<td><a href="index.php?site=nachricht_anzeige&id='.$row_nachricht['id'].'">ANSEHEN</a>&nbsp;|&nbsp;<a href="site/nachrichtcheck.php?modus=delete&id='.$row_nachricht['id'].'">LÖSCHEN</a></td>';
		echo '</tr>';
	}
?>
	</tbody>
</table>