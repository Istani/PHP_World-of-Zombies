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

$jq(document).keydown(function menuDragImage(event) {

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

<div id="imageToDrag" style="position:absolute; left: 250px; top: 400px; width: 0px;"><img src="picture/ks/menu/figur.png"/></div> 

    <br>
    <a href="index.php?site=admin&db=alex">Zur&uuml;ck</a>


<script language="javascript" type="text/javascript">  

var newSkin : GUISkin;
var mapTexture : Texture2D;

function theFirstMenu() {
    //layout start
    GUI.BeginGroup(Rect(Screen.width / 2 - 150, 50, 300, 200));
   
    //the menu background box
    GUI.Box(Rect(0, 0, 300, 200), "");
   
    //logo picture
    GUI.Label(Rect(15, 10, 300, 68), logoTexture);
   
    ///////main menu buttons
    //game start button
    if(GUI.Button(Rect(55, 100, 180, 40), "Start game")) {
    var script = GetComponent("MainMenuScript");
    script.enabled = false;
    var script2 = GetComponent("MapMenuScript");
    script2.enabled = true;
    }
    //quit button
    if(GUI.Button(Rect(55, 150, 180, 40), "Quit")) {
    Application.Quit();
    }
   
    //layout end
    GUI.EndGroup();
}

function OnGUI () {
    //load GUI skin
    GUI.skin = newSkin;
   
    //execute theFirstMenu function
    theFirstMenu();
}
</script>  

<script language="javascript" type="text/javascript">
var $jq = jQuery.noConflict();

var newSkin : GUISkin;
var mapTexture : Texture2D;

function theMapMenu() {
    //layout start
    GUI.BeginGroup(Rect(Screen.width / 2 - 200, 50, 400, 300));
   
    //boxes
    GUI.Box(Rect(0, 0, 400, 300), "");
    GUI.Box(Rect(96, 20, 200, 200), "");
    GUI.Box(Rect(96, 222, 200, 20), "Coastside Level");
   
    //map preview/icon
    GUI.Label(Rect(100, 20, 198, 198), mapTexture);
   
    //buttons
    if(GUI.Button(Rect(15, 250, 180, 40), "start level")) {
    Application.LoadLevel(1);
    }
    if(GUI.Button(Rect(205, 250, 180, 40), "go back")) {
    var script = GetComponent("MainMenuScript");
    script.enabled = true;
    var script2 = GetComponent("MapMenuScript");
    script2.enabled = false;
    }
   
    //layout end
    GUI.EndGroup();
}

function OnGUI () {
    //load GUI skin
    GUI.skin = newSkin;
   
    //execute theMapMenu function
    theMapMenu();
}
</script>