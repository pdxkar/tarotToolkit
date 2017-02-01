<?php include 'cardShuffler.inc.php'; ?>

<div class="container">

	<h1>Animating Playing Cards</h1>
	<small>Relax and quiet your mind, and then ask your question of the
		cards. Your question can be as specific or general as you like, for
		example "What guidance do I need for today?"</small><br>
	<br> <br>
	<br>
	<input id="shuffle" type="button" value="Shuffle"/>
<input id="pickACard" type="button" value="Pick Your Card of the Day"/> 

<!--  	<button type='button' onclick='shufle_cards()'>Show Shuffle</button> -->
<!--	<button type='button' onclick='open_all_cards()'>Open all</button>-->
<!--	<button type='button' onclick='close_all_cards()'>Close all</button>-->
<!-- cards container -->
<div id='pack_cont'>


	<!-- single card -->
	<div class='card'>
	<span data-value='A' style="width: 100px; height: 140px;  display: block; background-size: contain;
background-repeat: no-repeat;" /></span>
	</div>
	<!-- single card -->
	
		<!-- single card -->
	<div class='card'>
	<span data-value='1' style="width: 100px; height: 140px;  display: block; background-size: contain;
background-repeat: no-repeat;" /></span>
	</div>
	<!-- single card -->
	
		<!-- single card -->
	<div class='card'>
	<span data-value='2' style="width: 100px; height: 140px;  display: block; background-size: contain;
background-repeat: no-repeat;" /></span>
	</div>
	<!-- single card -->
	
		<!-- single card -->
	<div class='card'>
	<span data-value='3' style="width: 100px; height: 140px;  display: block; background-size: contain;
background-repeat: no-repeat;" /></span>
	</div>
	<!-- single card -->
	
		<!-- single card -->
	<div class='card'>
	<span data-value='4' style="width: 100px; height: 140px;  display: block; background-size: contain;
background-repeat: no-repeat;" /></span>
	</div>
	<!-- single card -->
			
</div>
<!-- cards container -->
	<script type="text/javascript" src='shuffleScript.js'></script>
</div>

