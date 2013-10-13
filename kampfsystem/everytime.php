<?php
  //echo date("d.m.Y H:i:s", time());
  if (!isset($_GET['kampf'])) {
    die();
  }
  include("../_mysql.php");
  include("../_settings.php");
  include("../_functions.php");
  ignore_user_abort(true);

  //Hier reichen später auch 5 oder 10 oder so XD Weil das Problem ist das muss ja gespeichert und wieder ausgelesen und überschrieben werden
  $max_berechnungs_runden=10;
  // Beispielwert, muss später angepasst werden, wahrscheinlich einfach das höchste agi aus der Datenbank mal 5 oder so
  $agi_attack_rate=40;

  if (!file_exists($_GET['kampf']."_berechnung.tmp")) {
    $file_berechnung=fopen($_GET['kampf']."_berechnung.tmp", "w+");

    //Muss Kampf berechnet werden?
    $sql['kampf']="SELECT kampf_next FROM ks_main WHERE kampf_id=".$_GET['kampf'];
    $query['kampf']=mysql_query($sql['kampf']);
    $tmp_zeit=mysql_result($query['kampf'], 0, 0);
    if (time()>$tmp_zeit) {
      $sql['kampf']="UPDATE ks_main SET kampf_next=".(time()+$bg['ks_time'])." WHERE kampf_id=".$_GET['kampf'];
      mysql_query($sql['kampf']);

      $sql['spieler']="SELECT km_member_id,km_member_art, km_speed FROM ks_member WHERE km_kampf_id=".$_GET['kampf'];
      $query['spieler']=mysql_query($sql['spieler']);
      while ($row['spieler']=mysql_fetch_assoc($query['spieler'])) {
        $tmp_agi_wert[$row['spieler']['km_member_art']][$row['spieler']['km_member_id']]=$row['spieler']['km_speed'];
      }
      $runde=0;
      unlink($_GET['kampf']."_reihenfolge.tmp");
      while ($runde<=$max_berechnungs_runden) {
        //Agi Werte Addieren
        foreach ($tmp_agi_wert as $art => $tmp_array) {
          // Für Spieler
          foreach ($tmp_array as $tmp_id => $wert) {
            if ($art=="P") {
              $tmp_char=get_player_status($tmp_id);
              $tmp_agi_wert[$art][$tmp_id]+=$tmp_char['agi'];
            }
          }
        }

        //Vieh mit dem meisten Agi herrausfinden
        $vergleich_agi=0;
        $vergleich_id="";
        $vergleich_art="";
        foreach ($tmp_agi_wert as $art => $tmp_array) {
          foreach ($tmp_array as $tmp_id => $wert) {
            if ($wert>$vergleich_agi) {
              $vergleich_agi=$wert;
              $vergleich_id=$tmp_id;
              $vergleich_art=$art;
            }
          }
        }
        //ist das schon genug füt einen HIT
        if ($vergleich_agi>=$agi_attack_rate) {
          $file_reihenfolge=fopen($_GET['kampf']."_reihenfolge.tmp", "a");
          fputs($file_reihenfolge, $vergleich_art.'_'.$vergleich_id.";", strlen($vergleich_art.'_'.$vergleich_id.";"));
          fclose($file_reihenfolge);
          $tmp_agi_wert[$vergleich_art][$vergleich_id]=0;
          // Fertige Agi Werte in Kampfdatenbank speichern.
          // Nur für die 1. Runde speichern, dannach neuberechnung jede Runde!
          if ($runde==0) {
            foreach ($tmp_agi_wert as $art => $tmp_array) {
              foreach ($tmp_array as $tmp_id => $wert) {
                $sql['update_member']="UPDATE ks_member SET km_speed=".$wert." WHERE km_member_id=".$tmp_id." AND km_member_art='".$art."'";
                mysql_query($sql['update_member']);
              }
            }
          }
          $runde++;
        }
      }
      fclose($file_berechnung);
    } else {
      die();
    }
  }
  unlink($_GET['kampf']."_berechnung.tmp");


  $file_reihenfolge=fopen($_GET['kampf']."_reihenfolge.tmp", "r");
  while (($buffer=fgets($file_reihenfolge, 4096))!==false) {
    $leutz=explode(";", $buffer);
    foreach ($leutz as $key_leutz => $value_leutz) {
      $leutz2=explode("_", $value_leutz);
      if ($leutz2[0]=="P") {
        $tmp_leutz_daten=get_player_status($leutz2[1]);
        $ausgabe=$tmp_leutz_daten["name"];
        $pos=$key_leutz*120;
        ?><script type="text/javascript" >
                  if (init_bild == 1) {
                    context.drawImage(next, <?php echo $pos; ?>, 0);
                    context.font = "18px 'optimer'";
                    context.strokeStyle = "rgb(0,0,0)";
                    context.textAlign = 'left';
                    context.textBaseline = 'top';
                    context.fillStyle = 'white';
                    context.fillText(' <?php echo $ausgabe; ?>', <?php echo $pos; ?>, 0);
                    lebensbalken();
                  }
        </script>
        <?php
      }
    }
  }
  fclose($file_reihenfolge);
?>

