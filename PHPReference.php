<!DOCTYPE html>
<html>
<head>
	<title>title</title>
</head>
<body>

	<?php  
		
		$characterName = "Tom";
		$characterAge = 69;

		echo "there was a man named $characterName . <br>";
		echo "He was $characterAge Years old.";

		$Varaible = "Quest Loyola";
		$Int = 69;
		$Double = 69.69;
		$Boolean = False; /* or true Depending on the Statement*/

		echo $Variable[0]; /* Displays 'Q'*/
		echo str_replace("Quest", "Quester", $Variable); /*Replaces Quest to Quester*/

		echo substr($Variable, 6); /*echoes starts with Loyola*/
		echo substr($Variable, 6, 3);  /*echoes only Loy*/

		$num = 10;
		$num += 4; /*Outputs 14*/
		$num -= 4; /*Outputs 6*/
		$num *= 4; /*Outputs 40*/
		$num /= 2; /*Outputs 5*/

		echo abs(-69); /*Outputs Positive Integer*/
		echo pow(2, 4); /*Outputs 2 raised to 4 which is 16*/
		echo sqrt(144); /*Outputs the Square Root which is 16*/

		echo max(6,9); /*Outputs Highest number which is 9 */
		echo min(6,9); /*Outputs lowest Number which is 6*/
		echo round(36.9) /*Outputs 37*/
		echo round(36.2) /*Outputs 36*/
		echo ceil(36.1) /*Outputs 37*/
		echo floor(36.9)/*Outputs 36*/
	?>

	<form action="PHPReference.php" method="POST">
		Username: <input type="text" name="uname">
		Password: <input type="Password" name="Password">
		<input type="submit" name="">
	</form>
	<br>
	Your Username is : <?php echo $_POST["uname"];?>
	<br>
	Your Password is : <?php echo $_POST ["Password"];?>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<form action="PHPReference.php" method="POST">
		Num1: <input type="number" name="Num1">
		Num2: <input type="number" name="Num2">
		<input type="submit">
	</form>
	<br>
	The Sum is: <?php  echo $_POST["Num1"] + $_POST["Num2"] ; ?>
	
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<form action="PHPReference.php" method="POST">
		First Child : <input type="text" name="child1">
		Second Child : <input type="text" name="child2">
		<input type="submit">
	</form>
	<br>
	
	<?php 
		$child1 = $_POST["child1"]
		$child2 = $_POST["child2"]
		echo "The name of the First Victim is $child1 <br>"
		echo "The name of the Second Victim is $child2 <br>"

		$Friends = array("Quest", "KD", "Carlos");
		echo $Friends[0]; /* Outputs Quest*/
		$Friends[1] = "Howard"; /* Changes KD to Howard */
		echo count($Friends); /* Outputs number of var in array*/
	 ?>
	
	<form action="PHPReference.php" method="POST">
		Sinigang: <input type="checkbox" name="puds[]" value = "sinigang">
		Siomai: <input type="checkbox" name="puds[]" value = "siomai">
		Siopao: <input type="checkbox" name="puds[]" value = "siopao">
		<input type="submit">
	</form>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<?php 
	$puds = $_POST["puds"];
	echo $puds[0]; /*Outputs Sinigang*/ 
	?>
	 <form action="PHPReference.php" method="POST">
	 	Student: <input type="text" name="Student">
	 	<input type="submit">
	 </form>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	 <?php 
	 	$Grades = array("Quest" => "1.0 GWA" , "Howard" => "5.0 GWA" );
		$Grades["Quest"]; /*Outputs 1.0 GWA*/
		$Grades["Howard"] = "Di kasama sa Graduating List";
		echo $Grades[$_POST[Student]];
	  ?>

	  <?php 
	  	function HelloMyChild($ChildName)
	  	{
	  		echo "$ChildName is my child <br>";
	  	}
	  	echo HelloMyChild("Daisy");
	  	echo HelloMyChild("Amber");
	  	echo HelloMyChild("Lily")
	   ?>

		<?php  
			$HowardisMale = false;
			if ($HowardisMale) {
				echo "Kasinungalingan! <br>";
			}
			else{
				echo "Bading! <br>";
			}
		?>

		<?php  
			$QuestisCute = true;
			$QuestisGay = false;
			if ($QuestisCute && $QuestisGay) {
				echo "cute ka sana bading ka lang <br>"; 
			}
			elseif ($QuestisCute && !QuestisGay) {
				echo "Iyown! Chalap <br>";
			}
			elseif (!$QuestisCute && $QuestisGay) {
				echo "POTA <br>";
			}
			else{
				echo "Ano ka? <br>";
			}
		?>

		<form action="PHPReference.php" method="GET">
			<input type="text" name="isItAChild">
			<input type="submit">
		</form>
		<br>

		<?php 
			$isItAChild = $_POST["isItAChild"];
			switch ($isItAChild) {
				case 'Howard':
					echo "pota bading";
					break;
				
				default:
					echo "Hello My Child";
					break;
			}
		 ?>
