<?php
/*Alex, bau doch das Menü?!?

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

function dragImage(direction, size, speed){
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

$("#imageToDrag").stop().animate(options, speed)
}

$(document).keypress(function (event) {
if (event.keyCode == 37) {
dragImage("left", "10", "10")
}
if (event.keyCode == 38) {
dragImage("top", "5", "500")
}
if (event.keyCode == 39) {
dragImage("right", "5", "1000")
}
if (event.keyCode == 40) {
dragImage("bottom", "5", "1000")
}
});

</script>

<div id="imageToDrag" style="position:absolute;">
<img src="picture/ks/menu/figur.png"/>
</div> 