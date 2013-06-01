<!-- Registration -->
<div id="login">
    <form action="site/logcheck.php" method="post">
    <h3><?php echo text_ausgabe("login", 0, $bg['sprache']); ?></h3>
	<p><?php echo text_ausgabe("login", 1, $bg['sprache']); ?></p>
	<p><?php echo text_ausgabe("Username", 0, $bg['sprache']); ?>:<br>
	<input placeholder="Username" maxlength="20" size="25" name="username" type="text" /></p>
    <p><?php echo text_ausgabe("passwort", 0, $bg['sprache']); ?>:<br>
    <input placeholder="********" maxlength="20" size="25" name="pw" type="password" /></p>
	<center><input type="image" src="../picture/btn_login.png" onsubmit="submit-form()"/></center><br>
    <?php echo text_ausgabe("login", 2, $bg['sprache']); ?><br>
	<a href="index.php?site=register"><?php echo text_ausgabe("login", 3, $bg['sprache']); ?></a><br>
    </form>
</div>