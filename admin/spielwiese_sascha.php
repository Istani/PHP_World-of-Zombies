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
          km_member_npc_side=0,
          km_npc_leben=100,
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
        var tiles = new Array();
        var tilesmob = new Array();
        var init_bild = 0;

        var npc_leben_max = new Array();
        var npc_leben = new Array();
        var npc_pos_x = new Array();
        var npc_pos_y = new Array();
        var npc_side = new Array();
        var npc_art = new Array();
        var npc_id = new Array();
        var npc_stand = new Array();
        var npc_animation = new Array();

<?php
  $sql['kampf']="SELECT * FROM ks_member WHERE km_kampf_id=".$kampf_id;
  $query['kampf']=mysql_query($sql['kampf']);
  $i=1;
  while ($row['kampf']=mysql_fetch_assoc($query['kampf'])) {
    echo 'npc_leben['.$i.']='.$row['kampf']['km_leben'].";\n";
    echo 'npc_leben_max['.$i.']='.$row['kampf']['km_maxleben'].";\n";
    echo 'npc_pos_x['.$i.']='.$row['kampf']['km_pos_x'].";\n";
    echo 'npc_pos_y['.$i.']='.$row['kampf']['km_pos_y'].";\n";
    echo 'npc_side['.$i.']='.$row['kampf']['km_member_side'].";\n";
    echo 'npc_art['.$i.']="'.$row['kampf']['km_member_art']."\";\n";
    echo 'npc_id['.$i.']='.$row['kampf']['km_member_id'].";\n";
    echo 'npc_stand['.$i.']=0'.";\n";
    echo 'npc_animation['.$i.']=0'.";\n";
    $i++;
  }
  $array_laenge=$i-1;
?>

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

          window.setTimeout("animation()", 1);
        }

        function animation() {
          lebensbalken();
          var temp_tiles;
          var length = <?php echo $array_laenge; ?>;
          for (var i = 1; i <= length; i++) {
            if (npc_art[i] == 'M') {
              temp_tiles = tilesmob;
            } else {
              temp_tiles = tiles;
            }
            if (npc_animation[i] == 0) { // Stand - Idel Animation
              if (npc_side[i] == 1) {
                if (npc_stand[i] == 1) {
                  context.putImageData(temp_tiles[10], npc_pos_x[i], npc_pos_y[i]);
                }
                if (npc_stand[i] == 2) {
                  context.putImageData(temp_tiles[11], npc_pos_x[i], npc_pos_y[i]);
                }
                if (npc_stand[i] == 3) {
                  context.putImageData(temp_tiles[12], npc_pos_x[i], npc_pos_y[i]);
                }
                if (npc_stand[i] == 4) {
                  context.putImageData(temp_tiles[11], npc_pos_x[i], npc_pos_y[i]);
                  npc_stand[i] = 0;
                }
              } else {
                if (npc_stand[i] == 1) {
                  context.putImageData(temp_tiles[4], npc_pos_x[i], npc_pos_y[i]);
                }
                if (npc_stand[i] == 2) {
                  context.putImageData(temp_tiles[5], npc_pos_x[i], npc_pos_y[i]);
                }
                if (npc_stand[i] == 3) {
                  context.putImageData(temp_tiles[6], npc_pos_x[i], npc_pos_y[i]);
                }
                if (npc_stand[i] == 4) {
                  context.putImageData(temp_tiles[5], npc_pos_x[i], npc_pos_y[i]);
                  npc_stand[i] = 0;
                }
              }
            }
            npc_stand[i]++;
          }
          window.setTimeout("animation()", 200);
        }
        function lebensbalken() {
          var length = <?php echo $array_laenge; ?>;
          for (var i = 1; i <= length; i++) {
            context.font = "18px 'optimer'";
            context.strokeStyle = "rgb(0,0,0)";
            context.textAlign = 'left';
            context.textBaseline = 'top';
            context.fillStyle = 'red';
            context.fillText(npc_leben[i] + '/' + npc_leben_max[i], npc_pos_x[i] - 10, npc_pos_y[i] - 20);
          }
        }

      </script>
      <canvas id="board" width="1200" height="360" style="border:1px white solid">Dieser Browser ist nicht geeignet.</canvas>
      <canvas id="temp_board" width="1000" height="1000"  style="position:absolute;top:-3000px;visibility:hidden;">Dieser Browser ist nicht geeignet.</canvas>

    </td>
  </tr>
</table>
<table>
  <tr>
    <td>

    </td>
    <td>

    </td>
    <td>
      <?php
        // Skills
      ?>
    </td>
  </tr>
</table>


<img id="leer" src="picture/ks/background/0.jpg" style="visibility:hidden;">
<img id="tileset" src="picture/ks/charset/0_0_0.png" style="visibility:hidden;" OnLoad="bildinit();">
<img id="tilesetmob" src="picture/ks/mobs/1.png" style="visibility:hidden;" OnLoad="bildinit();">
<img id="next" src="picture/ks/next.png" style="visibility:hidden;">