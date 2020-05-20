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
    case 5:
      return "singleEvent.php?viewEventID=";
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



class testClass {
  private $name;

  public function getName() {
    return $this->$name;
  }
  public function setName(string $data) {
    $this->$name = $data;
  }


}

class Invite {
  private $inviteID;
  private $eventID;
  private $userID;
  private $sendDate;
  private $sendTime;
  private $inviteeChoice;

  function __construct($inviteID, $eventID, $userID, $dateTime, $inviteeChoice) {
    $this->inviteID = (int)$inviteID;
    $this->eventID = (int)$eventID;
    $this->userID = (int)$userID;
    $this->setSendDate($dateTime);
    $this->setSendTime($dateTime);
    $this->inviteeChoice = (int)$inviteeChoice;

  }

  public function getInviteID() {
    return $this->inviteID;
  }
  public function setInviteID($data) {
    $this->inviteID = (int)$data;
  }

  public function getEventID() {
    return $this->eventID;
  }
  public function setEventID($data) {
    $this->eventID = (int)$data;
  }

  public function getUserID() {
    return $this->userID;
  }
  public function setUserID($data) {
    $this->userID = (int)$data;
  }

  public function getChoice() {
    return $this->inviteeChoice;
  }
  public function setChoice($data) {
    $this->inviteeChoice = (int)$data;
  }

  public function getSendDate() {
    return $this->sendDate;
  }
  public function setSendDate($data) {
    $splitDate = explode(" ", $data);
    $this->sendDate = parseDate($splitDate[0]);
  }

  public function getSendTime() {
    return $this->sendTime;
  }
  public function setSendTime($data) {
    $splitDate = explode(" ", $data);
    $this->sendTime = parseTime($splitDate[1]);
  }

}

class Message {
  private $messageID;
  private $sentByID;
  private $recipientID;
  private $subject;
  private $messageBody;
  private $sendDate;
  private $sendTime;
  private $read;

  function __construct($messageID, $sentByID, $userID, $subject, $message, $dateTime, $read) {
    $this->messageID = (int)$messageID;
    $this->sentByID = (int)$sentByID;
    $this->recipientID = (int)$userID;
    $this->subject = $subject;
    $this->messageBody = $message;
    $this->setSendDate($dateTime);
    $this->setSendTime($dateTime);
    $this->read = (int)$read;

  }

  public function getMessageID() {
    return $this->messageID;
  }
  public function setMessageID($data) {
    $this->messageID = (int)$data;
  }

  public function getSentByID() {
    return $this->sentByID;
  }
  public function setSentByID($data) {
    $this->sentByID = (int)$data;
  }

  public function getRecipientID() {
    return $this->recipientID;
  }
  public function setRecipientID($data) {
    $this->recipientID = (int)$data;
  }

  public function getSubject() {
    return $this->subject;
  }
  public function setSubject($data) {
    $this->subject = (string)$data;
  }

  public function getMessageBody() {
    return $this->messageBody;
  }
  public function setMessageBody($data) {
    $this->messageBody = (string)$data;
  }

  public function getSendDate() {
    return $this->sendDate;
  }
  public function setSendDate($data) {
    $splitDate = explode(" ", $data);
    $this->sendDate = parseDate($splitDate[0]);
  }

  public function getSendTime() {
    return $this->sendTime;
  }
  public function setSendTime($data) {
    $splitDate = explode(" ", $data);
    $this->sendTime = parseTime($splitDate[1]);
  }


}


?>