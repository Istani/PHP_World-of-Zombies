<table>
    <tr>
	<td>
	    <?php
		$spieler = array(1, 2, 3);
		/*
		 * Bei mir hatte
		 * Spieler1 20Agi
		 * Spieler2 10Agi
		 * Spieler3 1Agi
		 */

		//Hier reichen später auch 5 oder 10 oder so XD Weil das Problem ist das muss ja gespeichert und wieder ausgelesen und überschrieben werden
		$max_berechnungs_runden = 5;

		// Beispielwert, muss später angepasst werden, wahrscheinlich einfach das höchste agi aus der Datenbank mal 5 oder so
		$agi_attack_rate = 40;

		// Init Agi Werte -> Später aus Kampf Datenbank
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
			// Fertige Agi Werte in Kampfdatenbank speichern.
			// Nur für die 1. Runde speichern, dannach neuberechnung jede Runde!
			$runde++;
		    }
		}
	    ?>
	</td>
	<td>
	    <!---
	    // Animations Test
     http://xtainment.net/wiki/index.php/Spieleentwicklung_mit_JavaScript_-_Dynamische_Spielfelder
     !--->
	    <script type="text/javascript">
		var canvas;
		var context;
		var wobinich = 0;
		var wobinich2 = 0;
		var tiles = new Array();

		function Nix() { /* gar nix weiter */
		}

		function bildinit() {
		    canvas = document.getElementById("board");
		    context = canvas.getContext("2d");

		    var tileset = document.getElementById("tileset");
		    var leer = document.getElementById("leer");
		    context.drawImage(tileset, 0, 0);

		    tiles[1] = context.getImageData(0, 0, 24, 32);
		    tiles[2] = context.getImageData(24, 0, 24, 32);
		    tiles[3] = context.getImageData(48, 0, 24, 32);

		    tiles[4] = context.getImageData(0, 32, 24, 32);
		    tiles[5] = context.getImageData(24, 32, 24, 32);
		    tiles[6] = context.getImageData(48, 32, 24, 32);

		    tiles[7] = context.getImageData(0, 64, 24, 32);
		    tiles[8] = context.getImageData(24, 64, 24, 32);
		    tiles[9] = context.getImageData(48, 64, 24, 32);

		    tiles[10] = context.getImageData(0, 96, 24, 32);
		    tiles[11] = context.getImageData(24, 96, 24, 32);
		    tiles[12] = context.getImageData(48, 96, 24, 32);

		    context.drawImage(leer, 0, 0);

		    context.putImageData(tiles[4], 0, 0);
		    context.putImageData(tiles[10], 24, 0);
		    window.setTimeout("walking_animation()", 1);
		    window.setTimeout("walking_animation2()", 1);
		}

		function walking_animation() {
		    if (wobinich == 1) {
			context.putImageData(tiles[4], 0, 0);
		    }
		    if (wobinich == 2) {
			context.putImageData(tiles[5], 0, 0);
		    }
		    if (wobinich == 3) {
			context.putImageData(tiles[6], 0, 0);
		    }
		    if (wobinich == 4) {
			context.putImageData(tiles[5], 0, 0);
			wobinich = 0;
		    }
		    window.setTimeout("walking_animation()", 100);
		    wobinich++;
		}

		function walking_animation2() {
		    if (wobinich2 == 1) {
			context.putImageData(tiles[10], 24, 0);
		    }
		    if (wobinich2 == 2) {
			context.putImageData(tiles[11], 24, 0);
		    }
		    if (wobinich2 == 3) {
			context.putImageData(tiles[12], 24, 0);
		    }
		    if (wobinich2 == 4) {
			context.putImageData(tiles[11], 24, 0);
			wobinich2 = 0;
		    }
		    window.setTimeout("walking_animation2()", 400);
		    wobinich2++;
		}


	    </script>
	    <canvas id="board" width="250" height="250" style="border:1px white solid">Dieser Browser ist nicht geeignet.</canvas>
	    <img id="leer" src="picture/ks/charset/blank.png" style="visibility:hidden;">
	    <img id="tileset" src="picture/ks/charset/char_0_0_0.png" style="visibility:hidden;" OnLoad="bildinit();">


	</td>
    </tr>
</table>


ALEX SEIN KeyPress in KeyDown ändern damit es auf Chrome läuft!