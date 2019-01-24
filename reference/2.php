
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="una.css">
    <link rel="icon" href="ulol.ico">
</head>
<body>
<center>
<?php
//declaration of variables to be used
$uFName = "";
$uLName = "";
$uKey = "";
$passW1 = "";
$passW2 = "";
$gender = "";
$bdate = "";



$uFNameErr = "";
$uLNameErr = "";
$uKeyErr = "";
$passW1Err = "";
$passW2Err = "";
$matchErr = "";
$genErr = "";
$bdateErr = "";

$servername = "localhost";
$username = "root";
$password = "";
$database = "testingDb";
$table = "tblFinalPt";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if(mysqli_connect_error()){
    die("Connection failed: " . mysqli_connect_error());
}
//validation
if(isset($_POST["SignUp"]))
{
    $insertOk = true;
    if(empty($_POST['fName'])){
        $uFNameErr = "Please enter firstname first";
        $insertOk = false;
    }else{
        $uFName = $_POST['fName'];
        $insertOk = true;
    }
    if(empty($_POST['lName'])){
        $uLNameErr = "Please enter lastname first";
        $insertOk = false;
    }else{
        $uLName = $_POST['lName'];
        $insertOk = true;
    }
    if(empty($_POST['userN'])){
        $uKeyErr = "Please enter Email/Mobile first";
        $insertOk = false;
    }else{
        $uKey = $_POST['userN'];
        $insertOk = true;
    }
    if(!isset($_POST['gender'])){
        $genErr = "Please choose Gender first";
        $insertOk = false;
    }else{
        $insertOk = true;
    }
    if(empty($_POST['bdate'])){
        $bdateErr = "Please enter birthday first";
        $insertOk = false;
    }else{
        $bdate = $_POST['bdate'];
        $insertOk = true;
    }

    if(!empty($_POST['password1'])){
        if (!empty($_POST['password2'])){
            $passW1 = $_POST['password1'];
            $passW2 = $_POST['password2'];
            if($passW1 != $passW2){
                $matchErr = "Password did not match";
                $insertOk = false;
            }
            else{
                $insertOk = true;
            }
        }
        else{
            $passW2Err = "Please enter Confirm Password first";
            $insertOk = false;
        }
    }
    else{
        $passW1Err = "Please enter Password first";
        $insertOk = false;
    }
    if($insertOk){
        $target_dir = "";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $imageOk = true;
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.". "<br>";
            $imageOk = false;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.". "<br>";
            $imageOk = false;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($imageOk == false) {
            echo "Sorry, your file was not uploaded.". "<br>";
        // if everything is ok, try to upload file
        } else {
            //insert query
            $imgData =addslashes (file_get_contents($_FILES['fileToUpload']['tmp_name']));
            $sql = "INSERT INTO " . $table . " VALUES (default, '$uFName', '$uLName', '$uKey', '$passW1', '$gender', '$imgData','$bdate');";
            if (mysqli_query($conn, $sql)) {
                echo "Insert successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
    else{
        echo "Complete fields first<br>";
    }
}
?>
<h2> SIGN UP </h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    First Name: <input type="text" name="fName" value="<?php echo htmlentities($uFName); ?>">
    <span>*<?php echo $uFNameErr; ?></span><br>
    Last Name: <input type="text" name="lName" value="<?php echo $uLName; ?>">
    <span>*<?php echo $uLNameErr; ?></span><br>
    Email Address/Mobile Number: <input type="text" name="userN" value="<?php echo $uKey; ?>">
    <span>*<?php echo $uKeyErr; ?></span><br>
    Password: <input type="password" name="password1">
    <span>*<?php echo $passW1Err; ?></span><br>
    Confirm Password: <input type="password" name="password2">
    <span>*<?php echo $passW2Err . " " . $matchErr; ?></span><br>
    Gender: <br>
    Male <input type="radio" name="gender" <?php if(isset($gender) && $gender=="Male") echo "checked"; ?> value="Male">
    Female <input type="radio" name="gender" <?php if(isset($gender) && $gender=="Female") echo "checked"; ?> value="Female">
    <span>*<?php echo $genErr; ?></span><br>
    Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload"><br>
    Birthdate: <input type="date" name="bdate" max="2017-09-14" value="2017-09-14"><span>*<?php echo $bdateErr; ?></span><br>

    <input type="submit" value="SignUp" name="SignUp">
</form><br>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "testingDb";
    $table = "tblFinalPt";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if(mysqli_connect_error()){
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connection successfully established..." . "<br>";
?>
<br><br>
<h2>Search</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Last Name: <input type="text" name="lName"><br>
    <input type="submit" name="Search" value="Search">
</form><br>
<h2>Delete</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Customer ID: <input type="number" name="studId" min="1"><br>
    <input type="submit" name="Delete" value="Delete">
</form><br>


</form><br>
<?php
    //Code for Select
    if(isset($_POST["Search"]))
    {
        if(!empty($_POST['lName'])){
            $studLName = $_POST['lName'];
            $sql = "Select * from " . $table . " where lName like '" . $studLName . "%';";
            showTable();
        }
        else{
            $sql = "Select * from " . $table . ";";
            showTable();
        }
    }
    // Code for Delete
    if(isset($_POST["Delete"]))
    {
        if(!empty($_POST['studId'])){
            $studId = $_POST['studId'];
            $sql = "Delete from " . $table . " where userId = " . $studId . ";";
            if(mysqli_query($conn, $sql)){
                
                $sql = "Select * from " . $table . ";";
                showTable();
                echo "Successfully deleted!". "<br>";
            }else{
                echo "Error! Could not able to execute $sql. " . mysqli_error($conn). "<br>";
            }
        }
    }
   
    //Code for Update
    if(isset($_FILES["fileToUpload2"]))
    {
        $target_dir = "";
        $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
        $uploadOk = 1;
        // Check if image file is a actual image or fake image
        if(isset($_POST["Update"])) {
            $studId2 = $_POST['studId2'];
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".<br>";
                $uploadOk = 1;
            } else {
                echo "File is not an image.". "<br>";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.". "<br>";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload2"]["size"] > 500000) {
            echo "Sorry, your file is too large.". "<br>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.". "<br>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.". "<br>";
        // if everything is ok, try to upload file
        } else {
            echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.<br>";
            $imgData =addslashes (file_get_contents($_FILES['fileToUpload2']['tmp_name']));
            $studFName = $_POST['fName2'];
            $studLName = $_POST['lName3'];
            $sql = "UPDATE " . $table . " SET fName = '$studFName', lName = '$studLName',  studPic = '$imgData' where studId = $studId2;";

            if (mysqli_query($conn, $sql)) {
                echo "Upload successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            $sql = "Select * from " . $table . ";";
            showTable();
        }
    }
    mysqli_close($conn);
    //function of showing table
    function showTable(){
        global $conn, $sql,$table;
        if ($result=mysqli_query($conn, $sql)) {
            if(mysqli_num_rows($result)>0){
                echo "<table>";
                    echo "<tr>";
                        echo "<th>userId</th>";
                        echo "<th>fName</th>";
                        echo "<th>lName</th>";
                        echo "<th> birthdate</th>";
                        echo "<th>disPic</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['userId'] . "</td>";
                        echo "<td>" . $row['fName'] . "</td>";
                        echo "<td>" . $row['lName'] . "</td>";
                        echo "<td>" . $row['birthdate'] . "</td>";
                        echo "<td>" . '<img src="data:image/jpeg;base64,'.base64_encode( $row['disPic'] ).'" width="100" height="100"/>' . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($result);
            } else{
                echo "No records match were found.". "<br>";
            }
        }else{
            echo "ERROR: Could not able to execute $sql." . mysqli_error($conn). "<br>";
        }
        // Code for selecting specific data from database, sample is getting the last number
    }
?>
<center><a href="signin.php"> back to Login </a></center>
</body>
</html>