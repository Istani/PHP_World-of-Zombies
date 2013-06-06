<?php

//Einfach alle felder auslesen :-P
$sql['kd_stamm'] = "SELECT * FROM `char` WHERE `userID` = '" . $_SESSION['userID'] . "'";
$query['kd_stamm'] = mysql_query($sql['kd_stamm']);
while ($row['kd_stamm'] = mysql_fetch_assoc($query['kd_stamm'])) {
    foreach ($row['kd_stamm'] as $key => $value) {
        $varb_text = "char_" . $key;
        $$varb_text = $value; // Variable Variablenamen!
    }
    $max_wert_ausdauer = $row['kd_stamm']['gesundheit'] * $bg['vit_ausdauer_modifier'];
}
$char_stats = get_player_status($_SESSION['userID']);

$sql_exp = "SELECT * FROM `char_exp` WHERE `level` = '" . $_SESSION['lvl'] . "'";
$result_exp = mysql_query($sql_exp);
$dsatz_exp = mysql_fetch_assoc($result_exp);

$sql_time = "SELECT * FROM `login` WHERE `userID` = '" . $_SESSION['userID'] . "'";
$result_time = mysql_query($sql_time);
$dsatz_time = mysql_fetch_assoc($result_time);

$tage = (int) ($dsatz_time['onlineTimer'] / 60 / 60 / 24);
$stunden = (int) ($dsatz_time['onlineTimer'] / 60 / 60 - $tage * 24);
$minuten = (int) ($dsatz_time['onlineTimer'] / 60 - ($tage * 24 + $stunden) * 60);

$stunden = sprintf("%02d", $stunden);
$minuten = sprintf("%02d", $minuten);
?>