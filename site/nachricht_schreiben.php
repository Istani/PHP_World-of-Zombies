<?php
	if (!isset($_GET['id'])) {
		$_GET['id']=0;
	}
	
	$sql['nachricht']="show fields from nachricht_eingang";
	$query['nachricht']=mysql_query($sql['nachricht']);
	while ($row['nachricht']=mysql_fetch_assoc($query['nachricht'])) {
		$row_nachricht[$row['nachricht']['Field']]="";
	}
	
	$sql['nachricht']="SELECT * FROM nachricht_eingang WHERE id=".$_GET['id'];
	$query['nachricht']=mysql_query($sql['nachricht']);
	while ($row['nachricht']=mysql_fetch_assoc($query['nachricht'])) {
		$row_nachricht=$row['nachricht'];
	}
	
	if ($row_nachricht['sender']!="") {
		$sql_sender="SELECT loginName FROM login WHERE userID='".$row_nachricht['sender']."'";
		$query_sender=mysql_query($sql_sender);
		$row_nachricht['sender']=mysql_result($query_sender,0,0);
		
		if ($row_nachricht['nachricht']!=""){
			$row_nachricht['nachricht']="\n---Alte Nachricht---\n".$row_nachricht['nachricht'];
		}
	}
?>
<div id="schwarz">
<form action="site/nachrichtcheck.php?modus=schreiben" method="post">
<h1>- Nachricht -</h1>
<table>
	<tr>
		<td>An:</td>
		<td><input type="text" name="empf" value="<?php echo $row_nachricht['sender']; ?>"></td>
	</tr>
	<tr>
		<td>Betreff:</td>
		<td><input type="text" name="betreff" value="<?php echo $row_nachricht['betreff']; ?>"></td>
	</tr>
	<tr>
		<td>Nachricht:</td>
		<td><textarea name="nachricht" cols="50" rows="20"><?php echo "\n\n\n".$row_nachricht['nachricht']; ?></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="senden" value="Nachricht absenden"></td>
	</tr>
</table>
</form>
</div>