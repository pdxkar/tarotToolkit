<script>
window.onload = function () {

	//Decks
	$st = $app['pdo']->prepare('SELECT deckId, deckName from decks order by deckId desc limit 0,100');
	$st->execute();	
	$resultDecks = $st->fetchAll();
	//var js_data_decks = '<?php echo json_encode($resultDecks); ?>';
	
	//Suits
	

	//Cards
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
</script>