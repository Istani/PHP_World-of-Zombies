<?php 
    
    if (isset($_POST['add'])){
    //Item wird in die Itemdb aufgenommen
    $sql_additemdb = "INSERT INTO `item_db` SET
                        `Info`          =     '" .$_POST["name"]. "',
                        `itemID`        =     '" .$_POST["itemID"]. "',
                        `min_lvl`       =     '" .$_POST["min_lvl"]. "',
                        `max_lvl`       =     '" .$_POST["max_lvl"]. "',
                        `art`           =     '1',
                        `stack`         =     '1',
                        `mindmg`        =     '" .$_POST["mindmg"]. "',
                        `maxdmg`        =     '" .$_POST["maxdmg"]. "',
                        `def`           =     '0',
                        `crit`          =     '" .$_POST["crit"]. "',
                        `refill`        =     '0',
                        `refillart`     =     '0',
                        `platz`         =     '0',
                        `munitonsart`   =     '0'";
                mysql_query($sql_additemdb);
    
    // Item Name wird in Texte eingefügt    
    $sql_additem = "INSERT INTO `texte` SET
                        `kurz`    =     'item',
                        `id`      =     '" .$_POST["itemID"]. "',
                        `deutsch` =     '" .$_POST["name"]. "'";
                mysql_query($sql_additem);
    // Item Text wird in Texte eingefügt
    $sql_additemtext = "INSERT INTO `texte` SET
                        `kurz`    =     'item_text',
                        `id`      =     '" .$_POST["itemID"]. "',
                        `deutsch` =     '" .$_POST["text"]. "'";
                mysql_query($sql_additemtext);  
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
	        <td><input placeholder="Item Text" maxlength="50" size="25" name="text" type="text" /></p></td>
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