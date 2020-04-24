<?php 

//test input function definition
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


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


/*if((!$loggedon) || ($userID == NULL) || ($userName == NULL)) {
    
}*/

?>