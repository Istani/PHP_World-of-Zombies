<?php
    echo '<h1>'.text_ausgabe("ort", 0, $bg['sprache']).'</h1>';
    echo '<p>'.text_ausgabe("ort_text", 0, $bg['sprache']).'</p>';
    echo '<br>';

    $sql_user_level="SELECT lvl FROM `char_skill` WHERE userID='".$_SESSION['userID']."' AND skillID=1";
    $query_user_level=mysql_query($sql_user_level);
    $skill_level=mysql_result($query_user_level,0,0);

    $sql_crafting="SELECT * FROM crafting_rezepte WHERE skill_level>0 AND skill_level<=".$skill_level." ORDER BY produkt, item ";
    $query_crafting_moeglich=mysql_query($sql_crafting);
    while ($row_crafting_moeglich=mysql_fetch_assoc($query_crafting_moeglich)) {
        $moeglich[]=$row_crafting_moeglich['produkt'];
    }

    if (isset($_GET["craft"])) {
        if (in_array($_GET["craft"],$moeglich)) {
            $sql_produkt="SELECT item, menge, produkt_menge  FROM crafting_rezepte WHERE produkt=".$_GET["craft"];
            $query_produkt=mysql_query($sql_produkt);
            $craft_klappt=true;
            while ($row_produkt=mysql_fetch_assoc($query_produkt)) {
                $pr_menge=$row_produkt["produkt_menge"];
                if (inventory_remove($_SESSION['userID'], $row_produkt["item"], $row_produkt["menge"])) {
                    $abgezogen[]=$row_produkt["item"];
                } else {
                    $craft_klappt=false;
                }
            }
            if ($craft_klappt) {
                if (!inventory_add($_SESSION['userID'], $_GET["craft"], $pr_menge)) {
                    $sql_produkt="SELECT item, menge FROM crafting_rezepte WHERE produkt=".$_GET["craft"];
                    $query_produkt=mysql_query($sql_produkt);
                    while ($row_produkt=mysql_fetch_assoc($query_produkt)) {
                        inventory_add($_SESSION['userID'], $row_produkt["item"], $row_produkt["menge"]);
                    }
                    echo item_bilder($_GET["craft"], "show", $pr_menge).'&nbsp;'.text_ausgabe("item", $_GET["craft"], $bg['sprache']).'&nbsp;'.text_ausgabe("nicht hergestellt", 0, $bg['sprache']).'<br><br>';
                } else {
                    echo item_bilder($_GET["craft"], "show", $pr_menge).'&nbsp;'.text_ausgabe("item", $_GET["craft"], $bg['sprache']).'&nbsp;'.text_ausgabe("hergestellt", 0, $bg['sprache']).'<br><br>';
					$sql['user_aktion']="UPDATE `char`
                                    SET Items_Crafting=Items_Crafting+".$pr_menge."
                                    WHERE userID=".$_SESSION["userID"];
					mysql_query($sql['user_aktion']);
                }
            } else {
                if (isset($abgezogen)) {
                    foreach ($abgezogen as $item) {
                        $sql_produkt="SELECT item, menge FROM crafting_rezepte WHERE produkt=".$_GET["craft"]." AND item=".$item;
                        $query_produkt=mysql_query($sql_produkt);
                        while ($row_produkt=mysql_fetch_assoc($query_crafting)) {
                            inventory_add($_SESSION['userID'], $row_produkt["item"], $row_produkt["menge"]);
                        }
                    }
                }
                echo item_bilder($_GET["craft"], "show", $pr_menge).'&nbsp;';
                echo text_ausgabe("item", $_GET["craft"], $bg['sprache']).'&nbsp;';
                echo text_ausgabe("nicht hergestellt", 0, $bg['sprache']).'<br><br>';
            }
        }
    }


    $query_crafting=mysql_query($sql_crafting);
    $last_item="";
    echo '<table border="1" width="100%">';
    while ($row_crafting=mysql_fetch_assoc($query_crafting)) {
        echo '<tr>';
        echo '<td width="100%">';
        if ($last_item!=$row_crafting["produkt"]) {
            echo item_bilder($row_crafting['produkt'], "show", $row_crafting['produkt_menge']).'&nbsp;'.text_ausgabe("item", $row_crafting['produkt'], $bg['sprache']);
            $last_item=$row_crafting["produkt"];
            echo '<br>';
            echo '<a href="index.php?map='.$_GET["map"].'&craft='.$row_crafting['produkt'].'">'.text_ausgabe("herstellen", 0, $bg['sprache']).'</a>';
        } else {
            echo '&nbsp;';
        }
        echo '</td>';
        echo '<td>';
        echo item_bilder($row_crafting['item'], "show", $row_crafting['menge']);
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
?>