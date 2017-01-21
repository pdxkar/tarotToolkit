<!-- Session_start() is used to declare sessions in our Web pages. The PHP function session_start() 
automatically sends the required HTML code to the remote Web browser to create a session cookie. 
The session cookie is assigned a unique ID number. When the browser closes, the session cookie is deleted.
You must add the session_start() PHP function to the start of every Web page (not .include pages) in the application that requires 
session information. If the session_start() function is not present, the Web page can't access 
data in the session array variable. (Lesson 10 chap 3)-->
<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <link rel="stylesheet" type="text/css" href="mystyle.css" /> 
   <link rel="stylesheet" type="text/css" href="cardOfTheDayStyle.css" />
      <link rel="stylesheet" media="print" href="mystylePrintable.css" /> 
   <link rel="stylesheet" media="print" href="cardOfTheDayStylePrintable.css" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
	integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
	crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
	integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
	crossorigin="anonymous"></script>
  <title>The Tarot Toolkit</title>
        <script>
         $(function() {
            $( "#datepicker-13" ).datepicker();
            $( "#datepicker-13" ).datepicker("hide");
         });
      </script>
</head>

<body>
  <div id="header">
       <?php include("header.inc.php"); ?>
  </div>
  
  <div id="navigation">
  	<?php include("navigation.inc.php"); ?>
  </div>
  
  <!-- <div id="thisWouldBeContent_inthedistillery> -->
  <!-- The Distillery has its "Content" section here, which is the welcome/resource info banner -->
  <!-- ToDo maybe put this section to use? -->
  <!-- </div> -->
  
  <div id="mainSection">
    <!--   <div id="main"> -->
           <?php
                   if (!isset($_REQUEST['content']))
                       include("homePage.inc.php");
                   else
                   {
                       $content = $_REQUEST['content'];
                       $nextpage = $content . ".inc.php";
                       include($nextpage);
                   }
                  ?>
   <!--  </div> -->
  </div>
  
  <div id="footer">
         <?php include("footer.inc.php"); ?>
  </div>
</body>
</html>