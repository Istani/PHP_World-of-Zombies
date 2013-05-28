
<form method="post">
    <table border="0">
        <tr><td><br /></td></tr>

        <tr>
            <td><p><?php echo text_ausgabe("itemdb_text", 1, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Information (Name)" maxlength="20" size="25" name="info" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 1, $bg['sprache']); ?>:<br></td>
	    </tr>
        <tr>
            <td><p><?php echo text_ausgabe("itemdb_text", 2, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="ItemID" maxlength="20" size="25" name="itemID" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 2, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
            <td><p><?php echo text_ausgabe("itemdb_text", 3, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Monster min lvl (drop)" maxlength="20" size="25" name="min_lvl" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 3, $bg['sprache']); ?>:<br></td>
	    </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 4, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Monster max lvl (drop)" maxlength="20" size="25" name="max_lvl" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 4, $bg['sprache']); ?>:<br></td>
	    </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 5, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Art (welche: nahkampf,fernkampf)" maxlength="20" size="25" name="art" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 5, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 6, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Stack (wie oft stabelbar)" maxlength="20" size="25" name="itemID" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 6, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 7, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Minimaler Schaden" maxlength="20" size="25" name="mindmg" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 7, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 8, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Maximalier Schaden" maxlength="20" size="25" name="maxdmg" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 8, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 9, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Def. (Nur fuer Ruestungen)" maxlength="20" size="25" name="def" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 9, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 10, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Hit Rate(Treffer)" maxlength="20" size="25" name="hit" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 10, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 11, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Cirtical Hit Chance" maxlength="20" size="25" name="crit" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 11, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 12, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Refill-Wert" maxlength="20" size="25" name="refill" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 12, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 13, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Refill-Art" maxlength="20" size="25" name="refillart" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 13, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 14, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Inventar Paltz" maxlength="20" size="25" name="platz" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 14, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 15, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Munitionsart" maxlength="20" size="25" name="munitionsart" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 15, $bg['sprache']); ?>:<br></td>
        </tr>
    <td><br /></td></tr>

	<tr>
            <td align="center"><input type="reset" name="Reset" value="Reset"/></td>
            <td align="center"><input type="submit" name="add" value="Adden"/></td>
        </tr>
    </table>
    </form>