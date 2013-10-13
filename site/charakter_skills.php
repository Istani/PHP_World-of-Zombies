<?php
  echo '<h1>F&auml;higkeiten</h1><hr /><br>';
  echo '<table width="100%" border="1">';

// SQL Alle Skills
  $sql_skills="SELECT `skill_db`.*, `char_skill`.`lvl` FROM `skill_db` INNER JOIN `char_skill` ON `skill_db`.`skill_ID`=`char_skill`.`skillID` WHERE userID=".$_SESSION['userID']." ORDER BY `reihenfolge`, `erlernbar` DESC, `maxlvl` DESC";
  $query_skills=mysql_query($sql_skills);
  while ($row_skills=mysql_fetch_assoc($query_skills)) {
    echo '<tr>';
    echo '<td width="100%">';
    echo skill_bilder($row_skills['skill_ID']);
    echo text_ausgabe("skill", $row_skills['skill_ID'], $bg['sprache']);
    echo '</td>';
    echo '<td>';
    echo $row_skills['lvl'].'/'.$row_skills['maxlvl'];
    echo '</td>';
    echo '<td>';
    if ($row_skills['erlernbar']==1) {
      echo text_ausgabe("erlernbar", 0, $bg['sprache']);
    } else {
      echo text_ausgabe("erlernbar", 1, $bg['sprache']);
    }
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="3">';
    echo text_ausgabe("skill_beschreibung", $row_skills['skill_ID'], $bg['sprache']);
    echo '</td>';
    echo '</tr>';
  }
  echo '</table>';
?>