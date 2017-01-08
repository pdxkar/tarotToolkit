<?php 
include 'db.inc.php'; 

$suitId = $_POST["suitId"];

if(!empty($_POST["suitId"])) {

//Fetch all cards of the selected suit
  $st = $app['pdo']->prepare('SELECT cardId, deckId, cardNumber, cardName, suitId, cardDescription, cardImageUrl from cards where suitId = :suitId');
	
  $array = array (
  		'suitId' => $suitId
  );
  
  $st->execute ( $array );
  
  $resultCards = $st->fetchAll();
  ?>
  	<option value="">Select Card</option>
  	<?php
		foreach($resultCards as $cards) {
	?>
  <option value="<?php echo $cards["cardId"]; ?>"><?php echo $cards["cardName"]; ?></option>
  <?php
	}
} 
  ?>
  






