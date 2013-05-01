<?php
    include("../_settings.php");
    include("../_mysql.php");
    $sql['user_aktion']="UPDATE `char`
                                        SET aktion='',
                                            aktion_id=0,
                                            aktion_start=0,
                                            aktion_ende=0
                                        WHERE userID=".$_SESSION["userID"];
    mysql_query($sql['user_aktion']);
    echo "<center>";
    echo $_SESSION['loginName'] ." , du hast die Aktion abgebrochen.";
    echo "<br />";
    echo "Du wirst in 2 Sekunden weitegeleitet.";
    echo "<br />";
    echo "Sollte dies nicht der fall sein <a href='../index.php'>HIER KLICKEN</a>";
    echo '<meta http-equiv="refresh" content="2; URL=../index.php">';
    echo "</center>";
?>