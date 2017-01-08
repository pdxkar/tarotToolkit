	<h1>Celtic Cross Position 1</h1>
	
		<!--  <div class="centered"> -->
		<div class="main">
		<img src="celticCrossSpread_pos1.jpg" alt="celticCrossSpreadPosition1" style="width:304px;height:228px;">

			<div id="bulletPoints">
			    <ul class="left">
				    <li>HEART OF THE MATTER</li>
				    <li>PRESENT ENVIRONMENT (OUTER)</li>
				</ul>
				<ul class="right">
				    <li>PRESENT ENVIRONMENT (INNER)</li>
				    <li>PRIMARY FACTOR</li>
			    </ul>
			</div>
			
			<div class="leftColumn">
				<p>Heart of the Matter</p>
					<ul class="noBullet">
						<li>central issue</li>
						<li>major concern</li>
						<li>basic worry or upset</li>
						<li>primary focus</li>
						<li>focal point</li>
						<li>fundamental problem</li>
					</ul>
				<p>Present Environment (Outer)</p>
					<ul class="noBullet">
						<li>“that which covers you” —traditional</li>
						<li>surrounding circumstances</li>
						<li>immediate problem at hand</li>
						<li>what’s going on around you</li>
						<li>what you’re dealing with</li>
						<li>external factors</li>
					</ul>
			</div>
			<div class="rightColumn">
				<p>Present Environment (Inner)</p>
					<ul class="noBullet">
						<li>internal factors</li>
						<li>how you feel about the situation</li>
						<li>key personal quality</li>
						<li>basic state of mind</li>
						<li>emotional state</li>
						<li>what’s going on inside of you</li>
					</ul>
				<p>Primary Factor</p>
					<ul class="noBullet">
						<li>major influence</li>
						<li>dominant characteristic</li>
						<li>outstanding feature</li>
						<li>most important element</li>
						<li>most striking quality</li>
					</ul>
			</div>
		</div>
	<!--  <div class="centered">-->
	<div class="main">
	<p>Select the card in your Celtic Cross' position 1:</p>

<?php include 'db.inc.php'; 

//Fetch all the Decks
$st = $app['pdo']->prepare('SELECT deckId, deckName from decks order by deckId desc limit 0,100');
$st->execute();
$resultDecks = $st->fetchAll();
?>

<div class="frmDronpDown">
<div class="row">
<label>Deck:</label><br/>
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

<div class="row">
<label>Suits:</label><br/>
<select name="suits" id="suit-list" class="demoInputBox" onChange="getCards(this.value);">
<option value="">Select Suit</option>

</select>
</div>

<div class="row">
<label>Cards:</label><br/>
<select name="cards" id="cards-list" class="demoInputBox" onChange="getCard(this.value);">
<option value="">Select Card</option>
</select>
</div>

<div class="row">
<label>Your card of the day:</label><br/>

<p id="card-list"></p>
</div>
</div>

	
<script>
function getSuits(val) {
	$.ajax({
	type: "POST",
	url: "getSuits.inc.php",
	//data:'country_id='+val,
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
	//data:'country_id='+val,
	data:'suitId='+val,
	success: function(data){
		$("#cards-list").html(data);
	}
	});
}
//this is probably not the right way to do it since we already have all of the selected card's info
function getCard(val) {
	$.ajax({
	type: "POST",
	url: "getCard.inc.php",
	//data:'country_id='+val,
	data:'cardId='+val,
	success: function(data){
		$("#card-list").html(data);
	}
	});
}

function selectDeck(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>