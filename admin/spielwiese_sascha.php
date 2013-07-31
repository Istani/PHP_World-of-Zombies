<?php

    /*
     * Sascha
     *
     * Du machst wer als nächstes und dannach dran ist.
     */

    $spieler = array(1, 2, 3);

    //Hier reichen später auch 5 oder 10 oder so XD Weil das Problem ist das muss ja gespeichert und wieder ausgelesen und überschrieben werden
    $max_berechnungs_runden = 50;

    // Beispielwert, muss später angepasst werden, wahrscheinlich einfach das höchste agi aus der Datenbank mal 5 oder so
    $agi_attack_rate = 21;

    // Init Agi Werte
    // Bisher gibt es nur Spieler
    foreach ($spieler as $key => $value) {
	$tmp_agi_wert["S"][$value] = 0;
    }
    $runde = 0;
    while ($runde <= $max_berechnungs_runden) {
	//Agi Werte Addieren
	foreach ($tmp_agi_wert as $art => $tmp_array) {
	    // Für Spieler
	    foreach ($tmp_array as $tmp_id => $wert) {
		if ($art == "S") {
		    $tmp_char = get_player_status($tmp_id);
		    $tmp_agi_wert[$art][$tmp_id]+=$tmp_char['agi'];
		}
	    }
	}

	//Vieh mit dem meisten Agi herrausfinden
	$vergleich_agi = 0;
	$vergleich_id = "";
	$vergleich_art = "";
	foreach ($tmp_agi_wert as $art => $tmp_array) {
	    foreach ($tmp_array as $tmp_id => $wert) {
		if ($wert > $vergleich_agi) {
		    $vergleich_agi = $wert;
		    $vergleich_id = $tmp_id;
		    $vergleich_art = $art;
		}
	    }
	}
	//ist das schon genug füt einen HIT
	if ($vergleich_agi >= $agi_attack_rate) {
	    echo $vergleich_art . '_' . $vergleich_id . '<br>';
	    $tmp_agi_wert[$vergleich_art][$vergleich_id] = 0;
	    $runde++;
	}
    }
?>