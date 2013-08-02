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
*/

?>
    
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

$jq("#imageToDrag").stop().animate(options, speed)       ;


}

$jq(document).keypress(function menuDragImage(event) {

if (event.keyCode == 37) {
BattleImageDrag("left", "100", "10");
}
if (event.keyCode == 38) {
BattleImageDrag("top", "100", "10")
}
if (event.keyCode == 39) {
BattleImageDrag("right", "100", "10")
}
if (event.keyCode == 40) {
BattleImageDrag("bottom", "100", "10")
}

});

</script>

<div id="imageToDrag" style="position:absolute; left: 250px; top: 100px; width: 80px;"><img src="picture/ks/menu/figur.png"/></div> 

    <br>
    <a href="index.php?site=admin&db=alex">Zur&uuml;ck</a>
