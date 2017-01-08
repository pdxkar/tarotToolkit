<?php
include 'db.inc.php';

$cardId = $_POST["cardId"];

if(!empty($_POST["cardId"])) {

	//Fetch the card with the chosen cardId
	$st = $app['pdo']->prepare('SELECT cardId, deckId, cardNumber, cardName, suitId, cardDescription, cardImageUrl from cards where cardId = :cardId');

	$array = array (
			'cardId' => $cardId
	);

	$st->execute ( $array );

	$resultCard = $st->fetchAll();
	?>
  	<option value="">??</option>
  	<?php
		foreach($resultCard as $card) {
	?>
  <option value="<?php echo $card["cardId"]; ?>">
  
  <?php echo $card["cardId"]; ?>
  <?php echo $card["deckId"]; ?>
  <?php echo $card["cardNumber"]; ?>
  <?php echo $card["cardName"]; ?>
  <?php echo $card["suitId"]; ?>
  <?php echo $card["cardDescription"]; ?>
  <?php echo $card["cardImageUrl"]; ?>
  
  </option>
  <?php
	}
} 
  ?>