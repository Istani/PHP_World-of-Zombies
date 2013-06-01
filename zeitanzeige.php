<?php
include("_settings.php");
include("_mysql.php");
include("_functions.php");

$dsatz["aktion_start"]=$_GET['start'];
$dsatz["aktion_ende"]=$_GET['ende'];
?>
<table width="100%">
    <tr>
        <td colspan="2"><b><?php echo text_ausgabe("dauer", 0, $bg['sprache']) ?></b></td>
    </tr>
    <tr>
        <td>Zeit:</td>
        <td class="tdright"><?php echo zeit_anzeigen($dsatz["aktion_ende"]-time()); ?></td>
    </tr>
    <!-- Platzhalter zwischen den Tabellen -->
    <tr><td><br /></td></tr>
    <!-- Platzhalter zwischen den Tabellen -->
    <tr>
        <td colspan="2" class="tdcenter">
            <?php
            $min=$dsatz["aktion_start"];
            $value=time();
            $max=$dsatz["aktion_ende"];

            $max=$max-$min;
            $value=$value-$min;
            $min=$min-$min;
            ?>
            <script>
                var $jq = jQuery.noConflict();
                $jq(function() {
                    $jq( "#progressbar" ).progressbar({
                        value: <?php echo $value; ?>,
                        max: <?php echo $max; ?>
                    });
                });
            </script>
            <div id="progressbar"></div>
            <?php
            if ($value==$max) {
                ?>
                <script type="text/javascript">
					location.reload();
				</script>';
                <?php
            }
            ?>
        </td>
    </tr>
</table>