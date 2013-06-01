<?php
  
include("_mysql.php");

$exp = 100;


for ($i = 1; $i <= 250; $i++) {
            
    $exp = 200 + $exp * 1.0375;
    
//    $sql_query = "INSERT INTO guild_exp
//				SET
//					level='" . $i . "',
//					exp=". $exp;
//    mysql_query($sql_query);
             
    echo "lvl:" . $i . "<br>";
    echo "exp:" . ceil($exp) . "<br><br>";
  
}



?>