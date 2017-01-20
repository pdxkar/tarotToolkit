<?php 
include 'db.inc.php'; 

$deckId = $_POST["deckId"];

if(!empty($_POST["deckId"])) {

//Fetch all suits of the selected deck
  $st = $app['pdo']->prepare('SELECT cardGroupId, deckId, cardGroupName 
  				from cardGroups where deckId = :deckId AND isSuit = 1');
	
  $array = array (
  		'deckId' => $deckId
  );
  
  $st->execute ( $array );
  
  $resultCardGroups = $st->fetchAll();
  ?>
  	<option value="">Select Suit</option>
  	<?php
		foreach($resultCardGroups as $suits) {
	?>
  <option value="<?php echo $suits["cardGroupId"]; ?>"><?php echo $suits["cardGroupName"]; ?></option>
  <?php
	}
} 
  ?>
  






