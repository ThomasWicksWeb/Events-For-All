<?php
session_start();

require './functions.php';

//set form variables and capture form input

if(isset($_POST['userLogin'])) {
  $logonid = test_input($_POST['userLogin']);
}
else{
  $logonid = NULL;
}
if(isset($_POST['passwordLogin'])) {
  $password = test_input($_POST['passwordLogin']);
}
else{
  $password = NULL;
}





if (($logonid != NULL) AND ($password != NULL)){
// Connect to MySQL and the EventsForAll Database
$mysqli = new mysqli("localhost", "TestAdmin", "testadmin1", "EventsForAll"); 


if ($mysqli->connection_error) {
    die("connection Failed: " . $mysqli->connection_error);
    echo "<script>console.log('Connection Error...')</script>";
}
else {
    echo "<script>console.log('Connected successfully...')</script>";
}


// Query database for user profile
$query = "SELECT userPassword FROM Users WHERE userName = '$logonid' OR email = '$logonid'";
$result = $mysqli->query($query);
list($querypassword) = mysqli_fetch_row($result);





 // Query database for user profile
 $query2 = "SELECT userID, userName FROM Users WHERE email = '$logonid' OR WHERE userName = '$logonid'";
 $result2 = $mysqli->query($query2);
 if ($result2->num_rows > 0) {
   // output data of each row
   while($row = $result2->fetch_assoc()) {
       $userID = $row["userID"]; 
       $userName = $row["userName"];
   }

 $_SESSION['userID'] = $userID;
 $_SESSION['userName'] = $userName;
 }



if($querypassword !== $password){
  $_SESSION['loggedon'] = FALSE;
  header("Location: ../login.php");
  
}
elseif($querypassword === $password) {
  $_SESSION['loggedon'] = TRUE;
  header("Location: ../home.php");
}

$mysqli->close();
}
else{
  header("Location: ../login.php");
  $mysqli->close(); 
}



?>