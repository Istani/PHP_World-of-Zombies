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

<script language="JavaScript" type="text/javascript">
<!--
function init(){
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

//-->
</script>
<script for="document" event="onkeydown()" language="JScript" type="text/jscript">
<!--
 {
  init();
 }
//-->
</script>

     <div id="f1Div" style="position: absolute; left: 50px; top: 200px; width: 30px;"><img border="0" name="figur" src="picture/ks/menu/figur.png" width="180" height="180"></div></a>