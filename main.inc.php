<div id="selectCardLabel">Select the Card in <b>Position</b> 1 of your</div>
<div id="selectCardLabelSpreadName">Celtic Cross Spread:</div>

<?php include 'db.inc.php'; 

//Fetch all the Decks
$st = $app['pdo']->prepare('SELECT deckId, deckName from decks order by deckId desc limit 0,100');
$st->execute();
$resultDecks = $st->fetchAll();
?>

<div id="cardPicker">
	<div class="row1">
	<p>Deck:</p>
	<select name="deck" id="deck-list" class="demoInputBox" onChange="getSuits(this.value);">
	<option value="">Select Deck</option>
	<?php
	foreach($resultDecks as $row) {
	?>
	<option value="<?php echo $row["deckId"]; ?>"><?php echo $row["deckName"]; ?></option>
	<?php
	}
	?>
	</select>
	</div>


	<div class="row2">
	<p>Suit:</p>
	<select name="suits" id="suit-list" class="demoInputBox" onChange="getCards(this.value);">
	<option value="">Select Suit</option>
	</select>
	</div>

	<div class="row3">
	<p>Card:</p>
	<select name="cards" id="cards-list" class="demoInputBox" onChange="getCard(this.value);">
	<option value="">Select Card</option>
	</select>
	</div>

	<p id="card-info"></p>

</div>

<div id="cardInfo"></div>
	
<script>
function getSuits(val) {
	$.ajax({
	type: "POST",
	url: "getSuits.inc.php",
	data:'deckId='+val,
	success: function(data){
		$("#suit-list").html(data);
	}
	});
}

function getCards(val) {
	$.ajax({
	type: "POST",
	url: "getCards.inc.php",
	data:'suitId='+val,
	success: function(data){
		$("#cards-list").html(data);
	}
	});
}

function getCard(val) {
	$.ajax({
	type: "POST",
	url: "getCard.inc.php",
	data:'cardId='+val,
	success: function(data){
		$("#card-info").html(data);
	}
	});
}

function selectDeck(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>