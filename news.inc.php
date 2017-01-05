<h3>What's Cookin'</h3>
<br>The latest cooking news<br>
<?php
	include 'db.inc.php';	
	$st = $app['pdo']->prepare('SELECT cardId, cardName from cards order by cardId desc limit 0,100');
	$st->execute();
	
	while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
		//$app['monolog']->addDebug('Row ' . $row['title']);
	
		//$date = $row['date'];
		//$title = $row['title'];
		//$article = $row['article'];
		
		//diplay data in the web page
		//first create an HTML link
		//echo "<br>$date - <b>$title</b><br>$article<br><br>";
		echo("arf!");
	}
?>