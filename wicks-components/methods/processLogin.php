<?php
session_start();


//set form variables and capture form input

if(isset($_POST['userLogin'])) {
  $logonid = $_POST['userLogin'];
}
else{
  $logonid = NULL;
}
if(isset($_POST['passwordLogin'])) {
  $password = $_POST['passwordLogin'];
}
else{
  $password = NULL;
}


if (($logonid != NULL) AND ($password != NULL)){
// Connect to MySQL and the EventsForAll Database
$mysqli = new mysqli("localhost", "root", NULL, "EventsForAll"); 

if ($mysqli->connection_error) {
    die("connection Failed: " . $mysqli->connection_error);
    echo "<script>console.log('Connection Error...')</script>";
}
else {
    echo "<script>console.log('Connected successfully...')</script>";
}


// Query database for user profile
$query = "SELECT userPassword FROM Users WHERE email = '$logonid' OR WHERE userName = '$logonid'";
$result = $mysqli->query($query);
list($querypassword) = mysqli_fetch_row($result);
echo "<script>console.log('$querypassword');</script>";

$mysqli->close();
}

 /*// Query database for user profile
 $query2 = "SELECT userID, userName FROM Users WHERE email = '$logonid' OR WHERE userName = '$logonid'";
 $result2 = $mysqli->query($query2);
 if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result2->fetch_assoc()) {
       $userID = $row["userID"]; 
       $userName = $row["userName"];
   }
 echo "<script>console.log('$querypassword');</script>";
 echo "<script>console.log('$userName');</script>";
 echo "<script>console.log('$userID');</script>";
 $_SESSION['userID'] = $userID;
 $_SESSION['userName'] = $userName;
 }


}
*/

if($querypassword !== $password){
  $_SESSION['loggedon'] = FALSE;
  header("Location: ../login.php");
  
}
elseif($querypassword === $password) {
  $_SESSION['loggedon'] = TRUE;
  $_SESSION['user'] = $logonid;
  header("Location: ../home.php");
}







?>