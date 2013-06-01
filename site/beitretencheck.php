<?php  
	include("../_settings.php");
	include("../_mysql.php");
	
    if($_GET['userID'] == ""){
        echo  "Du hast was falsch gemacht<br />"
            . "Bitten warten sie einen Moment. Sie werden automatisch weitergeleitet.<br />"
            . "Falls dies nicht der Fall seinen sollte.<br />"
            . "<a href='../index.php?site=guild'>Zur&uuml;ck</a>"
            . "<meta http-equiv='refresh' content='3; URL=../index.php?site=guild' />";
   
    }else{

        $sql_query = "SELECT * FROM `login` WHERE `userID` = '" . $_GET['userID'] . "'";
        $result = mysql_query($sql_query);
        $dsatz = mysql_fetch_assoc($result);
        
        $sql_query2 = "SELECT * FROM `guild_db` WHERE `guild_id` = '" . $_GET['gildenID'] . "'";
        $result2 = mysql_query($sql_query2);
        $dsatz2 = mysql_fetch_assoc($result2);       
        
        $leader = $dsatz2['guild_master'];
        
		$erlauben='<a href="site/join.php?erlauben=ja&gildenid='.$_GET['gildenID'].'&id='.$_GET['userID'].'&leader='.$leader.'&name='.$dsatz['loginName'].'">Zur Gilde hinzuf&uuml;gen</a>';
		$verbieten='<a href="site/join.php?erlauben=nein&gildenid='.$_GET['gildenID'].'&id='.$_GET['userID'].'&leader='.$leader.'&name='.$dsatz['loginName'].'">Nicht hinzuf&uuml;gen</a>';
		
        $sql_anfrage = "INSERT INTO `nachricht_eingang`
				SET
					`sender`		=	'" . $_GET["userID"] . "',
					`empfaenger`	=	'".$leader."',
					`zeit`          =	'" . time() ."',
					`status`		=	'0',
					`betreff`		=	'Gilden Beitritt',
					`nachricht`	    =	'" . $dsatz['loginName'] . " m&ouml;chte der Gilde beitreten. <br />" . $erlauben . " &nbsp; " . $verbieten . "'
					";
		mysql_query($sql_anfrage);
		
		$sql_anfrage = "INSERT INTO `nachricht_ausgang`
				SET
					`sender`		=	'" . $_GET["userID"] . "',
					`empfaenger`	=	'".$leader."',
					`zeit`          =	'" . time() ."',
					`status`		=	'0',
					`betreff`		=	'Gilden Beitritt',
					`nachricht`	    =	'" . $dsatz['loginName'] . " m&ouml;chte der Gilde beitreten. <br />'
					";
        mysql_query($sql_anfrage);
        echo "Deine anfrage wurde erfolgreich verschickt";
?>
        <meta http-equiv='refresh' content='3; URL=../index.php?site=guild' />
<?php  
    }
?>