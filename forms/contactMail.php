<?php
  /**
   * @uthor Le-Roy Jongwe
   * @date Sunday 25 April 2021
   */
  
   //get user submited form data
  require "../config/connect.php";

  if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
  {
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']))
    {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];

      //initialise client class
      $client = new Client($name, $email, $message);
      $client->setQuery($mysql);
      $client->processQuery($mysql);
      $mysql->close();
    }else{
      echo "All fields must be filled in";
    }
  }

  //class to process and save data in database
  class  Client
  {
    private $name = null;
    private $email = null;
    private $message = null;
    private $query = "";

    function __construct($name, $email, $message)
    {
      $this->name = $name;
      $this->email = $email;
      $this->message = $message;
    }

  function getName(){
      return $this->name;
  }
  function getEmail(){
      return $this->email;
  }
  function getMessage(){
      return $this->message;
  }

  function escapeString($arg1, $arg2)
  {
      return mysqli_real_escape_string($arg1, $arg2);
  }

  function setQuery($arg1)
  {
      $this->query = "INSERT INTO contact(name, email, message) VALUES('".$this->escapeString($arg1, $this->getName())."', '".$this->escapeString($arg1, trim( $this->getEmail()) )."', '".$this->escapeString($arg1, $this->getMessage())."')";

  }

  function getQuery(){
      return $this->query;
  }

  function processQuery($mysqli){
      $result = $mysqli->query($this->getQuery());
      if($result){
          echo json_encode("Message has been successfully delivered. We will get back to you soon. Thank you!");
      }else{
          echo json_encode("failed");
      }
  }
  }
?>
