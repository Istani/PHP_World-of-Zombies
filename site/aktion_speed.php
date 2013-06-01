<?php
    include("../_settings.php");
    include("../_mysql.php");
    $sql['check']="SELECT goldklumpen FROM `char` WHERE userID=".$_SESSION["userID"];
    $query['check']=mysql_query($sql['check']);
    $result=mysql_result($query['check'],0,0);
    if ($result>0) {
        $sql['user_aktion']="UPDATE `char`
                         SET  aktion_ende=0,
                              goldklumpen=goldklumpen-1
                         WHERE userID=".$_SESSION["userID"];
        mysql_query($sql['user_aktion']);
        echo "<center>";
        echo $_SESSION['loginName'] ." , du hast die Aktion beschleunigt.";
        echo "<br />";
        echo "Du wirst in 2 Sekunden weitegeleitet.";
        echo "<br />";
        echo "Sollte dies nicht der fall sein <a href='../index.php'>HIER KLICKEN</a>";
        echo '<meta http-equiv="refresh" content="2; URL=../index.php">';
        echo "</center>";
    } else {
        echo $_SESSION['loginName'] ." , du kannst diese Aktion nicht beschleunigt.";
        echo "<br />";
        echo "Du wirst in 2 Sekunden weitegeleitet.";
        echo "<br />";
        echo "Sollte dies nicht der fall sein <a href='../index.php'>HIER KLICKEN</a>";
        echo '<meta http-equiv="refresh" content="2; URL=../index.php">';
        echo "</center>";
    }
?>