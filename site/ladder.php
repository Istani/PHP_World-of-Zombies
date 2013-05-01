<?php 

        $sql_query = "SELECT `char`.*, login.loginName FROM `char` INNER JOIN `login` ON `char`.userID=`login`.userID ORDER BY `char`.`level` DESC, `char`.`exp` DESC";
        

        $result = mysql_query($sql_query);
                
 ?>
<h1><?php echo text_ausgabe("ladder", 1, $bg['sprache']); ?></h1>
<table border="1" width="100%">
  <tr>
    <th style="width: 50px;"><?php echo text_ausgabe("ladder", 2, $bg['sprache']); ?></th>
    <th style="width: 150px;"><?php echo text_ausgabe("ladder", 3, $bg['sprache']); ?></th>
    <th style="width: 150px;"><?php echo text_ausgabe("ladder", 4, $bg['sprache']); ?></th>
    <th style="width: 50px;"><?php echo text_ausgabe("ladder", 5, $bg['sprache']); ?></th>
    <th style="width: 150px;"><?php echo text_ausgabe("ladder", 6, $bg['sprache']); ?></th>
  </tr>

<?php
$i = 1;
while($row = mysql_fetch_array($result)){
	if ($row['loginName']==$_SESSION['loginName']) {
		echo '<tr class="tr_bg">';
	} else {
		echo '<tr>';
	}
    ?>
    
        <td style="text-align: center; vertical-align: middle;"><?php echo $i ;?></td>
        <td style="text-align: center; vertical-align: middle;"><?php echo $row['loginName'] ?></td>
        <td style="text-align: center; vertical-align: middle;"><?php echo text_ausgabe("char_klasse", $row['klasse'], $bg['sprache']); ?></td>
        <td style="text-align: center; vertical-align: middle;"><?php echo $row['level'] ?></td>
        <td style="text-align: center; vertical-align: middle;"><?php echo $row['exp'] ?></td>
    </tr>
  <?php
$i++;
}
mysql_close();
?>
</table>