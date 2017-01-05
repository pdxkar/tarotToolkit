<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
 <!--  <script src="displayCard.js"></script> -->
<?php include 'displayCard2.php';?>
</head>
<body>
	<h1>Celtic Cross Position 1</h1>
	<img src="celticCrossSpread_pos1.jpg" alt="celticCrossSpreadPosition1" style="width:304px;height:228px;">
		<div class="centered">
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
	<div class="centered">
	<p>Select the card in your Celtic Cross' position 1:</p>
	<form>
	    <select name="optone" id="deckSel" size="1">
	        <option value="" selected="selected">Select Deck</option>
	    </select>
	    <br>
	    <br>
	    <select name="opttwo" id="suitSel" size="1">
	        <option value="" selected="selected">Please select Deck first</option>
	    </select>
	    <br>
	    <br>
	    <select name="optthree" id="cardSel" size="1">
	        <option value="" selected="selected">Please select Suit first</option>
	    </select>
	    <br/>
	    <input type="button" onclick="getOption()" value="What is your card?">
	</form>
	<p id="theCard"></p>
	<script>
	
		window.onload = function () {

			//major arcana
			var js_data_majorArcanaCards = '<?php echo json_encode($majorArcanaCards); ?>';
			var js_obj_data_majorArcanaCards = JSON.parse(js_data_majorArcanaCards);
			//pentacles
			var js_data_pentacleCards = '<?php echo json_encode($pentacleCards); ?>';
			var js_obj_data_pentacleCards = JSON.parse(js_data_pentacleCards);
			//cups
			var js_data_cupCards = '<?php echo json_encode($cupCards); ?>';
			var js_obj_data_cupCards = JSON.parse(js_data_cupCards);
			//wands
			var js_data_wandCards = '<?php echo json_encode($wandCards); ?>';
			var js_obj_data_wandCards = JSON.parse(js_data_wandCards);
			//swords
			var js_data_swordCards = '<?php echo json_encode($swordCards); ?>';
			var js_obj_data_swordCards = JSON.parse(js_data_swordCards);

   			var deckObject = {
   	  			 "Rider Waite Deck": {
   	  				"Major Arcana": js_obj_data_majorArcanaCards,
   	  			    "Cups": js_obj_data_cupCards,
   	  				"Swords": js_obj_data_swordCards,
   	  				"Pentacles": js_obj_data_pentacleCards,
   	  			    "Wands": js_obj_data_wandCards
   	 			 }
   	  		}  
			
		    var deckSel = document.getElementById("deckSel"),
		        suitSel = document.getElementById("suitSel"),
		        cardSel = document.getElementById("cardSel");
	        //todo change state to more appropriate name
		    for (var deck in deckObject) {
		        deckSel.options[deckSel.options.length] = new Option(deck, deck);
		    }
		    deckSel.onchange = function () {
		        suitSel.length = 1; // remove all options bar first
		        cardSel.length = 1; // remove all options bar first
		        if (this.selectedIndex < 1) return; // done   
		        //todo change county to appropriate name
		        for (var suit in deckObject[this.value]) {
		            suitSel.options[suitSel.options.length] = new Option(suit, suit);
		        }
		    }
		    deckSel.onchange(); // reset in case page is reloaded
		    suitSel.onchange = function () {
		        cardSel.length = 1; // remove all options bar first
		        if (this.selectedIndex < 1) return; // done   
		        var cards = deckObject[deckSel.value][this.value];
		        for (var i = 0; i < cards.length; i++) {
		            cardSel.options[cardSel.options.length] = new Option(cards[i], cards[i]);
		        }
		    }
		}

		function getOption() {
			//get and display the card value
			var cardObj = document.getElementById("cardSel");	
			document.getElementById("theCard").innerHTML = cardObj.options[cardObj.selectedIndex].text;
		}

		function test() {
			var js_data = '<?php echo json_encode($majorArcanaCards); ?>';
			var js_obj_data = JSON.parse(js_data );
		}
	</script>
	</body>
</html>