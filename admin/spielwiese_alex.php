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
 
var speed = 1;
var left = 200;
var top = 200;
function TasteGedrueckt(Ereignis) {
    if (!Ereignis)
    Ereignis = window.event;
    if (Ereignis.which) {
        Tastencode = Ereignis.which;
    } else if (Ereignis.keyCode) {
        Tastencode = Ereignis.keyCode;
    }
    
    //links
      if(Tastencode == 65){
        for(i=0;i<speed;i++){
          window.setTimeout("go(1)", i*100);
        }
      }  
      //rechts
      if(Tastencode == 68){
        for(i=0;i<speed;i++){
          window.setTimeout("go(2)", i*100);
        }
      } 
      //hoch
      if(Tastencode == 87){
        for(i=0;i<speed;i++){
          window.setTimeout("go(3)", i*100);
        }
      } 
      //runter
      if(Tastencode == 83){
        for(i=0;i<speed;i++){
          window.setTimeout("go(4)", i*100);
        }
      }
}

function go(richtung){ 
  //links
  if(richtung == 1){
    left = left - 1;
    document.getElementById("player").style.marginLeft = left + "px";
  }
                      //rechts
  if(richtung == 2){
    left = left + 1;
    document.getElementById("player").style.marginLeft = left + "px";
  }
  //hoch
  if(richtung == 3){
    top = top - 1;
    document.getElementById("player").style.marginTop = top + "px";
  }
  //runter
  if(richtung == 4){
    top = top + 1;
    document.getElementById("player").style.marginTop = top + "px";
  }
}

document.onkeydown = TasteGedrueckt;

?>