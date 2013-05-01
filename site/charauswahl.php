<!-- Registration -->
    <form action="site/charcheck.php" method="post">
    <table border="0">
        <tr>
            <td colspan="3" align="center"><h3><?php echo text_ausgabe("char_headline", 0, $bg['sprache']); ?></h3></td>
            </tr>
            <td colspan="3" align="center"><?php echo text_ausgabe("char_headline", 1, $bg['sprache']); ?></td>
            </tr>
<!-- Platzhalter zwischen den Tabellen -->
    <tr><td><br /></td></tr>
<!-- Platzhalter zwischen den Tabellen -->
        <tr>
            <td align="center"><?php echo text_ausgabe("char_klasse", 0, $bg['sprache']); ?>&nbsp;<b><?php echo text_ausgabe("char_klasse", 1, $bg['sprache']); ?></b><br><br></td>
            <td align="center"><?php echo text_ausgabe("char_klasse", 0, $bg['sprache']); ?>&nbsp;<b><?php echo text_ausgabe("char_klasse", 2, $bg['sprache']); ?></b><br><br></td>
            <td align="center"><?php echo text_ausgabe("char_klasse", 0, $bg['sprache']); ?>&nbsp;<b><?php echo text_ausgabe("char_klasse", 3, $bg['sprache']); ?></b><br><br></td>
        </tr>
        <tr>
            <td align="center"><br>Hier folgt der Klasse 1 txt</td>
            <td align="center"><br>Hier folgt der Klasse 2 txt</td>
            <td align="center"><br>Hier folgt der Klasse 3 txt</td>
        </tr>
		<tr>
            <td align="center"><input type="submit" name="class_1" value="Klasse_1"/></td>
            <td align="center"><input type="submit" name="class_2" value="Klasse_2"/></td>
            <td align="center"><input type="submit" name="class_3" value="Klasse_3"/></td>
        </tr>
    </table>
    </form>