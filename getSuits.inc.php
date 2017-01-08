<?php 
include 'db.inc.php'; 

$deckId = $_POST["deckId"];

if(!empty($_POST["deckId"])) {

//Fetch all suits of the selected deck
  $st = $app['pdo']->prepare('SELECT suitId, deckId, suitName from suits where deckId = :deckId');
	
  $array = array (
  		'deckId' => $deckId
  );
  
  $st->execute ( $array );
  
  $resultSuits = $st->fetchAll();
  ?>
  	<option value="">Select Suit</option>
  	<?php
		foreach($resultSuits as $suits) {
	?>
  <option value="<?php echo $suits["suitId"]; ?>"><?php echo $suits["suitName"]; ?></option>
  <?php
	}
} 
  ?>
  






