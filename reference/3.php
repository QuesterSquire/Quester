<!DOCTYPE html>
<html>
<head>
	<title>K.Clothing</title>
	<link rel="icon"  href="k.ico">
	<link rel="stylesheet" href="project.css">


</head>
<body>


<?php
$_SESSION["uKey"] = "";
$_SESSION["tries"] = 0;
$_SESSION["cvalue"] = "";
?>

<div id="header"><center> <img id="ahuh"src="cute.png" style="width:200px; height: 100px; border-radius: 3000px;">
<h1 id="jk"><em> k . c o l l e c t i o n s </em></h1></center><br><br>
<h2 id="kj"><em> authentic brand clothing </em></h2></div></center><br><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
<form action="home.php" method="post">
	<fieldset><center>
	Email Address/Mobile Number: <input id="email" type="text" name="user"><br>
	Password: <input id = "pass" type="password" name="pass"><br>
    <input type="submit" value="SignIn" name="SignIn">
</form><br>
<span>Not Register?</span><br>
<a href="signup.php">Sign Up First</a><br></center>
</fieldset></center>



?>

</body>
</html>