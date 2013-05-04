<?php
if (!isset($_GET['site'])) {$_GET['site']="";}
if (!isset($_GET['map'])) {$_GET['map']="";}

if (!isset($_SESSION['userID'])) {
	switch ($_GET['site']) {
		case 'register':
			include("site/register.php");
			break;
	default: 
		include("site/start.php");
	}
} else {
	// Wenn Quest 1 nicht abgeschlossen, dann muss der Char neu erstellt werden!
	$sql_check_quest="SELECT 1 as check FROM char_quest WHERE cquest_userID=".$_SESSION['userID']." AND cquest_questID=1 AND cquest_erledigt=1";
	$query_check_quest=mysql_query($sql_check_quest);
	if (mysql_num_rows($query_check_quest)==0) {
		mysql_query("DELETE * FROM `char` WHERE userID=".$_SESSION['userID']);
	}

	$sql_char="SELECT * FROM `char` WHERE userID=".$_SESSION['userID'];
	$query_char=mysql_query($sql_char);
	if (mysql_num_rows($query_char)==0) {
		include("site/charauswahl.php");
    }else {
        $sql_query = "SELECT aktion, aktion_id, aktion_start, aktion_ende FROM `char` WHERE `userID` = '" . $_SESSION['userID'] . "'";
        $result = mysql_query($sql_query);
        $aktion = mysql_fetch_assoc($result);

        // Seiten die ausgeführt werden können auch wenn Aktionen gemacht werden:
        switch($_GET['site']) {
            case "inventory":
                include("site/inventory.php");
                break;
	    case "skills":
		include("site/char_skills.php");
		break;
            case "nachricht":
                include("site/nachricht.php");
                break;
            case "guild":
                include("site/guild.php");
                break;
            case "beitreten":
                include("site/beitreten.php");
                break;
            case 'ladder':
                include("site/ladder.php");
                break;
            case "nachricht_schreiben":
                include("site/nachricht_schreiben.php");
                break;
            case "nachricht_lesen":
                include("site/nachricht_anzeige.php");
                break;
			case "nachricht_anzeige":
                include("site/nachricht_anzeige2.php");
                break;
        }

        // Seiten vor denen eine Aktion geprüft wird
        if ($aktion['aktion']=="") {
            switch ($_GET['map']) {
                case "weltkarte":
                    include("world/worldmap.php");
                    break;
                case "trainingslager":
                    include("world/trainingslager/trainingslager_map.php");
                    break;
                case "wald":
                case "schrottplatz":
                    include("world/gebiet/wald.php");
                    break;
                case "werkstatt":
                    include("world/gebiet/werkstatt.php");
                    break;
                case "see":
                    include("world/gebiet/see.php");
                    break;
				case "gabfall":
                    include("world/gebiet/abfall_gamer.php");
                    break;
				case "abfall":
                    include("world/gebiet/abfall.php");
                    break;
				case "wohngebiet":
                    include("world/gebiet/wohngebiet.php");
                    break;
            }
        } else {
            if ($_GET['site']=="") {
                include("site/aktion.php");
            }
        }
    }
}
?>
