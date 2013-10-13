<!-- Registration -->
<div id="login">
  <form action="site/logcheck.php" method="post">
    <table>
      <tr>
        <td>
          <?php echo text_ausgabe("Username", 0, $bg['sprache']); ?>:
        </td>
        <td>
          <input placeholder="Username" maxlength="20" size="25" name="username" type="text" />
        </td>
        <td>
          <?php echo text_ausgabe("passwort", 0, $bg['sprache']); ?>:
        </td>
        <td>
          <input placeholder="********" maxlength="20" size="25" name="pw" type="password" />
        </td>
        <td>
          <input type="image" src="../picture/btn_login.png" onsubmit="submit - form()"/>
        </td>
        <td>
          <?php echo text_ausgabe("login", 2, $bg['sprache']); ?>
          <a href="index.php?site=register"><?php echo text_ausgabe("login", 3, $bg['sprache']); ?></a>
        </td>
      </tr>
    </table>
  </form>
</div>