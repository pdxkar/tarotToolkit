<?php

include 'db.inc.php';

$cardid = $_GET['id'];

$st = $app['pdo']->prepare('SELECT cardId, cardNumber, cardName, cardSuit, cardDescription, cardImageUrl from cards where cardId = :cardid');

$array = array(
		'cardid' => $cardId
);

$st->execute($array);

$row = $st->fetch(PDO::FETCH_ASSOC);

$cardId = $row['cardId'];
$cardNumber = $row['cardNumber'];
$cardName = $row['cardName'];
$cardSuit = $row['cardSuit'];
$cardDescription = $row['cardDescription'];
$cardImageUrl = $row['cardImageUrl'];
	echo "<h2>$cardId</h2>\n";
	echo "by $cardNumber <br><br>\n";
	echo "$cardName<br><br>\n";
	echo "<h3>Ingredients:</h3>\n";
	echo "$cardSuit<br><br>\n";
	echo "<h3>Directions:</h3>\n";
	echo "$cardDescription";
	echo "$cardImageUrl";
	echo "<br><br>\n";
	
//	$st = $app['pdo']->prepare('SELECT count(commentid) from comments where recipeid = :recipeid');
		
//	$array = array(
//			'recipeid' => $recipeid
//	);
	
//	$st->fetch(PDO::PARAM_INT);
	
//	$isQueryOk = $st->execute($array);
	
//	if ($isQueryOk) {
//		$count = $st->fetchColumn();
///	} 
//	else {
		//TODO error handling here!
//		echo 'blah';
//	}

// if ($count == 0) {
// 	echo "No comments posted yet.&nbsp;&nbsp;\n";
// 	echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n";
// 	echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";
// 	echo "<hr>\n";
// } else {
// 	echo $count . "\n";
// 	echo "&nbsp;comments posted.&nbsp;&nbsp;\n";
// 	echo "<a href=\"index.php?content=newcomment&id=$recipeid\">Add a comment</a>\n";
// 	echo "&nbsp;&nbsp;&nbsp;<a href=\"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n";
// 	echo "<hr>\n";
// 	echo "<h2>Comments:</h2>\n";
	
// 	$st = $app['pdo']->prepare('SELECT date,poster,comment from comments where recipeid = :recipeid order by commentid desc');
	
// 	$array = array(
// 			'recipeid' => $recipeid
// 	);
	
// 	$st->execute($array);
	
// 	while($row = $st->fetch(PDO::FETCH_ASSOC)) {
	
// 		$date = $row['date'];
// 		$poster = $row['poster'];
// 		$comment = $row['comment'];
// 		$comment = nl2br($comment);
// 		echo "$date  - posted by  $poster<br>\n";
// 		echo "$comment\n";
// 		echo "<br><br>\n";
// 	}
//}
?>