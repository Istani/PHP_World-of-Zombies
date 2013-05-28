<?php 
    
    if (isset($_POST['add'])){
        if (!isset($_POST['name']) && !isset($_POST['text']) && !isset($_POST['itemID']) && !isset($_POST['min_lvl']) && !isset($_POST['max_lvl']) && !isset($_POST['mindmg']) && !isset($_POST['maxdmg']) && !isset($_POST['hit']) && !isset($_POST['crit'])){
            echo text_ausgabe("itemdb_error", 1, $bg['sprache']);         
        }
    }
 
 ?>
<form method="post">
    <table border="0">
        <tr><td><br /></td></tr>

        <tr>
            <td><p><?php echo text_ausgabe("itemdb_text", 1, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Name" maxlength="20" size="25" name="name" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 1, $bg['sprache']); ?><br></td>
	    </tr>
	    <tr>
            <td><p><?php echo text_ausgabe("itemdb_text", 16, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Item Text" maxlength="20" size="25" name="text" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 16, $bg['sprache']); ?><br></td>
	    </tr>
	    
	    <tr><td><br /></td></tr>
	    
        <tr>
            <td><p><?php echo text_ausgabe("itemdb_text", 2, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="ItemID" maxlength="20" size="25" name="itemID" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 2, $bg['sprache']); ?><br></td>
        </tr>
        
        <tr><td><br /></td></tr>
        
        <tr>
            <td><p><?php echo text_ausgabe("itemdb_text", 3, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Monster min lvl (drop)" maxlength="20" size="25" name="min_lvl" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 3, $bg['sprache']); ?><br></td>
	    </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 4, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Monster max lvl (drop)" maxlength="20" size="25" name="max_lvl" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 4, $bg['sprache']); ?><br></td>
	    </tr>
	    
	    <tr><td><br /></td></tr>
	    
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 7, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Minimaler Schaden" maxlength="20" size="25" name="mindmg" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 7, $bg['sprache']); ?><br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 8, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Maximalier Schaden" maxlength="20" size="25" name="maxdmg" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 8, $bg['sprache']); ?><br></td>
        </tr>
        
        <tr><td><br /></td></tr>
        
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 10, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Hit Rate(Treffer)" maxlength="20" size="25" name="hit" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 10, $bg['sprache']); ?><br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 11, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Cirtical Hit Chance" maxlength="20" size="25" name="crit" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 11, $bg['sprache']); ?><br></td>
        </tr>
    <td><br /></td></tr>

	<tr>
            <td align="center"><input type="reset" name="Reset" value="Reset"/></td>
            <td align="center"><input type="submit" name="add" value="Adden"/></td>
        </tr>
    </table>
    </form>