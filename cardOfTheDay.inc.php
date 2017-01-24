<?php include 'db.inc.php';

//Fetch all the Decks
$st = $app['pdo']->prepare('SELECT deckId, deckName from decks order by deckId desc limit 0,100');
$st->execute();
$resultDecks = $st->fetchAll();
?>

<div class="container">
	  <!-- datePicker: https://www.tutorialspoint.com/jqueryui/jqueryui_datepicker.htm -->
      <div id="datePicker">Today's Date: <input type = "text" id = "datepicker-13"></div>
		<div id="selectCardOfTheDayLabel">Select Your Card of the Day</div>
		<div id="cardOfTheDayPicker"> <!-- I dont think this div label is used -->
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
			
			<div class="row4">
			<p>Card Alignment:</p>
			<select name="isReversed" id="isReversed" class="demoInputBox" onChange="thisIsATest(this.value);">
			<option value="upright">Upright</option>
			<option value="reversed">Reversed</option>
			</select>
			</div>
		
			<p id="card-info"></p>
			<input type="hidden" id="card-id" value="2">
		
		</div>
	
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
		data:'cardGroupId='+val,
		success: function(data){
			$("#cards-list").html(data);
		}
		});
	}
	
	function getCard(cardId) {
		document.getElementById("card-id").value = cardId;
		var isReversed = "upright";
		$.ajax({
		type: "POST",
		url: "getCardOfTheDay.inc.php",
		data: 'cardId='+cardId+'&isReversed='+isReversed,
		success: function(data){
			$("#card-info").html(data);
		}
		});
	}

	function thisIsATest(isReversed) {
		var cardId = document.getElementById("card-id").value;
		$.ajax({
			type: "POST",
			url: "getCardOfTheDay.inc.php",
			//data:'cardId='+cardId,
			data: 'cardId='+cardId+'&isReversed='+isReversed,
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
	
</div>