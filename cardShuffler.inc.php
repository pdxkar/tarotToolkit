<!-- <input id="shuffle" type="button" value="shuffle deck"/>
<input id="pickACard" type="button" value="pick card of the day"/>  --> 
<!-- <input id="shuffleTheDeck" type="button" value="watch the deck get shuffled"/>  
<a href="index.php?content=shufflingCardScript&testId=1">Shuffling Card Script</a>
<a href="index.php?content=mainSection&testId=1">Celtic Cross Spread</a> -->
        
<script>
$(function () {
	//var serverString = "http://source.tutsplus.com/gamedev/authors/JamesTyner/FisherYates/src/images/";
	//create the array that will contain the cardNumbers to be Shuffled and Picked
	var cards = [];
	var i;
	for (i = 0; i <= 78; i++) {
		cards.push(i);
	}

	//create the array that will contain the card image urls
	var cardUrls = [];
	var k;
	//for (k = 1; k <= 78; i++) {

		//Major Arcana
		//0 fool
		cardUrls.push("http://www.aeclectic.net/tarot/cards/_img/rider-waite-03676.jpg");
		//1 magician
		cardUrls.push("http://www.aeclectic.net/tarot/cards/_img/rider-waite-03677.jpg");
		//2 priestess
		cardUrls.push("http://oracleoflosangeles.com/wp-content/uploads/2015/09/HP-WaiteSmith.jpg");
		//3 empress
		cardUrls.push("http://www.tarotcardmeanings.net/images/tarotcards-large/tarot-empress.jpg");
		//4 emperor
		cardUrls.push("https://upload.wikimedia.org/wikipedia/en/c/c3/RWS_Tarot_04_Emperor.jpg");
		//5
		cardUrls.push("http://www.mistertarot.com/wp-content/uploads/2015/04/20130406085805_00002A.jpg");
		//6 lovers
		cardUrls.push("http://images.facade.com/i/t/rider_waite/l/r7.jpg");
		//7 chariot
		cardUrls.push("https://static1.squarespace.com/static/508aa9a6e4b0f50834e2fc8b/t/54d177aae4b02b4744e814ff/1423013821516/VII_The-Chariot004.jpg?format=1500w");
		//8 strength
		cardUrls.push("https://s-media-cache-ak0.pinimg.com/236x/58/a1/33/58a1334e267649b1f015417bcbfba591.jpg");
		//9 hermit
		cardUrls.push("http://www.aeclectic.net/tarot/cards/_img/rider-waite-03678.jpg");
		//10 wheel of fortune
		cardUrls.push("https://fantasycards.files.wordpress.com/2013/03/110.jpg");
		//11 justice
		cardUrls.push("https://upload.wikimedia.org/wikipedia/en/e/e0/RWS_Tarot_11_Justice.jpg");
		//12 hanged man
		cardUrls.push("http://www.tarotcardmeanings.net/images/tarotcards-large/tarot-hangedman.jpg");
		//13 death
		cardUrls.push("http://www.aeclectic.net/tarot/cards/_img/rider-waite-03679.jpg");
		//14 temperance
		cardUrls.push("https://s-media-cache-ak0.pinimg.com/736x/e4/41/3b/e4413b9154ea9c25c3d8465e87b334ec.jpg");
		//15 devil
		cardUrls.push("http://www.tarotcardmeanings.net/images/tarotcards-large/tarot-devil.jpg");
		//16 tower
		cardUrls.push("http://www.tarotcardmeanings.net/images/tarotcards-large/tarot-tower.jpg");
		//17 star
		cardUrls.push("https://s-media-cache-ak0.pinimg.com/originals/42/9a/3d/429a3d9cc86fa8613f545af9d06dfff2.jpg");
		//18 moon
		cardUrls.push("http://www.tarotcardmeanings.net/images/tarotcards-large/tarot-moon.jpg");
		//19 sun
		cardUrls.push("http://www.learntarot.com/rwmaj19.gif");
		//20 judgement
		cardUrls.push("https://s-media-cache-ak0.pinimg.com/736x/30/2d/dc/302ddca486a7419efb257b9ffb0b7d9a.jpg");
		//21 world
		cardUrls.push("https://upload.wikimedia.org/wikipedia/en/f/ff/RWS_Tarot_21_World.jpg");

		//Pentacles
		//Ace
		cardUrls.push("http://www.learntarot.com/bigjpgs/pents01.jpg");
		//02
		cardUrls.push("http://www.learntarot.com/bigjpgs/pents02.jpg");
		//03
		cardUrls.push("http://learntarot.com/bigjpgs/pents03.jpg");
		//04
		cardUrls.push("http://www.thenewageblog.com/wp-content/uploads/2013/04/four-of-pentacles1.jpg");
		//05
		cardUrls.push("http://www.learntarot.com/bigjpgs/pents05.jpg");
		//06
		cardUrls.push("http://www.learntarot.com/bigjpgs/pents06.jpg");
		//07
		cardUrls.push("http://www.learntarot.com/bigjpgs/pents07.jpg");
		//08
		cardUrls.push("http://www.learntarot.com/bigjpgs/pents08.jpg");
		//09
		cardUrls.push("http://www.learntarot.com/bigjpgs/pents09.jpg");
		//10
		cardUrls.push("http://www.learntarot.com/bigjpgs/pents10.jpg");
		//Page
		cardUrls.push("http://learntarot.com/bigjpgs/pents11.jpg");
		//Knight
		cardUrls.push("http://www.psychic-junkie.com/images/Knight-of-Pentacles.jpg");
		//Queen
		cardUrls.push("http://learntarot.com/bigjpgs/pents13.jpg");
		//King
		cardUrls.push("http://www.learntarot.com/bigjpgs/pents14.jpg");

		//Cups
		//ace
		cardUrls.push("http://tarotator.com/wp-content/uploads/2015/11/Tarot-Rider-Waite-36-Ace-of-Cups.jpg");
		//02
		cardUrls.push("https://upload.wikimedia.org/wikipedia/en/archive/f/f8/20080507004416!Cups02.jpg");
		//03
		cardUrls.push("https://s-media-cache-ak0.pinimg.com/originals/37/03/0e/37030e164cd9f009212fc9f601edeba1.jpg");
		//04
		cardUrls.push("https://upload.wikimedia.org/wikipedia/en/archive/3/35/20080507004442!Cups04.jpg");
		//05
		cardUrls.push("http://images.facade.com/i/t/rider_waite/l/r27.jpg");
		//06
		cardUrls.push("http://images.facade.com/i/t/rider_waite/l/r28.jpg");
		//07
		cardUrls.push("http://tarotator.com/wp-content/uploads/2015/11/Tarot-Rider-Waite-42-7-of-Cups.jpg");
		//08
		cardUrls.push("http://planetwaves.net/news/wp-content/uploads/2012/05/8_cups_rws_lg.jpg");
		//09
		cardUrls.push("http://www.learntarot.com/bigjpgs/cups09.jpg");
		//10
		cardUrls.push("http://www.learntarot.com/bigjpgs/cups10.jpg");
		//Page
		cardUrls.push("http://www.learntarot.com/bigjpgs/cups11.jpg");
		//Knight
		cardUrls.push("http://www.learntarot.com/bigjpgs/cups12.jpg");
		//Queen
		cardUrls.push("http://learntarot.com/bigjpgs/cups13.jpg");
		//King
		cardUrls.push("http://learntarot.com/bigjpgs/cups14.jpg");

		//Swords
		//ace
		cardUrls.push("http://www.aeclectic.net/tarot/cards/_img/rider-waite-03680.jpg");
		//02
		cardUrls.push("http://www.learntarot.com/bigjpgs/swords02.jpg");
		//03
		cardUrls.push("http://learntarot.com/bigjpgs/swords03.jpg");
		//04
		cardUrls.push("http://learntarot.com/bigjpgs/swords04.jpg");
		//05
		cardUrls.push("http://www.learntarot.com/bigjpgs/swords05.jpg");
		//06
		cardUrls.push("http://www.learntarot.com/bigjpgs/swords06.jpg");
		//07
		cardUrls.push("http://www.learntarot.com/bigjpgs/swords07.jpg");
		//08
		cardUrls.push("http://www.learntarot.com/bigjpgs/swords08.jpg");
		//09
		cardUrls.push("http://www.learntarot.com/bigjpgs/swords09.jpg");
		//10
		cardUrls.push("http://www.learntarot.com/bigjpgs/swords10.jpg");
		//Page
		cardUrls.push("http://learntarot.com/bigjpgs/swords11.jpg");
		//Knight
		cardUrls.push("http://www.learntarot.com/bigjpgs/swords12.jpg");
		//Queen
		cardUrls.push("http://www.learntarot.com/bigjpgs/swords13.jpg");
		//King
		cardUrls.push("http://www.learntarot.com/bigjpgs/swords14.jpg");

		//Wands
		//Ace
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands01.jpg");
		//02
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands02.jpg");
		//03
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands03.jpg");
		//04
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands04.jpg");
		//05
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands05.jpg");
		//06
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands06.jpg");
		//07
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands07.jpg");
		//08
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands08.jpg");
		//09
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands09.jpg");
		//10
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands10.jpg");
		//Page
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands11.jpg");
		//Knight
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands12.jpg");
		//Queen
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands13.jpg");
		//King
		cardUrls.push("http://www.learntarot.com/bigjpgs/wands14.jpg");
	//}
	 
	function drawCards(){
		$("#holder").empty();
		//alert("cards are going to get appended!");
		for (i = 0; i < cards.length; i++) {
			//$("#holder").append("<img src=" + serverString + cards[i] + ".png/>");
			$("#holder").append(cards[i]);
			
		}
	}
	drawCards();
	$("#shuffle").on('click', shuffle);
	$("#pickACard").on('click', pickACard);
/* 	$("#shuffleTheDeck").on('click', shuffleTheDeck); */

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
		shufle_cards();
	}

	
	function pickACard() {
		var rand = cards[Math.floor(Math.random() * cards.length)];
		//var rand = myArray[Math.floor(Math.random() * myArray.length)];
		alert("cardId of random card after shuffle = " + rand);
		open_all_cards(cardUrls[rand]);
	}

/* 	function shuffleTheDeck() {
		alert("boo!");
	} */
	
});
</script>