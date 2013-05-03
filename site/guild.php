<?php
if (isset ($_POST['guild_desc'])){
        $sql_query1 = "SELECT `guild_db`.*, `login`.`loginName` FROM `guild_db` LEFT JOIN `login` ON `guild_db`.`guild_master`=`login`.`userID` WHERE `guild_db`.`guild_name` = '" . $_SESSION['guildName'] . "'";
        $result1 = mysql_query($sql_query1);
        $dsatz1 = mysql_fetch_assoc($result1);

        $guildid    =   $dsatz1['guild_id'];

        $sql_query_desc = "UPDATE `guild_db`
				SET
					`guild_desc` = '" . $_POST["guild_desc"] . "'
				WHERE
				     `guild_id` = '$guildid'";
        mysql_query($sql_query_desc);
         
    if($_SESSION['guildName'] != ""){

 //Gilden check
    $sql_query = "SELECT `guild_db`.*, `login`.`loginName` FROM `guild_db` LEFT JOIN `login` ON `guild_db`.`guild_master`=`login`.`userID` WHERE `guild_db`.`guild_name` = '" . $_SESSION['guildName'] . "'";
    $result = mysql_query($sql_query);
    $dsatz = mysql_fetch_assoc($result);
    
    $guildid    =   $dsatz['guild_id'];
    $guilddesc  =   $dsatz['guild_desc'];
 }   
?>
        <div id="tabs">
  <ul>
      <li><a href="#tabs-1">Übersicht</a></li>
      <li><a href="#tabs-2">Chat</a></li>
      <li><a href="#tabs-3">Memberliste</a></li>
  </ul>
  <div id="tabs-1">
<form method="post">
<table border="1" cellpadding="0" cellspacing="0" summary="">
    <tr>
        <td style="width: 100px;">Gilde:</td>
        <td colspan="3" style="width: 300px;"><?php echo $_SESSION['guildName'] ;?></td>
        <td style="width: 100px;">Leader:</td>
        <td style="width: 100px;"><?php echo $dsatz['loginName']; ?></td>
    </tr>
    <tr>
        <td style="height: 25px; width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
    </tr>
    <tr>
        <td style="height: 100px; width: 100px;">Skills:</td>
        <td style="width: 100px;">Skill 1</td>
        <td style="width: 100px;">Skill 2</td>
        <td style="width: 100px;">Skill 3</td>
        <td style="width: 100px;">Skill 4</td>
        <td style="width: 100px;">Skill 5</td>
    </tr>
    <tr>
        <td style="height: 25px; width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
    </tr>
    <tr>
        <td style="height:20px; width: 100px;">Info</td>
        <td style="width: 100px;">Info</td>
        <td style="width: 100px;">Info</td>
        <td style="width: 100px;">Info</td>
        <td style="width: 100px;">Info</td>
        <td style="width: 100px;">Info</td>
    </tr>
    <tr>
        <td style="height: 25px; width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3" style="height:50px; width: 300px;">Gildenbeschreibung:</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
        <td style="width: 100px;">&nbsp;</td>
    </tr>
<?php  
    if($dsatz['loginName'] == $_SESSION['loginName']){
?>
    <tr>
        <td colspan="6" style="height: 300px; width: 600px;"><textarea name="guild_desc" cols="80" rows="15"><?php echo $guilddesc; ?></textarea></td>
    </tr>
    <tr>
        <td colspan="6" style="height: 25px; width: 600px;"><input type="submit" name="guild_desc" value="Speichern"> </td>
    </tr>
<?php  
        }else{
?>    
    <tr>
        <td colspan="6" style="height: 300px; width: 600px;"><?php echo $guilddesc; ?></td>
    </tr>
    
<?php 
    }
?>
</table>
</form>
    </div>
    <div id="tabs-2">
<table>
<?php
    //Gilden check
    $sql_query1 = "SELECT `guild_chat`.*, `login`.`loginName` FROM `guild_chat` LEFT JOIN `login` ON `guild_chat`.`poster`=`login`.`userID` WHERE `guild_chat`.`guild_id` = '$guildid' ORDER BY `time` ";
    $result1 = mysql_query($sql_query1);

$i = 1;
while($row = mysql_fetch_array($result1)){
	if ($row['poster']==$_SESSION['userID']) {
		echo '<tr class="tr_bg">';
	} else {
		echo '<tr>';
	}
    ?>
        <td style="text-align: center; vertical-align: middle; width:100px;"><?php echo date("d.m.Y H:i:s",$row['time']) ;?></td>
        <?php if ($row['loginName']=="") {$row['loginName']="gelöschter Benutzer";} ?>
        <td style="text-align: center; vertical-align: middle; width:150px;"><?php echo $row['loginName'] ;?></td>
        <td style="text-align: center; vertical-align: middle; width:300px;"><?php echo $row['nachricht'] ;?></td>
    </tr>
  <?php
$i++;
}
?>

</table>
<form action="site/guildmsg.php" method="post">
    <table>
        <tr>
            <td><input placeholder="Deine Nachricht" maxlength="500" size="65" name="guildmsg" type="text" /></td>
            <td><input type="submit" value="Absenden"/></td>
        </tr>
    </table>
</form>

</div>

    <div id="tabs-3">
    <table border="1">
        <tr>
            <td style="text-align: center; vertical-align: middle; width:100px;">Rang:</td>
            <td style="text-align: center; vertical-align: middle; width:150px;">Username:</td>
        </tr>
    <?php
    //Gilden check
    $sql_query2 = "SELECT `guild_ranking`.*, `login`.`loginName` FROM `guild_ranking` LEFT JOIN `login` ON `guild_ranking`.`userID`=`login`.`userID` WHERE `guild_ranking`.`guild_id` = '$guildid' ORDER BY `title` DESC ";
    $result2 = mysql_query($sql_query2);

    $i = 1;
    
    while($row2 = mysql_fetch_array($result2)){
	   if ($row2['userID']==$_SESSION['userID']) {
		  echo '<tr class="tr_bg">';
	   } else {
		  echo '<tr>';
	   }
        switch($row2['title']){
            case "3": $guildtitle = "Leader";
            break;
            case "2": $guildtitle = "Offizier";
            break;
            case "1": $guildtitle = "Member";
            break;
        }
        ?>
            <td style="text-align: center; vertical-align: middle; width:100px;"><?php echo $guildtitle; ?></td>
            <td style="text-align: center; vertical-align: middle; width:150px;"><?php echo $row2['loginName'] ;?></td>
        </tr>
    <?php
    $i++;
    }
    ?>

    </table>
    </div>
</div>
    <script>
        var $jq = jQuery.noConflict();
        $jq(function() {
            $jq( "#tabs" ).tabs();
        });
    </script>
<?php 
        }else{
?>        
    <table border="1">
    <tr>
        <td style="text-align: center; vertical-align: middle; width:100px;">Rang:</td>
        <td style="text-align: center; vertical-align: middle; width:225px;">Gilde:</td>
        <td style="text-align: center; vertical-align: middle; width:25px;">Emblem:</td>
        <td style="text-align: center; vertical-align: middle; width:150px;">Leader:</td>
        <td style="text-align: center; vertical-align: middle; width:100px;">Beitreten</td>
    </tr>
<?php
    //Gilden Check für ladder
    $sql_query3 = "SELECT `guild_db`.*, `login`.`loginName` FROM `guild_db` LEFT JOIN `login` ON `guild_db`.`guild_master`=`login`.`userID`";
    $result3 = mysql_query($sql_query3);

    $i = 1;

    while($row3 = mysql_fetch_array($result3)){
        ?>
        <tr>
            <td style="text-align: center; vertical-align: middle; width:100px;"><?php echo $i; ?></td>
            <td style="text-align: center; vertical-align: middle; width:225px;"><?php echo $row3['guild_name'] ;?></td>
            <td style="text-align: center; vertical-align: middle; width:25px;"><?php echo $row3['emblem'] ;?></td>
            <td style="text-align: center; vertical-align: middle; width:150px;"><?php echo $row3['loginName'] ;?></td>
            <td style="text-align: center; vertical-align: middle; width:100px;"><a href="index?site=beitreten&guild_id=<?php echo $row3['guild_id']; ?>">Beitreten</a></td>
        </tr>
    <?php
    $i++;
    }
?>
</table>
<br />
<!-- Registration der Gilde -->   
<form action="site/guildcheck.php" method="post">
    <table border="0" width="375">
        <tr>
            <td colspan="2" align="center"><h3>- Gilde erstellen -</h3></td>
            </tr>
        <tr>
            <td colspan="2" align="center">Hier kannst du dir eine Gilde erstellen.</td>
            </tr>
<!-- Platzhalter zwischen den Tabellen -->
    <tr><td><br /></td></tr>
<!-- Platzhalter zwischen den Tabellen -->
        <tr>
            <td><p>Gildenname:</p></td>
            <td align="right"><input maxlength="50" size="25" name="guildname" type="text" /></td>
            </tr>
<!-- Platzhalter zwischen den Tabellen -->           
    <tr><td><br /></td></tr>             
<!-- Platzhalter zwischen den Tabellen -->        
        <tr>
            <td><p>Gilden k&uuml;rzel:</p></td>
            <td align="right"><input maxlength="6"  size="25" name="kurz" type="text" /></td>
            </tr>

<!-- Platzhalter zwischen den Tabellen -->            
    <tr><td><br /></td></tr>
<!-- Platzhalter zwischen den Tabellen -->     
        <tr>
            <td colspan="2" align="center"><input type="image" src="picture/btn_ok.png" onsubmit="submit-form()"/></td>
            </tr>
            
    </table>
</form>
<?php 
}
 ?>