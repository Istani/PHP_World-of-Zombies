<?php
    echo '<h1>Item Liste</h2>';
?>
<table class="display" id="example" width="100%">
	<thead>
		<tr>
			<th>Item ID</th>
			<th>Item Name</th>
			<th>Item Art</th>
			<th>Item Kateogrie</th>
			<th>Aktion</th>
		</tr>
	</thead>
	<tbody>
<?php
    // Items Auflisten
    $sql_items="SELECT * FROM item_db";
    $query_items=mysql_query($sql_items);
    while ($row_items=mysql_fetch_assoc($query_items)) {
        echo '<tr>';
        echo '<td>'.$row_items['itemID'].'</td>';
        echo '<td>'.text_ausgabe("item", $row_items['itemID'], $bg['sprache']).'</td>';
        echo '<td>'.text_ausgabe("item_art", $row_items['art'], $bg['sprache']).'</td>';
        echo '<td>'.text_ausgabe("item_cat", $row_items['cat'], $bg['sprache']).'</td>';
        echo '<td><a href="index.php?site=admin&db=iedit&id='.$row_items['itemID'].'">Edit</a></td>';
        echo '</tr>';
    }
?>
        </tbody>
</table>
<br><br>

<script type="text/javascript" charset="utf-8">
    var $jq = jQuery.noConflict();
    $jq(document).ready(function() {
        $jq('#example').dataTable();
    } );
</script>