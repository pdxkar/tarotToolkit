<?php include 'db.inc.php'; 

//Fetch all the Decks
$st = $app['pdo']->prepare('SELECT deckId, deckName from decks order by deckId desc limit 0,100');
$st->execute();
$resultDecks = $st->fetchAll();
?>
<div class="container">
		<div id="selectCardLabel">Select the Card in <b>Position</b> 1 of your</div>
		<div id="selectCardLabelSpreadName">Celtic Cross Spread:</div>
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
	
		<div id="spreadPositionImage" title="spread Position diagram"></div>
		
		<div id="spreadPositionLabel">
			<div id="spreadName">Celtic Cross Spread</div>
			<div id="cardPosition">Position 1</div>
		</div>
		
		<div>
		    <ul class="left">
			    <span><li>Heart of the Matter</li></span>
			    <span><li>Present Environment (Outer)</li></span>
			</ul>
			<ul class="right">
			    <span><li>Present Environment (Inner)</li></span>
			    <span><li>Primary Factor</li></span>
		    </ul>
		</div>
	
		 <div class="left-top"> 
			<p>Heart of the Matter</p>
				<ul class="noBullet">
					<span><li>central issue</li></span>
					<span><li>major concern</li></span>
					<span><li>basic worry or upset</li></span>
					<span><li>primary focus</li></span>
					<span><li>focal point</li></span>
					<span><li>fundamental problem</li></span>
				</ul>
		</div>
		 <div class="right-top"> 
			<p>Present Environment (Inner)</p>
				<ul class="noBullet">
					<span><li>internal factors</li></span>
					<span><li>how you feel about the situation</li></span>
					<span><li>key personal quality</li></span>
					<span><li>basic state of mind</li></span>
					<span><li>emotional state</li></span>
					<span><li>what's going on inside of you</li></span>
				</ul>
		</div>
					
		<div class="left-bottom"> 
	
			<p>Present Environment (Outer)</p>
				<ul class="noBullet">
					<span><li>"that which covers you" -traditional</li></span>
					<span><li>surrounding circumstances</li></span>
					<span><li>immediate problem at hand</li></span>
					<span><li>what's going on around you</li></span>
					<span><li>what you're dealing with</li></span>
					<span><li>external factors</li></span>
				</ul>
		</div>
		 <div class="right-bottom">
			<p>Primary Factor</p>
				<ul class="noBullet">
					<span><li>major influence</li></span>
					<span><li>dominant characteristic</li></span>
					<span><li>outstanding feature</li></span>
					<span><li>most important element</li></span>
					<span><li>most striking quality</li></span>
				</ul>
		</div>	

</div>