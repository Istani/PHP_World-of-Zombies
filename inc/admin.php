<?php
  if (isset($_SESSION['userID'])) {
    $sql_admin="SELECT * FROM `login` WHERE `userID` = '".$_SESSION['userID']."'";
    $result_admin=mysql_query($sql_admin);
    $ds_admin=mysql_fetch_assoc($result_admin);
    $rechte=$ds_admin['rechte'];

    if ($rechte=="4") {
      ?>
      <td>
        <a href="index.php?site=admin&db=quests"><?php echo text_ausgabe("ADMIN", 1, $bg['sprache']); ?></a>
      </td>
      <td>
        <a href="index.php?site=admin&db=items"><?php echo text_ausgabe("ADMIN", 2, $bg['sprache']); ?></a><br>
      </td>
      <td>
        <a href="index.php?site=admin&db=itemsedit"><?php echo text_ausgabe("ADMIN", 3, $bg['sprache']); ?></a><br>
      </td>
      <td>
        <a href="index.php?site=admin&db=mobs"><?php echo text_ausgabe("ADMIN", 4, $bg['sprache']); ?></a><br>
      </td>
      <td>
        <a href="index.php?site=admin&db=uniqs"><?php echo text_ausgabe("ADMIN", 5, $bg['sprache']); ?></a><br>
      </td>
      <td>
        <a href="index.php?site=admin&db=sets"><?php echo text_ausgabe("ADMIN", 6, $bg['sprache']); ?></a><br>
      </td>
      <td>
        <a href="index.php?site=admin&db=alex">Spielwiese Alex</a><br>
      </td>
      <td>
        <a href="index.php?site=admin&db=sascha">Spielwiese Sascha</a><br>
      </td>
      <?php
    }
  }
?>