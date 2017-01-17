<?php

if(!isset($_SESSION))
{
	session_start();
}

	//if not logged in
	echo "<ul class=\"nav nav-pills\">";
	echo "<li class=\"active\"><a href=\"index.php?\">Home</a></li>";
	echo "<li class=\"dropdown\">";
	echo "<a href=\"#\" data-toggle=\"dropdown\" class=\"dropdown-toggle\">Readings<b class=\"caret\"></b></a>";
	echo "<ul class=\"dropdown-menu\">";
	
	echo "<li><a href=\"index.php?content=mainSection&testId=1
	\">Celtic Cross Spread</a></li>";
	
	echo "<li class=\"divider\"></li>";
	echo "<li><a href=\"index.php?content=cardOfTheDay&testId=1
	\">Card of the Day</a></li>";
	echo "</ul>";
	echo "</li>";
	echo "<ul class=\"nav navbar-nav navbar-right\">";
	echo "<li><a href=\"login.inc.php?\">Login</a></li>";
	echo "<li><a href=\"register.inc.php?\">Register</a></li>";
	echo "</ul>";
	echo "</ul>";

?>


