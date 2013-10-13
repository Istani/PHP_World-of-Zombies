<?php
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  $bg["title"]="World of Zombies";
  $bg["author"]="ZoDIkarus & ZoD-Istani";
  $bg["version"]="Version 0.13";

  $bg['sprache']="deutsch";

  $bg['vit_ausdauer_modifier']="20";
  $bg['str_schaden_modifier']="0.2";
  $bg['luck_drop_modifier']="15";
  $bg['next_drop_modifier']="0.60";

  $bg['ks_time']=3;

  // Rechnungen:
  // https://docs.google.com/spreadsheet/pub?key=0AityTNNaT9hQdGZ1Vnc4RXh1OEVVM2pSdHhNQ2hfY3c&output=html
  // Der Sicherheit wegen:
  foreach ($_COOKIE as $key => $value) {
    if (get_magic_quotes_gpc())
      $_COOKIE[$key]=stripslashes($value);
    $_COOKIE[$key]=mysql_real_escape_string($value);
  }
  foreach ($_POST as $key => $value) {
    if (get_magic_quotes_gpc())
      $_POST[$key]=stripslashes($value);
    $_POST[$key]=mysql_real_escape_string($value);
  }
  foreach ($_GET as $key => $value) {
    if (get_magic_quotes_gpc())
      $_GET[$key]=stripslashes($value);
    $_GET[$key]=mysql_real_escape_string($value);
  }
?>
