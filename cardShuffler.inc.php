<?php include 'db.inc.php'; ?>
<input id="shuffle" type="button" value="shuffle deck"/>
<input id="pickACard" type="button" value="pick card of the day"/>       
        
<script>
$(function () {
	//var serverString = "http://source.tutsplus.com/gamedev/authors/JamesTyner/FisherYates/src/images/";
	var cards = [];
	var i;
	for (i = 1; i <= 78; i++) {
		cards.push("c" + i);
	}
	 
	function drawCards(){
		$("#holder").empty();
		alert("cards are going to get appended!");
		for (i = 0; i < cards.length; i++) {
			//$("#holder").append("<img src=" + serverString + cards[i] + ".png/>");
			$("#holder").append(cards[i]);
			
		}
	}
	drawCards();
	$("#shuffle").on('click', shuffle);
	$("#pickACard").on('click', pickACard);

	var theLength = cards.length - 1;
	var toSwap;
	var tempCard;

	function shuffle() {
		alert("Cards before shuffle:" + cards);
		console.log("Cards before shuffle:" + cards);
		for (i = theLength; i > 0; i--) {
			toSwap = Math.floor(Math.random() * i);
			tempCard = cards[i];
			cards[i] = cards[toSwap];
			cards[toSwap] = tempCard;
		}
		alert("Cards after shuffle: "+cards);
		console.log("Cards after shuffle: "+cards);
		drawCards();
	}

	
	function pickACard() {
		var rand = cards[Math.floor(Math.random() * cards.length)];
		//var rand = myArray[Math.floor(Math.random() * myArray.length)];
		alert("cardId of random card after shuffle = " + rand);
	}
	
});
</script>