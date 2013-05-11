<?php
	$queryString = strstr($_SERVER['REQUEST_URI'], '?');
    $queryString = ($queryString===false) ? '' : substr($queryString,1);
	
?>

<h1><?php echo text_ausgabe("NAVIGATION", 8, $bg['sprache']); ?></h1>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Offene Quests</a></li>
		<li><a href="#tabs-2">Abgeschlossene Storyquests</a></li>
		<li><a href="#tabs-3">Abgeschlossene Nebenquests</a></li>
	</ul>
<?php
	$sql_quest="SELECT quest_db.quest_isStory, char_quest.* FROM (char_quest INNER JOIN quest_db ON char_quest.cquest_questID=quest_id) WHERE cquest_userID=".$_SESSION['userID'];
?>
	<div id="tabs-1">
		<h2>Story</h2>
		<?php
			$sql_story_offen=$sql_quest." AND cquest_erledigt=0 AND quest_isStory=1";
			$query_quest=mysql_query($sql_story_offen);
			if (mysql_num_rows($query_quest)>0) {
				while ($row_quest=mysql_fetch_assoc($query_quest)) {
					echo '<a href="index.php?'.$queryString.'&quest='.$row_quest['cquest_questID'].'">'.text_ausgabe("quest", $row_quest['cquest_questID'], $bg['sprache']).'</a><br>';
				}
			} else {
				echo '<i>Keine</i><br><br>';
			}
		?>
		<h2>Nebenquests</h2>
		<?php
			$sql_story_offen=$sql_quest." AND cquest_erledigt=0 AND quest_isStory=0";
			$query_quest=mysql_query($sql_story_offen);
			if (mysql_num_rows($query_quest)>0) {
				while ($row_quest=mysql_fetch_assoc($query_quest)) {
					echo '<a href="index.php?'.$queryString.'&quest='.$row_quest['cquest_questID'].'">'.text_ausgabe("quest", $row_quest['cquest_questID'], $bg['sprache']).'</a><br>';
				}
			} else {
				echo '<i>Keine</i><br><br>';
			}
		?>
	</div>
	<div id="tabs-2">
		<h2>Quests</h2>
		<?php
			$sql_story_offen=$sql_quest." AND cquest_erledigt=1 AND quest_isStory=1";
			$query_quest=mysql_query($sql_story_offen);
			if (mysql_num_rows($query_quest)>0) {
				while ($row_quest=mysql_fetch_assoc($query_quest)) {
					echo '<a href="index.php?'.$queryString.'&quest='.$row_quest['cquest_questID'].'">'.text_ausgabe("quest", $row_quest['cquest_questID'], $bg['sprache']).'</a><br>';
				}
			} else {
				echo '<i>Keine</i><br><br>';
			}
		?>
	</div>
	<div id="tabs-3">
		<h2>Quests</h2>
		<?php
			$sql_story_offen=$sql_quest." AND cquest_erledigt=1 AND quest_isStory=0";
			$query_quest=mysql_query($sql_story_offen);
			if (mysql_num_rows($query_quest)>0) {
				while ($row_quest=mysql_fetch_assoc($query_quest)) {
					echo '<a href="index.php?'.$queryString.'&quest='.$row_quest['cquest_questID'].'">'.text_ausgabe("quest", $row_quest['cquest_questID'], $bg['sprache']).'</a><br>';
				}
			} else {
				echo '<i>Keine</i><br><br>';
			}
		?>
	</div>
 <script>
	var $jq = jQuery.noConflict();
	$jq("#tabs").tabs();
</script>