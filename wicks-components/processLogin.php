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
// Connect to MySQL and the BCS350 Database
$mysqli = new mysqli("localhost", "root", NULL, "EventsForAll"); 

if ($mysqli->connection_error) {
    die("connection Failed: " . $mysqli->connection_error);
    echo "<script>console.log('Connection Error...')</script>";
}
else {
    echo "<script>console.log('Connected successfully...')</script>";
}


// Query database for user profile
$query = "SELECT password FROM Users WHERE email = '$logonid' OR WHERE userName = '$logonid'";
$result = $mysqli->query($query);
list($querypassword) = mysqli_fetch_row($result);
echo "<script>console.log('$querypassword');</script>";
}

if($querypassword !== $password){
  $_SESSION['loggedon'] = NULL;
  $_SESSION['user'] = NULL;
  header("Location: ./login.php");
}
elseif($querypassword === $password) {
  $_SESSION['loggedon'] = TRUE;
  $_SESSION['user'] = $logonid;
  header("Location: ./home.php");
}
else{
    $_SESSION['loggedon'] = NULL;
    $_SESSION['user'] = NULL;
    header("Location: ./login.php");
}






?>