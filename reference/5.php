<!DOCTYPE html>
<html>
<head>
	<title>K.Clothing</title>
	<link rel="icon"  href="k.ico">
	<link rel="stylesheet"href="project.css">


</head>
<body>
<?php
function Greet($name){
	echo "$name Kristal! <br>";
}
 Greet("Welcome");
 ?>

<?php 
$cate = (isset($_GET['cate']) ? $_GET['cate'] : null);

switch ($cate) {
	case "Tops":
		
			include ("3rd.html");
			return;
		

		case "Shoes":
			
				include ("4th.html");
				return;
			
			case "Bags":
			
				include ("5th.html");
				return;
				

				case "Denims":
			
				include ("6th.html");
				return;
				
		default;{
			echo "No chosen Category";
		}

		break;
}

?>
</body>
</html>