<br>

		<?php //It will loop $while until it reaches 5
			$while = 1;
			while ($while <= 5) {
			 	echo "$while <br>";
			 	$while++;
			 } 
		 ?>

		 <?php 
			for ($i=1; $i <= 5; $i++) { 
				echo "$i <br>"; //same as the while loop above
			}
		 ?>
<br>
		<?php 
			$luckyNumbers = array(4, 8, 16, 24, 32, 40 );
			for ($i=0; $i < count($luckyNumbers) ; $i++) { 
				echo "$luckyNumbers[$i] <br>"; //prints out all of the object inside array
			}
		 ?>
<br>
		<?php //similar to for loop but will execute the do statement before reading the while statement.
			$do_while = 6;
			do {
			 	echo "$do_while <br>";
			 	$do_while++;
			 } while ($do_while <= 5); 
			 	echo "$while <br>";
			 	$while++;
		 ?>
<br>		
		<?php 
			class book
			{
				var $title;
				var $author;
				var $pages;

					function __construct(){ //contructor 1
						echo "New Book Created <br>";
					}	
					function __construct($name){//constructor2
						echo $name <br>;
					}
					function __construct($aTitle, $aAuthor, $aPages){
						$this->title = $aTitle;
						$this->author = $aAuthor;
						$this->pages = $aPages;
					}
			}

			$book1 = new book();
			$book1->title = "Harry Potter";
			$book1->author= "JK Rowling";
			$book1->pages= "6969";

			$book3 = new book("Game of Thrones","Quester","4567");

			echo $book1->author;
			echo $book3->author;
		 ?>

		 <?php
		 	class Student
		 	{
		 		var $name;
		 		var $course;
		 		var $gwa;
		 	
		 		function __construct($name,$course,$gwa)
		 		{
		 			$this->name = $name;
		 			$this->course = $course;
		 			$this->gwa = $gwa;
		 		}
		 		function Passed(){
		 			if ($this->gwa <= 3.75) { //Less than 3.75 because 1.00 is greater than 3 in grading system
		 				return "true"; //boolean
		 			}
		 			return "false";
		 		}
		 	}

		 	$Student1 = new Student("Quester","IT",1.50);
		 	$Student2 = new Student("Howard", "HRM",5.00);

		 	echo $Student1->Passed(); //output is true becuse it is passed
		 	echo $Student2->Passed(); //output is false because it is failed
		  ?>

		<?php 
			class movie
			{
				public $title;
				private $rating;

				function setRating($rating){
					if ($rating == "G" || $rating == "PG" || $rating == "SPG") {
						$this->rating = $rating;
					}
					else{
						$this->rating = "NR"; // if the set rating is not in the if statement NR will be the output
					}
				}
				function __construct($title, $rating)
				{
					$this->title = $title;
					$this->setRating($rating);
				}
				function getRating(){
					return $this->rating;
				}
			}
			$avengers = new movie("Avengers","PG");
			// echo $avengers->rating; this code will not run because rating is private
			echo $avengers->setRating("SPG");
			echo $avengers->getRating();
		 ?>

		<?php 
			class chef {
				function makeChicken(){
					echo "The chef made Chicken";
				}
			}
			class ItalitanChef extends chef //The italian chef can access both functions makeChicken and makePasta
			{
				function makePasta()
				{
					echo "The chef made Pasta";
				}
			}
		 ?>	





</body>
</html>