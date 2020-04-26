<?php 

// test input function definition
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// return string genre name from enumeration
function parseGenre($data) {
    switch($data){
      case 0: 
        return "Arts & Crafts";
      break;
      case 1:
        return "Food & Drinks";
      break;
      case 2:  
       return  "Movies";
      break;
      case 3:
        return "Music";
      break;
      case 4:
        return "Outdoors & Adventure";
      break;
      case 5:
        return "Party";
      break;
      case 6:
        return "Photography";
      break;
      case 7:
        return "Sports & Fitness";
      break;
      case 8:
        return "Tech";
      break;
      case 9:
        return "Other";
      break;
    }
  

}

// return previous url from enumeration
function parseRouting($data) {
  switch($data){
    case 0: 
      return "home.php";
    break;
    case 1:
      return "myProfile.php";
    break;
    case 2:  
     return  "myEvents.php";
    break;
    case 3:
      return "myAccount.php";
    break;
    case 4:
      return "login.php";
    break;
    default:
      return "index.php";
    break;
  }


}

// parse dates to mm/dd/yyyyy
function parseDate($data) {
  $parts = explode("-", $data);
  $newDate = $parts[1]."/".$parts[2]."/".$parts[0];
  return $newDate; 
}

// parse time to remove seconds
function parseTime($data) {
  $parts = explode(":", $data);
  $newTime = $parts[0].":".$parts[1];
  return $newTime;
}



/*if((!$loggedon) || ($userID == NULL) || ($userName == NULL)) {
    
}*/

?>