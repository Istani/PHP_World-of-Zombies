<?php
	if (!isset($_COOKIE["loginName"])) {$_COOKIE["loginName"]="";}
	if (!isset($_COOKIE["passwort"])) {$_COOKIE["passwort"]="";}
    $sql_query = "SELECT * FROM login WHERE `loginName` = '" . $_COOKIE["loginName"] . "' and `passwort` = '".$_COOKIE["passwort"]."'";
    $result = mysql_query($sql_query);
    $dsatz = @mysql_fetch_assoc($result);
    
    if(isset($dsatz["loginName"])){
    
		$_SESSION["loginName"] = $dsatz["loginName"];
		$_SESSION["userID"] = $dsatz["userID"];
        
        $sql_query = "UPDATE login SET lastLogin = ".time()." WHERE loginName = '" . $_COOKIE["loginName"] . "' and passwort = '".$_COOKIE["passwort"]."'";
		mysql_query($sql_query);		
        
        $sql_query1 = "SELECT * FROM `char` WHERE `userID` = '" . $dsatz["userID"] . "'";
        $result1 = mysql_query($sql_query1);
        $dsatz1 = @mysql_fetch_assoc($result1);
		
		$_SESSION["guildName"] = $dsatz1["gilde"];
		
	}
?>