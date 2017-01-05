<?php include 'cardsDb.inc.php'; ?>
<?php include 'displayCard.inc.php'; ?>

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
