
 <h1><?php echo text_ausgabe("mobdb_cat", 1, $bg['sprache']); ?></h1>
<hr /><br>

<form method="post" enctype="multipart/form-data">
    <table border="0">
        <tr><td><br /></td></tr>

        <tr>
            <td><p><?php echo text_ausgabe("mobdb_text", 1, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Name" maxlength="20" size="25" name="mob_name" type="text" /></p></td>
	        <td><?php echo text_ausgabe("mobdb_info", 1, $bg['sprache']); ?><br></td>
	    </tr>

	    <tr><td><br /></td></tr>

        <tr>
            <td><p><?php echo text_ausgabe("mobdb_text", 2, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Text" maxlength="200" size="25" name="text" type="text" /></p></td>
	        <td><?php echo text_ausgabe("mobdb_info", 2, $bg['sprache']); ?><br></td>
        </tr>
        
        <tr><td><br /></td></tr>
        
        <tr>
	        <td><p><?php echo text_ausgabe("mobdb_text", 3, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Monster Level" maxlength="20" size="25" name="mob_lvl" type="text" /></p></td>
	        <td><?php echo text_ausgabe("mobdb_info", 3, $bg['sprache']); ?><br></td>
        </tr>

        <tr>
	        <td><p><?php echo text_ausgabe("mobdb_text", 4, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Monster Leben" maxlength="20" size="25" name="mob_leben" type="text" /></p></td>
	        <td><?php echo text_ausgabe("mobdb_info", 4, $bg['sprache']); ?><br></td>
        </tr>
        
        <tr><td><br /></td></tr>

        <tr>
            <td><p><?php echo text_ausgabe("mobdb_text", 5, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Monster min schaden" maxlength="20" size="25" name="min_schaden" type="text" /></p></td>
	        <td><?php echo text_ausgabe("mobdb_info", 5, $bg['sprache']); ?><br></td>
	    </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("mobdb_text", 6, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Monster max schaden" maxlength="20" size="25" name="max_schaden" type="text" /></p></td>
	        <td><?php echo text_ausgabe("mobdb_info", 6, $bg['sprache']); ?><br></td>
	    </tr>

        <tr><td><br /></td></tr>
        <!-- 
        <tr>
	        <td><p><?php //echo text_ausgabe("mobdb_text", 7, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Monster Drop" maxlength="20" size="25" name="mob_drop" type="text" /></p></td>
	        <td><?php //echo text_ausgabe("mobdb_info", 7, $bg['sprache']); ?><br></td>
        </tr>
        -->
    <td><br /></td></tr>
	<tr>
            <td align="center"><input type="reset" name="Reset" value="Reset"/></td>
            <td align="center"><input type="submit" name="add" value="Adden"/></td>
        </tr>
    </table>
    <input value="0" name="mob_art" type="hidden" />
    <input value="" name="mob_drop" type="hidden" />
    </form>