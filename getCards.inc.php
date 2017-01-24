<?php 
include 'db.inc.php'; 

$suitId = $_POST["cardGroupId"];

if(!empty($_POST["cardGroupId"])) {

//Fetch all cards of the selected suit

  $st = $app['pdo']->prepare('SELECT cards.cardId, cardName, cardDescription, cardImageUrl 
  			FROM cardsCardGroups 
  			JOIN cards ON cards.cardId = cardsCardGroups.cardId 
  			JOIN cardGroups ON cardGroups.cardGroupId = cardsCardGroups.cardGroupId 
  			WHERE cardgroups.cardGroupId = :suitId AND cardgroups.isSuit = 1');
 
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
  






