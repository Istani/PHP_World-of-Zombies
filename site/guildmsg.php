<?php
include("../_settings.php");
include("../_mysql.php");

    //Gilden check
    $sql_query = "SELECT * FROM guild_db WHERE `guild_name` = '" . $_SESSION['guildName'] . "'";
    $result = mysql_query($sql_query);
    $dsatz = mysql_fetch_assoc($result);

    $guildid    =   $dsatz['guild_id'];

    // Hier wird �berpr�ft ob alle Felder ausgef�llt sind
    if (isset($_POST['guildmsg'])){
    if (!$_POST['guildmsg']){
        $_POST['guildmsg']  =   "&nbsp;";
            }else{
            $sql_query = "INSERT INTO `guild_chat`
				SET
					`guild_id`='$guildid',
					`time`='" . time() . "',
					`nachricht`='" . $_POST['guildmsg'] . "',
					`poster`='" . $_SESSION['userID'] . "'
                    ";
            mysql_query($sql_query);

        // Nach erfolreicher Registrierung Weiterleiten zu Guild.php
        echo '<meta http-equiv="refresh" content="0; URL=../index.php?site=guild">';
    }
}
?>