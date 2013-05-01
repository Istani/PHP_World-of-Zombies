<?php
    $queryString = strstr($_SERVER['REQUEST_URI'], '?');
    $queryString = ($queryString===false) ? '' : substr($queryString,1);
    $parameters = array();
    parse_str($queryString, $parameters);
    $temp_gebiet=$parameters['map'];

    $sql['abbaugebiet']="SELECT * FROM abbau_gebiet WHERE gebiet='".$temp_gebiet."' ORDER BY ID LIMIT 0,1";
    $query['abbaugebiet']=mysql_query($sql['abbaugebiet']);
    while ($row['abbaugebiet']=mysql_fetch_assoc($query['abbaugebiet'])) {
        $gebiet=$row['abbaugebiet'];
    }

    if (isset($_GET['abbau'])) {
        // Abbau starten
        $sql['user_aktion']="UPDATE `char`
            SET aktion='ABBAUEN',
                aktion_id=".$gebiet['ID'].",
                aktion_start=".time().",
                aktion_ende=".(time()+$gebiet['dauer'])."
            WHERE userID=".$_SESSION["userID"];
        mysql_query($sql['user_aktion']);
        echo "<meta http-equiv='refresh' content='0; URL=../index.php' />";
        die();
    }

    echo '<h1>'.text_ausgabe("gebiet", $gebiet['ID'], $bg['sprache']).'</h1>';
    echo text_ausgabe("gebiet_text", $gebiet['ID'], $bg['sprache']).'<br><br>';
?>
    <table border="1" width="100%">
        <tr>
            <td>
<?php
    // Normales Abbauen
    echo text_ausgabe("abbauen", 0, $bg['sprache']).'<br>';
    $sql['abbaugebiet']="SELECT * FROM abbau_gebiet WHERE gebiet='".$temp_gebiet."'";
    $query['abbaugebiet']=mysql_query($sql['abbaugebiet']);
    while ($row['abbaugebiet']=mysql_fetch_assoc($query['abbaugebiet'])) {
        echo item_bilder($row['abbaugebiet']['itemID'], $art="show");
        echo '&nbsp;'.text_ausgabe("item", $row['abbaugebiet']['itemID'], $bg['sprache']).'<br><br>';
     }
    echo text_ausgabe("dauer", 0, $bg['sprache']).':'.zeit_anzeigen($gebiet['dauer']).'<br>';
    if (player_inventar_frei( $_SESSION['userID'])>0) {
        echo '<a href="index.php?'.$queryString.'&abbau=self">'.text_ausgabe("abbauen", 1, $bg['sprache']).'</a><br><br>';
    } else {
        echo text_ausgabe("not_abbauen", 0, $bg['sprache']).'<br><br>';
    }
    echo '<br>';
?>
            </td>
            <td>
<?
    echo text_ausgabe("abbauen_zombie", 0, $bg['sprache']);

?>
            </td>
        </tr>
    </table>