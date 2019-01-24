	//CaSe SeNsItIvE!!
	/*****
	\'
	\"
	\\
	\n new line
	\r carriage return
	\t tab
	\b backspace
	\f form feed
	*****/
	console.log("Hello World");
	var myName = "Quest";
	myName = 8 ;
	let ourName = "Freecodecamp";
	const pi = 3.14 ;

	var a = 5;
	var b = 10;
	var c = "I am a";

	console.log(a += 1);
	console.log(b += 5);
	console.log(c = c + " String");

	var sum = 10 + 10;
	console.log(sum);
	var diff = 10 - 5;
	var quot = 10 / 2;
	
	var myVar = 68;
	console.log(myVar++);
	console.log(myVar--);
	
	var remainder;
	remainder = 11 % 3;
	console.log(remainder);

	var myStr = " I am a \"double quoted string inside\" a string"
	console.log(myStr); 

	var MyLink = '"https://www.youtube.com/watch?v=PkZNo7MFNFg"';
	console.log(MyLink);

	var varJoined = "whut"+"mama mo"+"huwaw";
	console.log(varJoined);

	var varPlus = "First";
	varPlus += "Second";
	console.log(varPlus);

	var nameLength = 0;
	var nameStud = "Quest";
	nameLength = nameStud.length;
	console.log(nameLength);


	var firstLetter = "";
	var lastLetter = "";
	var nameStud2 = "Quest";
	firstLetter = nameStud2[0];
	lastLetter = nameStud2[nameStud2.length -1];
	console.log(firstLetter);
	console.log(lastLetter);


	function wordBlank(myNoun, myAdj, myVerb, myAdv)
	{
		var result = "";
		result += "The " + myAdj +" "+ myNoun +" "+ myVerb +" "+ myAdv;
		return result;
	}
	console.log(wordBlank("Atabs","Pretty","ran","quickly"));

	var normieArray = ["John", "Quester", 69];
	console.log(normieArray[2]);

	var changeArray = normieArray[2] = 12;
	console.log(changeArray);

	var nestedArray = [["John", "Loyola"], ["Jenella", "Sy"]];
	console.log(nestedArray[1]);
	console.log(nestedArray[1][0]);

	var pushArray = ["Loyola", "J", "Atabs"];
	pushArray.push(["Chalap","Sarap"])
	console.log(pushArray[1]);
	console.log(pushArray[3][0]);

	var newArray = ["John", "Quester", "Loyola"];
	console.log(newArray);
	var popedArray = newArray.pop();
	console.log(newArray);
	console.log(popedArray);

	var newNewArray = ["John", "Quester", "Loyola"];
	console.log(newNewArray);
	var shiftedArray = newNewArray.shift();
	console.log(newNewArray);
	console.log(shiftedArray);


	newNewArray.unshift("Squire");
	console.log(newNewArray);
///////////////////////////////////////////////////
	function minusNumber(num)
	{
		return num - 1;
	}
	console.log(minusNumber(10));
//////////////////////////////////////////////////

	function change(num) {
		return (num + 1) * 2;
	}
	var changed = 0
	changed = change(2);
	console.log(changed);
//////////////////////////////////////////////////

	function testEqual(val)
	{
		if(val == 12)
		{
			return "Equal";
		}
		else
		{
			return "Nope";
		}
	}

	console.log(testEqual(12));
	/////////////////////////////////////////////////
	function testNewEqual(val)
	{
		// 12===12 true // 12 ==='12' false // 12 !== 12 false // 12 !== "12" true //
		if(val === '12')
		{
			return "Equal";
		}
		else
		{
			return "Nope";
		}
	}

	console.log(testNewEqual(12));
///////////////////////////////////////////////////
	function testComparison(a,b)
	{
		// 12===12 true // 12 ==='12' false // 12 !== 12 false // 12 !== "12" true //
		if(a === b)
		{
			return "Equal";
		}
		else
		{
			return "Nope";
		}
	}

	console.log(testComparison(12, "12"));
///////////////////////////////////////////////////

	function caseInSwitch(val)
	{
		var answer = ""
	}