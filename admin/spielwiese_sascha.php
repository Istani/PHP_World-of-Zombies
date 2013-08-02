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
		var canvas2;
		var context2;
		var wobinich = 0;
		var wobinich2 = 0;
		var wobinich3 = 0;
		var wobinich4 = 0;
		var tiles = new Array();

		function Nix() { /* gar nix weiter */
		}

		function bildinit() {
		    canvas = document.getElementById("board");
		    context = canvas.getContext("2d");

		    canvas2 = document.getElementById("temp_board");
		    context2 = canvas2.getContext("2d");

		    var tileset = document.getElementById("tileset");
		    var leer = document.getElementById("leer");
		    context2.drawImage(tileset, 0, 0);

		    tiles[1] = context2.getImageData(0, 0, 24, 32);
		    tiles[2] = context2.getImageData(24, 0, 24, 32);
		    tiles[3] = context2.getImageData(48, 0, 24, 32);

		    tiles[4] = context2.getImageData(0, 32, 24, 32);
		    tiles[5] = context2.getImageData(24, 32, 24, 32);
		    tiles[6] = context2.getImageData(48, 32, 24, 32);

		    tiles[7] = context2.getImageData(0, 64, 24, 32);
		    tiles[8] = context2.getImageData(24, 64, 24, 32);
		    tiles[9] = context2.getImageData(48, 64, 24, 32);

		    tiles[10] = context2.getImageData(0, 96, 24, 32);
		    tiles[11] = context2.getImageData(24, 96, 24, 32);
		    tiles[12] = context2.getImageData(48, 96, 24, 32);

		    context.drawImage(leer, 0, 40);

		    window.setTimeout("walking_animation1()", 1);
		    window.setTimeout("walking_animation2()", 1);
		    window.setTimeout("walking_animation3()", 1);
		    window.setTimeout("walking_animation4()", 1);
		}

		function walking_animation1() {
		    if (wobinich == 1) {
			context.putImageData(tiles[10], 500, 200);
		    }
		    if (wobinich == 2) {
			context.putImageData(tiles[11], 500, 200);
		    }
		    if (wobinich == 3) {
			context.putImageData(tiles[12], 500, 200);
		    }
		    if (wobinich == 4) {
			context.putImageData(tiles[11], 500, 200);
			wobinich = 0;
		    }
		    window.setTimeout("walking_animation1()", 100);
		    wobinich++;
		}

		function walking_animation2() {
		    if (wobinich2 == 1) {
			context.putImageData(tiles[10], 550, 220);
		    }
		    if (wobinich2 == 2) {
			context.putImageData(tiles[11], 550, 220);
		    }
		    if (wobinich2 == 3) {
			context.putImageData(tiles[12], 550, 220);
		    }
		    if (wobinich2 == 4) {
			context.putImageData(tiles[11], 550, 220);
			wobinich2 = 0;
		    }
		    window.setTimeout("walking_animation2()", 200);
		    wobinich2++;
		}

		function walking_animation3() {
		    if (wobinich3 == 1) {
			context.putImageData(tiles[10], 510, 250);
		    }
		    if (wobinich3 == 2) {
			context.putImageData(tiles[11], 510, 250);
		    }
		    if (wobinich3 == 3) {
			context.putImageData(tiles[12], 510, 250);
		    }
		    if (wobinich3 == 4) {
			context.putImageData(tiles[11], 510, 250);
			wobinich3 = 0;
		    }
		    window.setTimeout("walking_animation3()", 300);
		    wobinich3++;
		}

		function walking_animation4() {
		    if (wobinich4 == 1) {
			context.putImageData(tiles[10], 560, 270);
		    }
		    if (wobinich4 == 2) {
			context.putImageData(tiles[11], 560, 270);
		    }
		    if (wobinich4 == 3) {
			context.putImageData(tiles[12], 560, 270);
		    }
		    if (wobinich4 == 4) {
			context.putImageData(tiles[11], 560, 270);
			wobinich4 = 0;
		    }
		    window.setTimeout("walking_animation4()", 400);
		    wobinich4++;
		}


	    </script>
	    <canvas id="board" width="640" height="360" style="border:1px white solid">Dieser Browser ist nicht geeignet.</canvas>
	    <canvas id="temp_board" width="1000" height="1000"  style="position:absolute;top:-3000px;visibility:hidden;">Dieser Browser ist nicht geeignet.</canvas>
	    <img id="leer" src="picture/ks/background/0.jpg" style="visibility:hidden;">
	    <img id="tileset" src="picture/ks/charset/0_0_0.png" style="visibility:hidden;" OnLoad="bildinit();">


	</td>
    </tr>
</table>


ALEX SEIN KeyPress in KeyDown ändern damit es auf Chrome läuft!
