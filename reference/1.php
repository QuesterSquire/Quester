<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
$cname = "pWordTry";
$timer = 10;
include('ptFinal.php');
//if the SignIn button was pressed
if(isset($_POST['SignIn']))
{
	//do this if some username is locked
	if(isset($_COOKIE[$cname])) {
		//do this if the username is not in the list of the locked username
		if($_POST['user'] != $_COOKIE[$cname])
		{
			//check if the userKey is present in database
			$_SESSION["uKey"] = $_POST['user'];//save the inputted username in the variable session userkey
			$passW = $_POST['pass'];//save the inputted password in the variable password
			$sql = "Select userKey, password, fName, lName, disPic from " . $table . " where userKey = '" . $_SESSION["uKey"] . "';";//create select query
			$result=mysqli_query($conn, $sql);//initiate the query
			$ans = mysqli_fetch_row($result);//get the result of the query and transfer it to array variable
			//do this if username is present in database
			if($ans[0] == $_SESSION["uKey"]){
				//if the userKey is present in database, check the passW if correct
				//do this if the passW is correct
				if($ans[1] == $passW){
					include ("2nd.html");
					echo "Welcome ". $ans[2] . " " . $ans[3] . "<br>";//display Welcome with firstname & lastname
				
				}
				//do this if the passW is incorrect
				else{
					$_SESSION["tries"]++;//increment the # of invalied password tries
					echo "Is this you ". $ans[2] . " " . $ans[3] . "?<br>";//display this message with firstname & lastname
					echo '<img src="data:image/jpeg;base64,'.base64_encode( $ans[4] ).'" width="100" height="100"/>' . "<br>";//display the image of the inputted username
					echo "Wrong password for this username " . $ans[0] . "<br>";//display this message with the username
					include('passwordOnly.php');//display this form
				}
			}
			//do this if the userKey is not present in database
			else{
				echo "You are not registered yet!<br>";//display this message
				session_destroy();//destroy the session before starting a session again in signin.ph
				include('signin.php');//display this form
			}
		}
		//do this if the username is in the list of the locked username
		else{
			echo "Account is Locked for $timer<br>";//display this message
			session_destroy();//destroy the session before starting a session again in signin.ph
			include('signin.php');//display this form
		}
	}
	//do this if no username is locked
	else{
		$_SESSION["cvalue"] = "";//blank the variable session cvalue
		//check if the userKey is present in database
		$_SESSION["uKey"] = $_POST['user'];//save the inputted username in the variable session userkey
		$passW = $_POST['pass'];//save the inputted password in the variable password
		$sql = "Select userKey, password, fName, lName, disPic from " . $table . " where userKey = '" . $_SESSION["uKey"] . "';";//create select query
		$result=mysqli_query($conn, $sql);//initiate the query
		$ans = mysqli_fetch_row($result);//get the result of the query and transfer it to array variable
		//do this if username is present in database
		if($ans[0] == $_SESSION["uKey"]){
			//if the userKey is present in database, check the passW if correct
			//do this if the passW is correct
			if($ans[1] == $passW){
				include("2nd.html");//display Welcome with firstname & lastname
			}
			//do this if the passW is incorrect
			else{
				$_SESSION["tries"]++;//increment the # of invalied password tries
				echo "Is this you ". $ans[2] . " " . $ans[3] . "?<br>";//display this message with firstname & lastname
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $ans[4] ).'" width="100" height="100"/>' . "<br>";//display the image of the inputted username
				echo "Wrong password for this username " . $ans[0] . "<br>";//display this message with the username
				include('passwordOnly.php');//display this form
			}
		}
		//do this if the userKey is not present in database
		else{
			echo "You are not registered yet!<br>";//display this message
			session_destroy();//destroy the session before starting a session again in signin.ph
			include('signin.php');//display this form
		}
	}
}
//if the SignInPassOnly button was pressed
if(isset($_POST['SignInPassOnly']))
{
	$passW = $_POST['pass'];//save the inputted password in the variable password
	$sql = "Select userKey, password, fName, lName, disPic from " . $table . " where userKey = '" . $_SESSION["uKey"] . "';";//create select query
	$result=mysqli_query($conn, $sql);//initiate the query
	$ans = mysqli_fetch_row($result);//get the result of the query and transfer it to array variable
	//do this if the passW is correct
	if($ans[1] == $passW){
		echo "Welcome ". $ans[2] . " " . $ans[3] . "<br>";//display Welcome with firstname & lastname
	}
	//do this if the passW is incorrect
	else{
		//do this if some username is not locked
		if(!isset($_COOKIE[$cname])) {
			//do this if the number of invalid password tries is not 3
			if($_SESSION["tries"] < 3){
				$_SESSION["tries"]++;//increment the # of invalied password tries
				echo "Is this you ". $ans[2] . " " . $ans[3] . "?<br>";//display this message with firstname & lastname
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $ans[4] ).'" width="100" height="100"/>' . "<br>";//display the image of the inputted username
				echo "Wrong password for this username " . $ans[0] . "<br>";//display this message with the username
				include('passwordOnly.php');//display this form
			}
			//do this if the number of invalid password tries is 3
			else{
				$_SESSION["cvalue"] = "" . $ans[0];//set the value of variable session cvalue
				setcookie($cname, $_SESSION["cvalue"], time() + $timer);//set the cookie
				echo "Account is Locked for $timer<br>";//display the image
				session_destroy();//destroy the session before starting a session again in signin.ph
				include('signin.php');//display this form
			}
		}
		//do this if some username is locked
		else{
			//do this if the username is not in the list of the locked username
			if($_SESSION["uKey"] != $_COOKIE[$cname]){
				//do this if the number of invalid password tries is not 3
				if($_SESSION["tries"] < 3){
					$_SESSION["tries"]++;//increment the # of invalied password tries
					echo "Is this you ". $ans[2] . " " . $ans[3] . "?<br>";//display this message with firstname & lastname
					echo '<img src="data:image/jpeg;base64,'.base64_encode( $ans[4] ).'" width="100" height="100"/>' . "<br>";//display the image of the inputted username
					echo "Wrong password for this username " . $ans[0] . "<br>";//display this message with the username
					include('passwordOnly.php');//display this form
				}
				//do this if the number of invalid password tries is 3
				else{
					$_SESSION["cvalue"] = "" . $ans[0];//set the value of variable session cvalue
					setcookie($cname, $_SESSION["cvalue"], time() + $timer);//set the cookie
					echo "Account is Locked for $timer<br>";//display the image
					session_destroy();//destroy the session before starting a session again in signin.ph
					include('signin.php');//display this form
				}
			}
			//do this if the username is in the list of the locked username
			else{
				echo "Account is Locked for $timer<br>";//display the image
				session_destroy();//destroy the session before starting a session again in signin.ph
				include('signin.php');//display this form
			}
			if ($_POST['Admin'] == "Admin") {
				include("signup.php");
			}
			
		}
	}
}

?>





</body>
</html>