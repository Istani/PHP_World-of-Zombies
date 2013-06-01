<?php
    if (isset($_POST['add'])){
        $dateityp = GetImageSize($_FILES['datei']['tmp_name']);
        if($dateityp[2] == 3) {
        if (file_exists("picture/items/".$_POST['itemID'].".png")) {
            unlink("picture/items/".$_POST['itemID'].".png"); // Falls schon vorhanden, Bild löschen
            }
            move_uploaded_file($_FILES['datei']['tmp_name'], "picture/items/".$_POST['itemID'].".png");
            echo "Das Bild wurde Erfolgreich nach picture/items/".$_POST['itemID'].".png hochgeladen";

        $sql_checkitem = "SELECT * FROM `item_db` WHERE `itemID` = '". $_POST['itemID'] ."'";
	    $result_checkitem = mysql_query($sql_checkitem);
	    $ds_checkitem = mysql_fetch_assoc($result_checkitem);
	    $ID = $ds_checkitem['itemID'];
            if (isset($ID)){
                echo text_ausgabe("item_db_error", 1, $bg['sprache']);
            }else{
    //Item wird in die Itemdb aufgenommen
    $sql_additemdb = "INSERT INTO `item_db` SET
                        `Info`          =     '" .$_POST["name"]. "',
                        `itemID`        =     '" .$_POST["itemID"]. "',
                        `min_lvl`       =     '" .$_POST["min_lvl"]. "',
                        `max_lvl`       =     '" .$_POST["max_lvl"]. "',
                        `art`           =     '9',
                        `stack`         =     '1',
                        `mindmg`        =     '0',
                        `maxdmg`        =     '0',
                        `def`           =     '0',
                        `mdef`          =     '0',
                        `crit`          =     '0',
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

    echo "<meta http-equiv='refresh' content='0; URL=index.php?site=admin&db=items#tabs-4' />";
        }
    }
}
 ?>

<h1><?php echo text_ausgabe("itemdb_cat", 10, $bg['sprache']); ?></h1>
<hr /><br>


<form method="post" enctype="multipart/form-data">
    <table border="0">
        <tr><td><br /></td></tr>

        <tr>
            <td><?php echo text_ausgabe("itemdb_text", 1, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Name" maxlength="20" size="25" name="name" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 1, $bg['sprache']); ?><br></td>
	    </tr>
	    <tr>
            <td><?php echo text_ausgabe("itemdb_text", 16, $bg['sprache']); ?>:<br></p></td>
	        <td><input placeholder="Item Text" maxlength="50" size="25" name="text" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 16, $bg['sprache']); ?><br></td>
	    </tr>

	    <tr><td><br /></td></tr>

        <tr>
            <td><?php echo text_ausgabe("itemdb_text", 2, $bg['sprache']); ?>:<br></p></td>
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
	        <td><p><?php echo text_ausgabe("itemdb_text", 9, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Verteidigung" maxlength="20" size="25" name="def" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 9, $bg['sprache']); ?>:<br></td>
        </tr>
        <tr>
	        <td><p><?php echo text_ausgabe("itemdb_text", 20, $bg['sprache']); ?>:<br></td>
	        <td><input placeholder="Magische Def. " maxlength="20" size="25" name="mdef" type="text" /></p></td>
	        <td><?php echo text_ausgabe("itemdb_info", 20, $bg['sprache']); ?>:<br></td>
        </tr>

	    <tr><td><br /></td></tr>

        <tr>
            <td colspan="2"><p><?php echo text_ausgabe("itemdb_text", 18, $bg['sprache']); ?>:</p><input maxlength="20" type="file" name="datei"></td>
            <td><?php echo text_ausgabe("itemdb_info", 18, $bg['sprache']); ?><br></td>
        </tr>
    <td><br /></td></tr>
	<tr>
            <td align="center"><input type="reset" name="Reset" value="Reset"/></td>
            <td align="center"><input type="submit" name="add" value="Adden"/></td>
        </tr>
    </table>
    </form>