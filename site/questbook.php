<h1><?php echo text_ausgabe("NAVIGATION", 8, $bg['sprache']); ?></h1>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Offene Quests</a></li>
		<li><a href="#tabs-2">Abgeschlossene Storyquests</a></li>
		<li><a href="#tabs-3">Abgeschlossene Nebenquests</a></li>
	</ul>
<?php
	$sql_quest="SELECT quest_db.quest_isStory, char_quest.* FROM (char_quest INNER JOIN quest_db ON char_quest.cquest_questID=quest_id) ";
?>
	<div id="tabs-1">
		<h2>Story</h2>
		<?php
			$sql_story_offen=$sql_quest." WHERE cquest_erledigt=0 AND quest_isStory=1";
			
		?>
		<h2>Nebenquests</h2>
		
	</div>
	<div id="tabs-2">
		<h2>Quests</h2>
		
	</div>
	<div id="tabs-3">
		<h2>Quests</h2>
		
	</div>