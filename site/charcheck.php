<?php
include("../_settings.php");
include("../_mysql.php");

     //Hier wird überprüft welche Klasse ausgewählt wurde
    if (isset($_POST['class_1'])){
			$sql_differenz="
				`klasse`		    =	'1',
				`gesundheit`		=	'100',
			";
			 
        }
    if (isset($_POST['class_2'])){
			$sql_differenz="
				`klasse`		    =	'2',
				`gesundheit`		=	'125',
			";
        }
    if (isset($_POST['class_3'])){
			$sql_differenz="
				`klasse`		    =	'3',
				`gesundheit`		=	'150',
				";
        } 	
	if ($sql_differenz!="") {
	$sql_query = "INSERT INTO `char` 
				SET 
					`userID`		=	'" . $_SESSION["userID"] . "',  
					".$sql_differenz."
					`geld`			=	'1000',
					`nahkampf`		=	'1',
					`nahrung`		=	'100',
					`wasser`		=	'100',
					`goldklumpen`	=	'10',
					`rucksack`	=	'2'
					";
    mysql_query($sql_query);
        //setzten der Session
        $sql_query = "SELECT * FROM `char` WHERE `userID` = '" . $_SESSION['userID'] . "'";
        $result = mysql_query($sql_query);
        $dsatz = mysql_fetch_assoc($result);

        if(isset($dsatz["klasse"])){
            $_SESSION["class"] = $dsatz["klasse"];
            }
		inventory_add($_SESSION['userID'], 5, 10);
		inventory_add($_SESSION['userID'], 6, 10);
		
        
        // Nach erfolreicher char Erstellung Weiterleiten zu Index.php
		
        echo "<center>";
        echo $_SESSION['loginName'] ." , du hast ein Charakter erfolgreich gespeichert.";
        echo "<br />";
        echo "Du wirst in 2 Sekunden weitegeleitet.";
        echo "<br />";
        echo "Sollte dies nicht der fall sein <a href='../index.php'>HIER KLICKEN</a>";
        echo '<meta http-equiv="refresh" content="2; URL=../index.php">';
        echo "</center>";
	}
?>