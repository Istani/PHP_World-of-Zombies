<?php
    $sql_query = "SELECT aktion, aktion_id, aktion_start, aktion_ende FROM `char` WHERE `userID` = '" . $_SESSION['userID'] . "'";
    $result = mysql_query($sql_query);
    $aktion = mysql_fetch_assoc($result);

    echo '<h1>'.text_ausgabe("unterwegs", 0, $bg['sprache']).'</h1>';
    echo text_ausgabe("unterwegs", 1, $bg['sprache']).'<br><br>';
?>
<table width="100%">
    <tr>
        <td>
            <div>
<?php
	if ($dsatz["aktion_ende"]-time()<=0) {
        switch ($aktion['aktion']) {
            case 'ABBAUEN':
                echo '<h2>'.text_ausgabe("abbauen", 2, $bg['sprache']).' ';
                $sql['gebiet']="SELECT * FROM abbau_gebiet WHERE ID='".$aktion['aktion_id']."'";
                $query['gebiet']=mysql_query($sql['gebiet']);
                while ($row['gebiet']=mysql_fetch_assoc($query['gebiet'])) {
                    $gebiet=$row['gebiet'];
                }
                echo text_ausgabe("gebiet", $gebiet['ID'], $bg['sprache']).'</h2>';
				$sql['gebiet']="SELECT * FROM abbau_gebiet WHERE gebiet='".$gebiet['gebiet']."'";
                $query['gebiet']=mysql_query($sql['gebiet']);
				while ($row['gebiet']=mysql_fetch_assoc($query['gebiet'])) {
					$gebiet=$row['gebiet'];
					$faktor=player_abbau_faktor($_SESSION['userID'], 1);
					$abbau=$gebiet['grundwert']*$faktor;
					if (inventory_add($_SESSION['userID'], $gebiet['itemID'], $abbau)) {
						echo $abbau.' '.text_ausgabe("item", $gebiet['itemID'], $bg['sprache']).' '.text_ausgabe("abbauen", 3, $bg['sprache']).'<br>';
					}
				}
				$sql_char_level="SELECT `level` FROM `char` WHERE userID='".$_SESSION["userID"]."'";
				$query_char_level=mysql_query($sql_char_level);
				$level=mysql_result($query_char_level,0,0)-1;
				$sql_mob="SELECT mob_exp FROM mob_db WHERE mob_level='".$level."' ORDER BY RAND( )";
				$query_mob=mysql_query($sql_mob);
				if (mysql_num_rows($query_mob)>0) {
					$exp=mysql_result($query_mob,0,0);
				} else {
					$sql_mob="SELECT mob_exp FROM mob_db WHERE mob_level<'".$level."' ORDER BY mob_exp DESC LIMIT 0,1";
					$query_mob=mysql_query($sql_mob);
					if (mysql_num_rows($query_mob)>0) {
						$exp=mysql_result($query_mob,0,0);
					}
				}
				
                $sql['user_aktion']="UPDATE `char`
                                    SET aktion='',
										exp=exp+".$exp.",
										wasser=wasser-5,
                                        aktion_id=0,
                                        aktion_start=0,
                                        aktion_ende=0,
										Items_Abbau=Items_Abbau+".$abbau."
                                    WHERE userID=".$_SESSION["userID"];
                mysql_query($sql['user_aktion']);
                break;
			case 'MÜLL':
				echo '<h2>'.text_ausgabe("muell_sammeln", 0, $bg['sprache']).'</h2>';
				// MÜLL AUSWÄHLEN
				if ($aktion['aktion_id']>0) {
					$sql['muell']="SELECT * FROM abfall WHERE spieler=".$aktion['aktion_id']." ORDER BY RAND () LIMIT 0,1";
				} else {
					$sql['muell']="SELECT * FROM abfall ORDER BY RAND () LIMIT 0,1";
				}
				$query['muell']=mysql_query($sql['muell']);
				while ($row['muell']=mysql_fetch_assoc($query['muell'])) {
					//inventory_add($user, $item, $menge)
					if (inventory_add($_SESSION["userID"], $row['muell']['item'], $row['muell']['menge'])) {
						echo text_ausgabe("muell_ok", 0, $bg['sprache']).'<br>';
						echo text_ausgabe("item_erhalten", 0, $bg['sprache']).'<br><br>';
						echo $row['muell']['menge'].' x '.text_ausgabe("item", $row['muell']['item'], $bg['sprache']).'<br>';
						$tmp_sql=array_set_mysqlstring($row['muell']);
						$tmp_sql=str_replace(", ", " AND ", $tmp_sql);
						$sql['muell_done']="DELETE FROM abfall WHERE ".$tmp_sql;
						mysql_query($sql['muell_done']);
					} else {
						echo text_ausgabe("muell_fail", 0, $bg['sprache']).'<br>';
					}
				}
				// AKTION WIEDER BEENDEN
				$sql['user_aktion']="UPDATE `char`
                                    SET aktion='',
										wasser=wasser-5,
                                        aktion_id=0,
                                        aktion_start=0,
                                        aktion_ende=0
                                    WHERE userID=".$_SESSION["userID"];
                mysql_query($sql['user_aktion']);
				break;
            case 'KAMPF_MOB':
                echo '<h2>'.text_ausgabe("kampf", 0, $bg['sprache']).'</h2>';
                $sql_monster="SELECT * FROM mob_db WHERE mob_id='".$aktion['aktion_id']."'";
				$query_monster=mysql_query($sql_monster);
				while ($row_monster=mysql_fetch_assoc($query_monster)) {
					$monster=$row_monster;
				}
//Kampfsystem
				$char=get_player_status($_SESSION['userID']);
				/*
				echo '<pre>';
				var_dump($monster);
				var_dump($char);			
				echo '</pre>';
				*/
				// KAMPF
				$runde=0;
				while ($monster['mob_leben']>0 AND $char['nahrung']>0) {
				    $runde++;
				    echo '<b>Runde '.$runde.':</b><br>';
				    //WAFFE UND MUNITONSBERECHNUNG - Später
			            $waffenart=1;
				    $sql_waffenschaden="SELECT mindmg, maxdmg FROM `item_db` WHERE itemID=".$char['waffen'][$waffenart];
//				    echo $sql_waffenschaden;
				    $item_name=text_ausgabe("item", $char['waffen'][$waffenart], $bg['sprache']);
				    $query_waffenschaden=mysql_query($sql_waffenschaden);
				    if (mysql_num_rows($query_waffenschaden)>0) {
				        $char['min_schaden']=@mysql_result($query_waffenschaden,0,0);
				        $char['max_schaden']=@mysql_result($query_waffenschaden,0,1);
				    }
				    echo 'Du benutzt: '.$item_name.'<br>';
				    if($waffenart==1) {
   				        $mob_schaden=rand($monster['min_schaden'],$monster['max_schaden']);
				        $mob_schaden=$mob_schaden*(1+($char['ruestung']/100));
					$mob_schaden=(int)$mob_schaden;
					$char['nahrung']=$char['nahrung']-$mob_schaden;
					$char_schaden=rand($char['min_schaden'], $char['max_schaden']);
					$char_schaden=(int)$char_schaden;
					$monster['mob_leben']=$monster['mob_leben']-$char_schaden;
					//$char['gesundheit']=(int)$char['gesundheit'];
					//$monster['mob_lebel']=(int)$monster['mob_lebel'];
					echo "Das Monster trifft dich mit ".$mob_schaden." Schadenspunkte! (Noch ".$char['nahrung'].")";
					if ($char['nahrung']>0) {
						echo "Du triffst das Monster mit ".$char_schaden." Schadenspunkte! (Noch ".$monster['mob_leben'].")";
					}
					echo '<br>';
					echo '<br>';
			            }
				}
				if ($char['nahrung']>0) {
				   //Spieler verliert
				   echo "Du hast das Monster besiegt!";
				   // EXP und so hinzufügen!	
				   //var_dump($monster); 
				   $sql_char_update="UPDATE `char` SET exp=exp+".$monster['mob_exp']." WHERE userID=".$_SESSION["userID"];
				   mysql_query($sql_char_update);
				   echo '<br>';
				   echo 'Du hast '.$monster['mob_exp'].' EXP gewonnen.<br>';
						//$monster['mob_drop'];
					//Char Drop Berechnung
					$drop_wert=$char['luk']*$bg['luck_drop_modifier'];
					$menge_max_wert=$drop_wert;
					
					$belohnung=unserialize($monster['mob_drop']);
					if (is_array($belohnung)) {
						foreach ($belohnung as $key => $value) {
							if ($key=="get_item") {
								foreach ($belohnung["item"] as $tmp_item) {
									if (!isset($tmp_item['menge'])) {
										$tmp_item['menge']=1;
									}
									if (!isset($tmp_item['quality'])) {
										$tmp_item['quality']=0;
									}
									if (!isset($tmp_item['level'])) {
										$tmp_item['level']=0;
									}
									//Drop es?
									$drop=false;
									if ($drop_wert>100) {
										$drop=true;
									} else {
										$chance=rand(0,100);
										if ($drop_wert>$chance) {
											$drop=true;
										}
									}
									if ($drop) {
										if (inventory_add($_SESSION["userID"], $tmp_item['id'], $tmp_item['menge'], 0, $tmp_item['quality'], $tmp_item['level'])) {
											echo $tmp_item['menge'].' x '.text_ausgabe("item", $tmp_item['id'], $bg['sprache']).' erhalten.<br>';
										}
										$drop_wert=$drop_wert*$bg['next_drop_modifier'];
									}
									//echo '1_';
								}
							}	
						}	
					}
					// Item dorps von Items
					$sql_itemdb="SELECT * FROM item_db WHERE min_lvl<=".$monster['mob_level']." AND max_lvl>=".$monster['mob_level']." ORDER BY RAND()";
					$query_itemdb=mysql_query($sql_itemdb);
					while ($row_item=mysql_fetch_assoc($query_itemdb)) {
						$last_drop=0;
						$drop_menge=1;
						$menge_wert=$menge_max_wert;
						$menge_wert=$menge_wert*$bg['next_drop_modifier'];
						while ($drop_menge>$last_drop) {
							$last_drop=$drop_menge;
							if ($menge_wert>100) {
								$drop_menge++;
							} else {
								$chance=rand(0,100);
								if ($menge_wert>$chance) {
									$drop_menge++;
								}
							}
							$menge_wert=$menge_wert*$bg['next_drop_modifier'];
						}
						// Wenn item hat stackwert 1 dann natürlich keine erhöhe menge sodner nur 1
						if ($row_item['stack']==1) {
							$drop_menge=1;
						}
						
						$drop=false;
						if ($drop_wert>100) {
							$drop=true;
						} else {
							$chance=rand(0,100);
							if ($drop_wert>$chance) {
								$drop=true;
							}
						}
						if ($drop) {
							if (inventory_add($_SESSION["userID"], $row_item['itemID'], $drop_menge, 0, 0, 0)) {
								echo  $drop_menge.' x '.text_ausgabe("item",$row_item['itemID'], $bg['sprache']).' erhalten.<br>';
							}
							$drop_wert=$drop_wert*$bg['next_drop_modifier'];
						}
					}
					
				} else {
				   //Spieler gewinnt
				   echo "Verloren, Looser!";
				   $char['nahrung']=1;
				}    
				
				$sql['user_aktion']="UPDATE `char`
                                    SET aktion='',
										wasser=wasser-5,
										nahrung=".$char['nahrung'].",
										Monster_Wins=Monster_Wins+1,
                                        aktion_id=0,
                                        aktion_start=0,
                                        aktion_ende=0
                                    WHERE userID=".$_SESSION["userID"];
                mysql_query($sql['user_aktion']);
                break;
			case 'SCHLAFEN':
				echo '<h2>'.text_ausgabe("schlafen", 0, $bg['sprache']).'</h2>';
				echo text_ausgabe("schlafen_ok", 0, $bg['sprache']).'<br>';
				$sql_query = "SELECT * FROM `char` WHERE userID = '" . $_SESSION['userID'] . "'";
				$result = mysql_query($sql_query);
				$dsatz = mysql_fetch_assoc($result);
				
				$max_wert_ausdauer  =   $dsatz['gesundheit'];
				
				$max_wasser=get_wert_plus_bonus($_SESSION['userID'], "wasser", $max_wert_ausdauer);
				$max_nahrung=get_wert_plus_bonus($_SESSION['userID'], "nahrung", $max_wert_ausdauer);
				$sql['user_aktion']="UPDATE `char`
                                    SET aktion='',
										wasser=".$max_wasser.",
										nahrung=".$max_nahrung.",
                                        aktion_id=0,
                                        aktion_start=0,
                                        aktion_ende=0
                                    WHERE userID=".$_SESSION["userID"];
                mysql_query($sql['user_aktion']);
				break;
        }
    } else {
        switch ($aktion['aktion']) {
            case 'ABBAUEN':
                echo '<h2>'.text_ausgabe("abbauen", 2, $bg['sprache']).' ';
                $sql['gebiet']="SELECT * FROM abbau_gebiet WHERE ID='".$aktion['aktion_id']."'";
                $query['gebiet']=mysql_query($sql['gebiet']);
                while ($row['gebiet']=mysql_fetch_assoc($query['gebiet'])) {
                    $gebiet=$row['gebiet'];
                }
                echo text_ausgabe("gebiet", $gebiet['ID'], $bg['sprache']).'</h2>';
                echo text_ausgabe("abbauen", 0, $bg['sprache']).'<br>';
                $sql['abbaugebiet']="SELECT * FROM abbau_gebiet WHERE gebiet='".$gebiet['gebiet']."'";
                $query['abbaugebiet']=mysql_query($sql['abbaugebiet']);
                while ($row['abbaugebiet']=mysql_fetch_assoc($query['abbaugebiet'])) {
                    echo item_bilder($row['abbaugebiet']['itemID'], $art="show");
                    echo '&nbsp;'.text_ausgabe("item", $row['abbaugebiet']['itemID'], $bg['sprache']).'<br>';
                }
                break;
			case 'MÜLL':
                echo '<h2>'.text_ausgabe("sammel_müll", 0, $bg['sprache']).'</h2>';
                echo text_ausgabe("sammel_müll_text", 0, $bg['sprache']).'<br>';
                break;
            case 'KAMPF_MOB':
                echo '<h2>'.text_ausgabe("kampf", 0, $bg['sprache']).'</h2>';
                echo text_ausgabe("kampf_text", 0, $bg['sprache']).'<br>';
                break;
        }
?>
        <div id="zeitanzeige"></div>
        <script>
            function zeitanzeige() {
                var $jq = jQuery.noConflict();
				var $temp1;
				var $temp2;
				$temp1=<?php echo $aktion["aktion_ende"]; ?>;
				$temp2=<?php echo time(); ?>;
				if ($temp1<=$temp2) {
					location.reload();
				} else {
					$jq("#zeitanzeige").load("zeitanzeige.php?start=<?php echo $aktion["aktion_start"]; ?>&ende=<?php echo $aktion["aktion_ende"]; ?>&till=<?php echo time(); ?>");
					window.setTimeout('zeitanzeige()',500);
				}
            }
            zeitanzeige();
        </script>
        <?php
        // Abbrechen
            echo '<a href="site/aktion_abbruch.php">Abbrechen</a><br>';
        // Beschleunigen
            echo '<a href="site/aktion_speed.php">Beschleunigen</a><br>';

    }
?>
            </div>
        </td>
    </tr>
</table>