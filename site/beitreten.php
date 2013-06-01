<?php 
    if($_SESSION['guildName'] == ""){
    if($_GET['guild_id'] == ""){
        echo  "Du hast was falsch gemacht<br />"
            . "Bitten warten sie einen Moment. Sie werden automatisch weitergeleitet.<br />"
            . "Falls dies nicht der Fall seinen sollte.<br />"
            . "<a href='../index.php?site=guild'>Zur&uuml;ck</a>"
            . "<meta http-equiv='refresh' content='3; URL=../index.php?site=guild' />";     
    }else{
         
        $sql_query = "SELECT * FROM `guild_db` WHERE `guild_id` = '" . $_GET['guild_id'] . "'";
        $result = mysql_query($sql_query);
        $dsatz = mysql_fetch_assoc($result);
 ?>
    <center>         
    <table border="0" cellpadding="0" cellspacing="0" summary="">
    <tr>
        <td colspan="3" style="width: 300px;"><?php echo $dsatz['guild_name'] ;?></td>
        <td style="height: 25px; width: 25px;"><?php echo $dsatz['emblem'] ;?></td>
    </tr>
    <tr>
        <td colspan="3" style="height: 150px; width: 300px;"><?php echo $dsatz['guild_desc'] ;?></td>
    </tr>
    </table>
<form action="site/beitretencheck.php?gildenID=<?php echo $_GET['guild_id']; ?>&userID=<?php echo $_SESSION['userID']; ?>" method="post">
<table>
    <tr>
        <td style="width: 100px;"><input type="submit" value="Anfrage Abschicken"/></td>
    </tr>
</table>
</form>

<?php
}        
    }else{
        echo "Du bist schon in einer Gilde!";
    } 
 ?>
 </center>