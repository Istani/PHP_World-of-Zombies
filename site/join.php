<?php 
	include("../_settings.php");
	include("../_mysql.php");
 
        $sql_guild = "SELECT * FROM `guild_db` WHERE `guild_id` = '" . $_GET['gildenid'] . "'";
        $result = mysql_query($sql_guild);
        $dsatz = mysql_fetch_assoc($result);
       
        $sql_guild1 = "SELECT * FROM `char` WHERE `userID` = '" . $_GET['id'] . "'";
        $result1 = mysql_query($sql_guild1);
        $dsatz1 = mysql_fetch_assoc($result1);
        
if($dsatz1['gilde'] == ""){       	
if($_GET['erlauben'] == "ja"){      
            $sql_char = "UPDATE `char` 
                            SET `gilde` = '" . $dsatz['guild_name'] . "'
                            WHERE `userID` = '".$_GET['id']."'
                            ";
            mysql_query($sql_char);
            
            $sql_query = "INSERT INTO `guild_ranking`
				SET
					`guild_id`     =   '" . $_GET['gildenid'] . "',
					`title`        =   '1',
					`userID`       =   '" . $_GET['id'] . "'
                    ";
            mysql_query($sql_query);
            
            $sql_chat = "INSERT INTO `guild_chat`
				SET
					`guild_id`     =   '" . $_GET['gildenid'] . "',
					`time`         =   '" . time() . "',
					`nachricht`    =   '" . $_GET['name'] . " ist der Gilde beigetreten!',
					`poster`       =   '" . $_GET['leader'] . "'
                    ";
            mysql_query($sql_chat);
            
            $sql_anfrage = "INSERT INTO `nachricht_eingang`
				SET
					`sender`		=	'".$_GET['leader']."',
					`empfaenger`	=	'".$_GET['id']."',
					`zeit`          =	'" . time() ."',
					`status`		=	'0',
					`betreff`		=	'RE: Gilden Beitritt',
					`nachricht`	    =	'Okay du bist dabei! Klick auf Gilde in der Navigation!'
					";
		  mysql_query($sql_anfrage);

		  $sql_anfrage = "INSERT INTO `nachricht_ausgang`
				SET
					`sender`		=	'".$_GET['leader']."',
					`empfaenger`	=	'".$_GET['id']."',
					`zeit`          =	'" . time() ."',
					`status`		=	'0',
					`betreff`		=	'RE: Gilden Beitritt',
					`nachricht`	    =	'Okay du bist dabei! Klick auf Gilde in der Navigation!'
					";
            mysql_query($sql_anfrage);

}
if($_GET['erlauben'] == "nein"){
        $sql_anfrage = "INSERT INTO `nachricht_eingang`
				SET
					`sender`		=	'".$_GET['leader']."',
					`empfaenger`	=	'".$_GET['id']."',
					`zeit`          =	'" . time() ."',
					`status`		=	'0',
					`betreff`		=	'RE: Gilden Beitritt',
					`nachricht`	    =	'Es tut uns leid, du wirst nicht in der Gilde aufgenommen!'
					";
		mysql_query($sql_anfrage);

		$sql_anfrage = "INSERT INTO `nachricht_ausgang`
				SET
					`sender`		=	'".$_GET['leader']."',
					`empfaenger`	=	'".$_GET['id']."',
					`zeit`          =	'" . time() ."',
					`status`		=	'0',
					`betreff`		=	'RE: Gilden Beitritt',
					`nachricht`	    =	'Es tut uns leid, du wirst nicht in der Gilde aufgenommen!'
					";
        mysql_query($sql_anfrage);

    }
?>
        <meta http-equiv='refresh' content='0; URL=../index.php?site=guild' />
<?php
}else{
?>
        Dieser Benutzer ist schon in einer Gilde!        
        <meta http-equiv='refresh' content='3; URL=../index.php?site=guild' />

<?php
}
?>