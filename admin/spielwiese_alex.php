<?php
/*
Hier Sascha denke mal , dass wir das gut für unsere weltkarte nehmen können!
http://inc0ming.in.funpic.de/map/



Alex, bau doch das Menü?!?

TAB: Angreifen
1. Nahkampf
2. Fernkampf

TAB: Skill
1. Steine schmeißen


Auswahl durch Maus und Pfeiltasten!
Links/rechts ändert den Tab, Hoch runter die ausgewählte Sache.
Ich würde für die Auswahl einfach den Text in grün machen.

Das jeweils ausgewählte muss mit der Char_ID in eine Tabelle gespeichert werden
& Wenn die Seite neu geladen wird soll das zuletzt ausgewählte noch ausgewählt sein.

Standart auswahl ist immer Angriefen Nahkampf, aber das hat sich ja nach dem ersten auswählen geändert.



Tipp: Viel mit Javascript...
http://www.php-resource.de/forum/html-javascript-ajax-jquery-und-css/47736-object-nach-tastatureingabe-bewegen.html

-------------------------------BAK

<script type="text/javascript">
var $jq = jQuery.noConflict();

function BattleImageDrag(direction, size, speed){
switch(direction){
case "left":
directionToDrag = "left";
value = "-=";
break;
case "right":
directionToDrag = "left";
value = "+=";
break;
case "top":
directionToDrag = "top";
value = "-=";
break;
case "bottom":
directionToDrag = "top";
value = "+=";

break;
}

var options = {};
options[directionToDrag] = value + size;

$jq("#imageToDrag").stop().animate(options, speed);

}



$jq(document).keydown(function menuDragImage(event) {
if (event.keyCode == 37)
    {
    BattleImageDrag("left", "100", "10");
    }
if (event.keyCode == 38)
    {
    BattleImageDrag("top", "100", "10")
    }
if (event.keyCode == 39)
    {
    BattleImageDrag("right", "100", "10")
    }
if (event.keyCode == 40)
    {
    BattleImageDrag("bottom", "100", "10")
    }
});

</script>



    <div id="imageToDrag" style="position:absolute; left: 250px; top: 400px; width: 0px;"><img src="picture/ks/menu/figur.png"/></div>

*/

?>


<script type="text/javascript">
		var canvas;
		var context;
		var canvas2;
		var context2;
		var player1 = 5;
		var player2 = 0;
		var player3 = 0;
		var player4 = 0;
		var tiles = new Array();

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
		}
	
	    function walking_animation1() {
	        if (player1 == 1) {
			context.putImageData(tiles[10], 500, 200);
		    }
		    if (player1 == 2) {
			context.putImageData(tiles[11], 500, 200);
		    }
		    if (player1 == 3) {
			context.putImageData(tiles[12], 500, 200);
		    }
		    if (player1 == 4) {
			context.putImageData(tiles[11], 500, 200);
		    }
		    window.setTimeout("walking_animation1()", 1000);
		    player1++;
	    }

function attack ()
        {
        player1 = 0;
        walking_animation1();    
        }
function skill () {
  alert("Folgt..");
}
function item () {
  alert("Folgt..");
}
function escape () {
  alert("Folgt..");
}
</script>

<form>
<input style="color: #000000;" type="button" value="<?php echo text_ausgabe("ks_menu", 1, $bg['sprache']); ?>" onclick="attack()">
<input style="color: #000000;" type="button" value="<?php echo text_ausgabe("ks_menu", 2, $bg['sprache']); ?>" onclick="skill()">
<input style="color: #000000;" type="button" value="<?php echo text_ausgabe("ks_menu", 3, $bg['sprache']); ?>" onclick="item()">
<input style="color: #000000;" type="button" value="<?php echo text_ausgabe("ks_menu", 4, $bg['sprache']); ?>" onclick="escape()">
</form>

<canvas id="board" width="640" height="360" style="border:1px white solid">Dieser Browser ist nicht geeignet.</canvas>
<canvas id="temp_board" width="1000" height="1000"  style="position:absolute;top:-3000px;visibility:hidden;">Dieser Browser ist nicht geeignet.</canvas>

<img id="leer" src="picture/ks/background/0.jpg" style="visibility:hidden;">
<img id="tileset" src="picture/ks/charset/0_0_0.png" style="visibility:hidden;" OnLoad="bildinit();">



    <br>
    <a href="index.php?site=admin&db=alex">Zur&uuml;ck</a>