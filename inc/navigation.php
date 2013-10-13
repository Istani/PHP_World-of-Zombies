<?php
// Navigations Bar
  if (!isset($_SESSION['userID'])) {
    echo '<div class="ui-tabs ui-widget ui-widget-content ui-corner-all">';
    include("site/login.php");
    echo '</div>';
  } else {
    $sql_lastmap="SELECT * FROM `char` WHERE `userID` = '".$_SESSION['userID']."'";
    $result=mysql_query($sql_lastmap);
    $dsatz=mysql_fetch_assoc($result);

    $lastmap=$dsatz['last_map'];
    ?>
    <div class="ui-tabs ui-widget ui-widget-content ui-corner-all">
      <table>
        <tr>
          <td>
            &nbsp;<a href="index.php?map=<?php echo $lastmap; ?>"><?php echo '<img src="picture/navigation/1.png" ALT="'.text_ausgabe("NAVIGATION", 1, $bg['sprache']).'">'; ?></a>&nbsp;
          </td>
          <td>
            &nbsp;<a href="index.php?site=questbook"><?php echo '<img src="picture/navigation/8.png" ALT="'.text_ausgabe("NAVIGATION", 8, $bg['sprache']).'">'; ?></a>&nbsp;
          </td>
          <td>
            &nbsp;<a href="index.php?site=account"><?php echo '<img src="picture/navigation/2.png" ALT="'.text_ausgabe("NAVIGATION", 2, $bg['sprache']).'">'; ?></a>&nbsp;
          </td>
          <td>
            &nbsp;<a href="index.php?site=charakter"><?php echo '<img src="picture/navigation/9.png" ALT="'.text_ausgabe("NAVIGATION", 9, $bg['sprache']).'">'; ?></a>&nbsp;
          </td>
          <td>
            &nbsp;<a href="index.php?site=nachricht"><?php echo '<img src="picture/navigation/3.png" ALT="'.text_ausgabe("NAVIGATION", 3, $bg['sprache']).'">'; ?></a>&nbsp;
          </td>
          <td>
            &nbsp;<a href="index.php?site=guild"><?php echo '<img src="picture/navigation/7.png" ALT="'.text_ausgabe("NAVIGATION", 7, $bg['sprache']).'">'; ?></a>&nbsp;
          </td>
          <td>
            &nbsp;<a href="index.php?site=ladder"><?php echo '<img src="picture/navigation/6.png" ALT="'.text_ausgabe("NAVIGATION", 6, $bg['sprache']).'">'; ?></a>&nbsp;
          </td>
          <td>
            &nbsp;<a href="site/logout.php"><?php echo '<img src="picture/navigation/4.png" ALT="'.text_ausgabe("NAVIGATION", 4, $bg['sprache']).'">'; ?></a>&nbsp;
          </td>
          <?php
          if (isset($_SESSION["userID"])) {
            $sql_admin="SELECT * FROM `login` WHERE `userID` = '".$_SESSION['userID']."'";
            $result_admin=mysql_query($sql_admin);
            $ds_admin=mysql_fetch_assoc($result_admin);
            $rechte=$ds_admin['rechte'];
          } else {
            $rechte=0;
          }

          if ($rechte=="4") {
            include("inc/admin.php");
          }
          ?>
        </tr>
      </table>
    </div>
    <?php
  }
?>