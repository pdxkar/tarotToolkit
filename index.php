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
      <link rel="stylesheet" type="text/css" href="style.css" /> 
  <title>The Recipe Center</title>
</head>
<body>
  <div id="header">
       <?php include("header.inc.php"); ?>
  </div>
  <div id="content">
    <div id="nav">
         <?php include("nav.inc.php"); ?>
    </div>
    <div id="main">
           <?php
                   if (!isset($_REQUEST['content']))
                       include("main.inc.php");
                   else
                   {
                       $content = $_REQUEST['content'];
                       $nextpage = $content . ".inc.php";
                       include($nextpage);
                   }
                  ?>
    </div>
    <div id="news">
           <?php include("news.inc.php"); ?>
    </div>
  </div> 
  <div id="footer">
         <?php include("footer.inc.php"); ?>
  </div>
  <!-- is this db section still necessary? -->
  <div id="db">
  		<?php include("db.inc.php"); ?>
  </div>
</body>
</html>