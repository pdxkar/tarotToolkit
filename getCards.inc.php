<?php 
include 'db.inc.php'; 

$suitId = $_POST["cardGroupId"];

if(!empty($_POST["cardGroupId"])) {

//Fetch all cards of the selected suit
  $st = $app['pdo']->prepare('SELECT cardId, deckId, cardNumber, cardName, cardGroupId, cardDescription, cardImageUrl from cards where cardGroupId = :suitId');
	
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
  






