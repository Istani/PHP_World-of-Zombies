<div id="kampf_laden"></div>
<table>
  <tr>
    <td>
      <?php
        // KS Main
        // Nur wenn neuer Kampf gestartet wird!
        //$sql['start']="INSERT INTO ks_main SET kampf_next=".(time()+30)."";
        //mysql_query($sql['start']);
        /* Member hinzufügen
          $sql['member']="INSERT INTO ks_member SET
          km_kampf_id=1,
          km_member_id=3,
          km_member_art='P',
          km_member_side=0,
          km_leben=100,
          km_speed=0";
          mysql_query($sql['member']);
         */
        $kampf_id=1; // Wird nachher natürlich irgendwie ausgelesen XD
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
        var mob;
        var wobinich = 0;
        var wobinich2 = 0;
        var wobinich3 = 0;
        var wobinich4 = 0;
        var wobinichmob = 0;
        var tiles = new Array();
        var tilesmob = new Array();
        var init_bild = 0;

        var $jq = jQuery.noConflict();

        function lade_kampf() {
          $jq("#kampf_laden").load("kampfsystem/everytime.php?kampf=<?php echo $kampf_id; ?>");
          window.window.setTimeout('lade_kampf()', 1000);
        }
        lade_kampf();

        function Nix() { /* gar nix weiter */
        }

        function bildinit() {
          canvas = document.getElementById("board");
          context = canvas.getContext("2d");

          canvas2 = document.getElementById("temp_board");
          context2 = canvas2.getContext("2d");


          var tileset = document.getElementById("tileset");
          var tilesetmob = document.getElementById("tilesetmob");
          var leer = document.getElementById("leer");
          var next = document.getElementById("leer");
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

          mob = canvas2.getContext("2d");
          mob.drawImage(tilesetmob, 0, 0);
          tilesmob[1] = mob.getImageData(0, 0, 24, 32);
          tilesmob[2] = mob.getImageData(24, 0, 24, 32);
          tilesmob[3] = mob.getImageData(48, 0, 24, 32);

          tilesmob[4] = mob.getImageData(0, 32, 24, 32);
          tilesmob[5] = mob.getImageData(24, 32, 24, 32);
          tilesmob[6] = mob.getImageData(48, 32, 24, 32);

          tilesmob[7] = mob.getImageData(0, 64, 24, 32);
          tilesmob[8] = mob.getImageData(24, 64, 24, 32);
          tilesmob[9] = mob.getImageData(48, 64, 24, 32);

          tilesmob[10] = mob.getImageData(0, 96, 24, 32);
          tilesmob[11] = mob.getImageData(24, 96, 24, 32);
          tilesmob[12] = mob.getImageData(48, 96, 24, 32);

          context.drawImage(leer, 0, 40);

          init_bild = 1;

          window.setTimeout("walking_animation1()", 1);
          window.setTimeout("walking_animation2()", 1);
          window.setTimeout("walking_animation3()", 1);
          window.setTimeout("walking_animation4()", 1);
          window.setTimeout("walking_mob1()", 1);
        }

        function walking_animation1() {
          if (wobinich == 1) {
            context.putImageData(tiles[10], 1000, 200);
          }
          if (wobinich == 2) {
            context.putImageData(tiles[11], 1000, 200);
          }
          if (wobinich == 3) {
            context.putImageData(tiles[12], 1000, 200);
          }
          if (wobinich == 4) {
            context.putImageData(tiles[11], 1000, 200);
            wobinich = 0;
          }
          window.setTimeout("walking_animation1()", 100);
          wobinich++;
        }

        function walking_animation2() {
          if (wobinich2 == 1) {
            context.putImageData(tiles[10], 1050, 220);
          }
          if (wobinich2 == 2) {
            context.putImageData(tiles[11], 1050, 220);
          }
          if (wobinich2 == 3) {
            context.putImageData(tiles[12], 1050, 220);
          }
          if (wobinich2 == 4) {
            context.putImageData(tiles[11], 1050, 220);
            wobinich2 = 0;
          }
          window.setTimeout("walking_animation2()", 200);
          wobinich2++;
        }

        function walking_animation3() {
          if (wobinich3 == 1) {
            context.putImageData(tiles[10], 1010, 250);
          }
          if (wobinich3 == 2) {
            context.putImageData(tiles[11], 1010, 250);
          }
          if (wobinich3 == 3) {
            context.putImageData(tiles[12], 1010, 250);
          }
          if (wobinich3 == 4) {
            context.putImageData(tiles[11], 1010, 250);
            wobinich3 = 0;
          }
          window.setTimeout("walking_animation3()", 300);
          wobinich3++;
        }

        function walking_animation4() {
          if (wobinich4 == 1) {
            context.putImageData(tiles[10], 1060, 270);
          }
          if (wobinich4 == 2) {
            context.putImageData(tiles[11], 1060, 270);
          }
          if (wobinich4 == 3) {
            context.putImageData(tiles[12], 1060, 270);
          }
          if (wobinich4 == 4) {
            context.putImageData(tiles[11], 1060, 270);
            wobinich4 = 0;
          }
          window.setTimeout("walking_animation4()", 400);
          wobinich4++;
        }

        function walking_mob1() {
          if (wobinichmob == 1) {
            context.putImageData(tilesmob[4], 100, 200);
          }
          if (wobinichmob == 2) {
            context.putImageData(tilesmob[5], 100, 200);
          }
          if (wobinichmob == 3) {
            context.putImageData(tilesmob[6], 100, 200);
          }
          if (wobinichmob == 4) {
            context.putImageData(tilesmob[5], 100, 200);
            wobinichmob = 0;
          }
          window.setTimeout("walking_mob1()", 200);
          wobinichmob++;
        }

      </script>
      <canvas id="board" width="1200" height="360" style="border:1px white solid">Dieser Browser ist nicht geeignet.</canvas>
      <canvas id="temp_board" width="1000" height="1000"  style="position:absolute;top:-3000px;visibility:hidden;">Dieser Browser ist nicht geeignet.</canvas>
      <img id="leer" src="picture/ks/background/0.jpg" style="visibility:hidden;">
      <img id="tileset" src="picture/ks/charset/0_0_0.png" style="visibility:hidden;" OnLoad="bildinit();">
      <img id="tilesetmob" src="picture/ks/mobs/1.png" style="visibility:hidden;" OnLoad="bildinit();">
      <img id="next" src="picture/ks/next.png" style="visibility:hidden;">

    </td>
  </tr>
</table>