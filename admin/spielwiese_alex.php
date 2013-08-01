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
 <table border=1>
  <tr>
   <td>
    <input type="image" src="picture/blank.png" id="0" onKeyDown="getkey(event,this);">
   </td>
   <td>
    <input type="image" src="picture/blank.png" id="1" onKeyDown="getkey(event,this);">
   </td>
   <td>
    <input type="image" src="picture/blank.png" id="2" onKeyDown="getkey(event,this);">
   </td>  
  </tr>
    <tr>
   <td>
    <input type="image" src="picture/blank.png" id="3" onKeyDown="getkey(event,this);">
   </td>
   <td>
    <input type="image" src="picture/active.png" id="4" onKeyDown="getkey(event,this);">
   </td>
   <td>
    <input type="image" src="picture/blank.png" id="5" onKeyDown="getkey(event,this);">
   </td>
  </tr>
    <tr>
   <td>
    <input type="image" src="picture/blank.png" id="6" onKeyDown="getkey(event,this);">
   </td>
   <td>
    <input type="image" src="picture/blank.png" id="7" onKeyDown="getkey(event,this);">
   </td>
   <td>
    <input type="image" src="picture/blank.png" id="8" onKeyDown="getkey(event,this);">
   </td>
  </tr>
 </table>

   <script language="Javascript" type="text/javascript"><!--
   function getkey(event, obj){
	   switch(event.keyCode){

	   case 38: // oberer Pfeil
		   movesquare(obj, "up");
		   break;

	   case 39: // rechter Pfeil
		   movesquare(obj, "right");
		   break;

	   case 40: // unterer Pfeil
		   movesquare(obj, "down");
		   break;

	   case 37: // linker Pfeil
		   movesquare(obj, "left");
		   break;
       }
   }

   function movesquare(old_obj, direction){
	    var Cols = init_cols();
	    var Rows = init_rows(Cols);

	    // Markiertes Html-Objekt holen

	    var active_htmlobj = document.getElementById(old_obj.id);

	    // image-pfad angaben (musse escaped werden da in regexp benutzt wird) :S

	    var search_img_blank = /img\/blank\.png/;
	    var search_img_active = /img\/active\.png/;
	    var img_blank = "img/blank.png";
	    var img_active = "img/active.bpng";

		switch(direction)
		{
		case "right":
			for(var arr in Cols)
			{
				var active_pos = search_in_arr(active_htmlobj.id, Cols[arr])
				if (active_pos != -1 && active_htmlobj.src.search(search_img_active) != -1)
				{
					if((active_pos+1) < Cols[arr].length)
					{
						// wird verschoben
						active_htmlobj.src = img_blank;
						document.getElementById(parseInt(Cols[arr][active_pos]) + 1).src = img_active;
						document.getElementById(parseInt(Cols[arr][active_pos]) + 1).focus();
					}
					else
					{
						// auf anderer Seite einbleden
						active_htmlobj.src = img_blank;
						document.getElementById(Cols[arr][0]).src = img_active;
						document.getElementById(Cols[arr][0]).focus();
					}
				}

			}
			break;

		case "left":
			for(var arr in Cols)
			{
				var active_pos = search_in_arr(active_htmlobj.id, Cols[arr])
				if (active_pos != -1 && active_htmlobj.src.search(search_img_active) != -1)
				{
					if((active_pos-1) > -1)
					{
						// wird verschoben
						active_htmlobj.src = img_blank;
						document.getElementById(parseInt(Cols[arr][active_pos]) - 1).src = img_active;
						document.getElementById(parseInt(Cols[arr][active_pos]) - 1).focus();
					}
					else
					{
						// auf anderer Seite einbleden
						active_htmlobj.src = img_blank;
						document.getElementById(Cols[arr][parseInt(Cols[arr].length) -1]).src = img_active;
						document.getElementById(Cols[arr][parseInt(Cols[arr].length) -1]).focus();
					}
				}

			}
			break;

		case "up":
			for(var arr in Rows)
			{
				var active_pos = search_in_arr(active_htmlobj.id, Rows[arr]);

				if (active_pos != -1 && active_htmlobj.src.search(search_img_active) != -1)
				{
					if(active_pos - 1 > -1)
					{
						// wird verschoben
						active_htmlobj.src = img_blank;
						document.getElementById(parseInt(Rows[arr][active_pos-1])).src = img_active;
						document.getElementById(parseInt(Rows[arr][active_pos-1])).focus();
					}
					else
					{
						// auf anderer Seite einbleden
						active_htmlobj.src = img_blank;
						document.getElementById(Rows[arr][parseInt(Rows[arr].length) -1]).src = img_active;
						document.getElementById(Rows[arr][parseInt(Rows[arr].length) -1]).focus();
					}
				}

			}
			break;

		case "down":
			for(var arr in Rows)
			{
				var active_pos = search_in_arr(active_htmlobj.id, Rows[arr]);
				// alert(active_pos);

				if (active_pos != -1 && active_htmlobj.src.search(search_img_active) != -1)
				{
					if(active_pos + 1 < Rows[arr].length)
					{
						// wird verschoben
						active_htmlobj.src = img_blank;
						document.getElementById(parseInt(Rows[arr][active_pos+1])).src = img_active;
						document.getElementById(parseInt(Rows[arr][active_pos+1])).focus();
					}
					else
					{
						// auf anderer Seite einbleden
						active_htmlobj.src = img_blank;
						document.getElementById(Rows[arr][0]).src = img_active;
						document.getElementById(Rows[arr][0]).focus();
					}
				}

			}
			break;
		}

		function search_in_arr(value, arr){
			 for(var i = 0; i<arr.length; i++){
				 if (arr[i]==value){
					 return i;
				 }
			 }
		 return -1;
		}

		function cut_URL(ori_url)
		{
		 var new_url = "";
		 var split_url = ori_url.split("/");
		 for(var j = 0; j<3; j++)
		 {
		  new_url += split_url[j] + '/';
		 }
		 new_url = ori_url.substr(new_url.length,ori_url.length);
		 return new_url;
	 	}

		function init_rows(Cols) // füllt automatisiert Arrays mit den Reihen-nummern
	      {
	      var Rows = new Array(Cols[0].length); // Spalten = Cols[]

	      for (var i=0; i<Cols[0].length; i++)
	       {
	        Rows[i] = new Array(Cols.length);
	        for(var j=0; j<Cols.length; j++)
	         {
	          Rows[i][j] = Cols[j][i];
	         }
	       }
	       return (Rows);
	      }

	      function init_cols() // füllt automatisiert Arrays mit den Zeilen-nummern
	      {
	       var tr_obj = document.getElementsByTagName("tr");
	       var Cols = new Array(tr_obj.length);

	       for (var i=0; i<tr_obj.length; i++)
	        {
	         var td_obj = tr_obj[i].getElementsByTagName("td");
	         Cols[i] = new Array(td_obj.length);
	         for (var j=0; j<td_obj.length; j++)
	          {
	           Cols[i][j] = td_obj[j].getElementsByTagName("input")[0].id;
	          }
	        }
	       return (Cols);
	      }
	   }
 --></script>