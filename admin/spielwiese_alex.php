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
if(isset ($_GET['menu'])){
    

if($_GET['menu'] == "1")
{
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

$(document).onkeypress(function dragImage(event) {
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

<div id="imageToDrag" style="position:absolute; left: 250px; top: 100px; width: 80px;"><img src="picture/ks/menu/figur.png"/></div> 

    <br>
    <a href="index.php?site=admin&db=alex">Zur&uuml;ck</a>
<?php 
} 

if($_GET['menu'] == "2")
{
?>
<script type="text/javascript">
function TasteGedrueckt (Ereignis) {
  if (!Ereignis)
    Ereignis = window.event;
  if (Ereignis.which) {
    Tastencode = Ereignis.which;
  } else if (Ereignis.keyCode) {
    Tastencode = Ereignis.keyCode;
  }
  if (Tastencode == 37) {
      
  }
}
function TasteLosgelassen (Ereignis) {
  if (!Ereignis)
    Ereignis = window.event;
  if (Ereignis.which) {
    Tastencode = Ereignis.which;
  } else if (Ereignis.keyCode) {
    Tastencode = Ereignis.keyCode;
  }
  document.formular.ausgabe.value = "Taste mit Dezimalwert " + Tastencode + " losgelassen";
}

document.onkeypress = TasteGedrueckt;
document.onkeyup = TasteLosgelassen;
</script>

    <br>
    <a href="index.php?site=admin&db=alex">Zur&uuml;ck</a>
    
<?php   
}

if($_GET['menu'] == "3")
{
?>

<script language="JavaScript" type="text/javascript">
function init()
{
	f1      = document.getElementById('f1Div').style;
	f1.lpos = parseInt(f1.left);
	f1.tpos = parseInt(f1.top);
	
	
	slide();
}

function slide()
{
	
	tastatur=window.event.keyCode;
	
	if(tastatur == 37)
	{	
	f1.lpos -= 5;
	f1.left  = f1.lpos;
	}
	
	if(tastatur == 39)
	{	
	f1.lpos += 5;
	f1.left  = f1.lpos;
	}
	
	if(tastatur == 38)
	{	
	f1.tpos += 5;
	f1.top  = f1.tpos;
	}
	
	if(tastatur == 40)
	{	
	f1.tpos -= 5;
	f1.top  = f1.tpos;
	}
	

	
}

</script>

<script for="document" event="onkeydown()" language="JScript" type="text/jscript">
 {
  init();
 }
</script>


    <div id="f1Div" style="position: absolute; left: 250px; top: 100px; width: 80px;"><img border="0" name="figur" src="picture/ks/menu/figur.png" width="200" height="200"></div></a>
    
    <br>
    <a href="index.php?site=admin&db=alex">Zur&uuml;ck</a>     


<?php
}

}else{
?>
    <a href="index.php?site=admin&db=alex&menu=1">Menu 1</a>
    <br>
    <a href="index.php?site=admin&db=alex&menu=2">Menu 2</a> 
    <br>
    <a href="index.php?site=admin&db=alex&menu=3">Menu 3</a>
<?php     
}
?> 