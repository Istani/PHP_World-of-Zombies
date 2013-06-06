<?php
echo '<h1>Item Editieren</h1>';
// Form je Itemart unterschiedlich... Mit Javascript oder mit PHP, ich mach
// das jetzt einfach mal mit PHP weil der Alex kein JS kann...
// Gruß und Kuss Sascha
if (isset($_POST['speichern'])) {
    if (file_exists("picture/items/" . $_POST['itemID'] . ".png")) {
        unlink("picture/items/" . $_POST['itemID'] . ".png");
    }
    if (file_exists("picture/items/" . $_GET['id'] . ".png")) {
        rename("picture/items/" . $_GET['id'] . ".png", "picture/items/" . $_POST['itemID'] . ".png");
        @unlink("picture/items/" . $_GET['id'] . ".png");
    }
    if ($_FILES['datei']['tmp_name'] != "") {
        $dateityp = GetImageSize($_FILES['datei']['tmp_name']);
        if ($dateityp[2] == 3) {
            @unlink("picture/items/" . $_GET['itemID'] . ".png");
            move_uploaded_file($_FILES['datei']['tmp_name'], "picture/items/" . $_POST['itemID'] . ".png");
        }
    }
    foreach ($_POST as $key => $value) {
        if (($key != "itemName") && ($key != "itemText") && ($key != "speichern")) {
            $sql_array[$key] = $value;
        }
    }
    $sql_String = array_set_mysqlstring($sql_array);
    $sql_update_item = "UPDATE item_db SET " . $sql_String . "  WHERE itemID=" . $_GET['id'];
    mysql_query($sql_update_item);
    $sql_text_weg = "DELETE FROM texte WHERE (kurz='item' or kurz='item_text') and id=" . $_POST['itemID'];
    mysql_query($sql_text_weg);

    $sql_additem = "INSERT INTO `texte` SET
                        `kurz`    =     'item',
                        `id`      =     '" . $_POST["itemID"] . "',
                        `deutsch` =     '" . $_POST["itemName"] . "'";
    mysql_query($sql_additem);
    $sql_additemtext = "INSERT INTO `texte` SET
                        `kurz`    =     'item_text',
                        `id`      =     '" . $_POST["itemID"] . "',
                        `deutsch` =     '" . $_POST["itemText"] . "'";
    mysql_query($sql_additemtext);

    echo "<meta http-equiv='refresh' content='0; URL=index.php?site=admin&db=iedit&id=" . $_POST["itemID"] . "' />";
    die();
}
if (!isset($_GET['id'])) {
    echo 'Bastard du hast kein Item ausgewählt';
} else {
    //FROM 
    $sql_item = "SELECT * FROM item_db WHERE itemID=" . $_GET['id'];
    $query_item = mysql_query($sql_item);
    $dsatz = mysql_fetch_assoc($query_item);
    $dsatz['itemName'] = text_ausgabe("item", $dsatz['itemID'], $bg['sprache']);
    $dsatz['itemText'] = text_ausgabe("item_text", $dsatz['itemID'], $bg['sprache']);

    echo '<form method="post" enctype="multipart/form-data">';
    echo '<table>';

    $feld_text_id = 2;
    $feld_art = "itemID";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 1;
    $feld_art = "itemName";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 16;
    $feld_art = "itemText";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 3;
    $feld_art = "min_lvl";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 4;
    $feld_art = "max_lvl";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 5;
    $feld_art = "art";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 6;
    $feld_art = "stack";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 7;
    $feld_art = "mindmg";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 8;
    $feld_art = "maxdmg";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 9;
    $feld_art = "def";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 20;
    $feld_art = "mdef";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 10;
    $feld_art = "hit";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 11;
    $feld_art = "crit";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 12;
    $feld_art = "refill";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 13;
    $feld_art = "refillart";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 14;
    $feld_art = "platz";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>
    <?php
    $feld_text_id = 15;
    $feld_art = "munitonsart";
    ?>
    <tr><td><?php echo text_ausgabe("itemdb_text", $feld_text_id, $bg['sprache']); ?>:<br></p></td>
    <td><input maxlength="20" size="25" name="<?php echo $feld_art; ?>" type="text" value="<?php echo $dsatz[$feld_art]; ?>" /></p></td>
    <td><?php echo text_ausgabe("itemdb_info", $feld_text_id, $bg['sprache']); ?><br></td></tr>

    <tr>
        <td colspan="2"><p><?php echo text_ausgabe("itemdb_text", 18, $bg['sprache']); ?>:</p><input maxlength="20" type="file" name="datei"></td>
        <td><?php echo text_ausgabe("itemdb_info", 18, $bg['sprache']); ?><br></td>
    </tr>
    <?php
    echo '</table>';
    echo '<input type="submit" name="speichern" value="Item ändern">';
    echo '</form>';
}
?>