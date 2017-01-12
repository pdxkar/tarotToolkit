<?php 

class Card {
	
	var $cardId;
	var $deckId;
	var $cardNumber;
	var $cardName;
	var $suitId;
	var $cardDescription;
	var $cardImageUrl;
	
	function __construct($cardId, $deckId, $cardNumber, $cardName, $suitId, $cardDescription, $cardImageUrl)
	{
		$this->cardId = $cardId;
		$this->deckId = $deckId;
		$this->cardNumber = $cardNumber;
		$this->cardName = $cardName;
		$this->suitId = $suitId;
		$this->cardDescription = $cardDescription;
		$this->cardImageUrl = $cardImageUrl;
	}
	
	public function __toString()
	{
		return $this->cardId . ' '. $this->deckId . ' '. $this->cardNumber . ' '. $this->cardName . ' '.  $this->suitId . ' '. $this->cardDescription . ' '. $this->cardImageUrl;
	}
	
	function getCardId() { return $this->cardId; }
	function getDeckId() { return $this->deckId; }
	function getCardNumber() { return $this->cardNumber; }
	function getCardName() { return $this->cardName; }
	function getSuitId() { return $this->suitId; }
	function getCardDescription() { return $this->cardDescription; }
	function getCardImageUrl() { return $this->cardImageUrl; }
	

	
}

?>