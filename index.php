<?php
  include("_mysql.php");
  include("_settings.php");
  include("_functions.php");
  include("site/_check.php");
  include("site/cookiecheck.php");
  if (isset($_SESSION['userID'])) {
    $get_lastaktion="SELECT lastAktion FROM login WHERE userID=".$_SESSION['userID'];
    $query_lastaction=mysql_query($get_lastaktion);
    $lastaktion=mysql_result($query_lastaction, 0, 0);
    if ($lastaktion>=time()-300) {
      $differenz=time()-$lastaktion;
      $update_onlinetime="UPDATE login SET onlineTimer=onlineTimer+".$differenz." WHERE userID=".$_SESSION['userID'];
      mysql_query($update_onlinetime);
    }
    $set_lastaktion="UPDATE login SET lastAktion=".time()." WHERE userID=".$_SESSION['userID'];
    mysql_query($set_lastaktion);
  }

  /*
    $string='a:2:{s:8:"get_item";b:1;s:4:"item";a:3:{i:1;a:4:{s:2:"id";i:1000;s:5:"menge";i:5;s:7:"quality";i:1000;s:5:"level";i:1000;}i:2;a:2:{s:2:"id";i:1;s:5:"menge";i:5;}i:3;a:2:{s:2:"id";i:2;s:5:"menge";i:5;}}}';
    $string='a:2:{s:8:"get_item";b:1;s:4:"item";a:1:{i:1;a:4:{s:2:"id";i:1000;s:5:"menge";i:5;s:7:"quality";i:1000;s:5:"level";i:1000;}}}';
    $bla=unserialize($string);
    $bla["get_item"]=true;
    $bla["item"][1]['id']=1000;
    $bla["item"][1]['menge']=5;
    $bla["item"][1]['quality']=1000;
    $bla["item"][1]['level']=1000;
    $bla["item"][2]['id']=1;
    $bla["item"][2]['menge']=5;
    $bla["item"][3]['id']=2;
    $bla["item"][3]['menge']=5;
    echo '<pre>';
    var_dump($bla);
    echo '</pre>';
    $string=serialize($bla);
    echo $string;
   */
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Browser Game" />
    <meta name="author" content="zod-clan.de" />
    <meta name="keywords" content="Browsergame, bg, game, spiel, frei, kostenlos, zod, zod-clan.de, clan, Ikarus, Online" />
    <meta name="copyright" content="Copyright &copy; 2013 by <?php echo $bg["author"]; ?>" />
    <meta name="generator" content="<?php echo $bg["author"]; ?>" />
    <title><?php echo $bg['title']; ?></title>
    <link href="_stylesheet.css" rel="stylesheet" type="text/css" />
    <?php
      ob_start();
      include("_javascript.php");
    ?>
  </head>
  <body>
    <table class="page">
      <tr>
        <td>
          <?php include("inc/header.php"); ?>
        </td>
      </tr>
      <tr>
        <td class="leiste">
          <?php include("inc/bar.php"); ?>
        </td>
      </tr>
      <tr>
        <td>
          <div class="ui-tabs ui-widget ui-widget-content ui-corner-all">
            <?php include("inc/content.php"); ?>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="ui-tabs ui-widget ui-widget-content ui-corner-all">
            <?php
              include("inc/footer.php");
              $page_ausdgabe=ob_get_contents();
              ob_end_clean();
              echo $page_ausdgabe;
            ?>
          </div>
        </td>
      </tr>
    </table>
  </body>
</html>
