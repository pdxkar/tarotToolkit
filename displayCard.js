var deckObject = {
    "Rider Waite Deck": {
		"Major Arcana": ["0 - The Fool", "1 - The Magician", "2 - The High Priestess", "3 - The Empress", "4 - The Emperor", "5 - The Hierophant", "6 - The Lovers", "7 - The Chariot", "8 - Strength", "9 - The Hermit", "10 - The Wheel of Fortune", "11 - Justice", "12 - The Hanged Man", "13 - Death", "14 - Temperance", "15 - The Devil", "16 - The Tower", "17 - The Star", "18 - The Moon", "19 - The Sun", "20 - Judgement", "21 - The World"],
        "Cups": ["Ace of Cups", "Two of Cups", "Three of Cups", "Four of Cups", "Five of Cups", "Six of Cups", "Seven of Cups", "Eight of Cups", "Nine of Cups", "Ten of Cups", "Page of Cups", "Queen of Cups", "King of Cups"],
		"Swords": ["Ace of Swords", "Two of Swords", "Three of Swords", "Four of Swords", "Five of Swords", "Six of Swords", "Seven of Swords", "Eight of Swords", "Nine of Swords", "Ten of Swords", "Page of Swords", "Queen of Swords", "King of Swords"],
		"Pentacles": ["Ace of Pentacles", "Two of Pentacles", "Three of Pentacles", "Four of Pentacles", "Five of Pentacles", "Six of Pentacles", "Seven of Pentacles", "Eight of Pentacles", "Nine of Pentacles", "Ten of Pentacles", "Page of Pentacles", "Queen of Pentacles", "King of Pentacles"],
        "Wands": ["Ace of Wands", "Two of Wands", "Three of Wands", "Four of Wands", "Five of Wands", "Six of Wands", "Seven of Wands", "Eight of Wands", "Nine of Wands", "Ten of Wands", "Page of Wands", "Queen of Wands", "King of Wands"],
    }
}

window.onload = function () {
	
	<?php
echo "<h2>PHP is Fun!</h2>";
echo "Hello world!<br>";
echo "I am about to learn PHP!<br>";
?>
	
	
    var deckSel = document.getElementById("deckSel"),
        suitSel = document.getElementById("suitSel"),
        cardSel = document.getElementById("cardSel");
    for (var state in deckObject) {
        deckSel.options[deckSel.options.length] = new Option(state, state);
    }
    deckSel.onchange = function () {
        suitSel.length = 1; // remove all options bar first
        cardSel.length = 1; // remove all options bar first
        if (this.selectedIndex < 1) return; // done   
        for (var county in deckObject[this.value]) {
            suitSel.options[suitSel.options.length] = new Option(county, county);
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