<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'DatabaseConfig.php';

class UserClass {

  protected $link;

  function __construct() {
    require_once 'DatabaseConfig.php';
    $this->link = new \mysqli(Server, Username, Password, Database);
    if (mysqli_connect_errno()) {
      throw new \Exception('Connection failed');
      exit;
    }
  }
  /**
   * Fetches content from database
   *
   * @return array
   *
   */
  public function getContent() {
    $sql = "Select * from Snacks";
    return ($this->link->query($sql)->fetch_all(MYSQLI_ASSOC));
  }

  public string $message;

  /**
   * Creates account
   *
   * @param mixed $name
   * @param mixed $email
   * @param mixed $password
   *
   * @return boolean
   *
   */
  public function createAccount ($name,$email,$password) {
    $sql = "SELECT * FROM User WHERE Email='" . $email . "'";
    $check = $this->link->query($sql);
    $row_count = $check->num_rows;
    if ($row_count == 0) {
      $sql1 = "INSERT INTO User (Name,Password,Email) VALUES ('" . $name . "','" . md5($password) . "','" . $email . "')";
      $result = mysqli_query($this->link, $sql1);
      return $result;
    } else {
      // $message = "Account already Exists";
      return false;
    }
  }

  /**
   * Facilitates User Login
   *
   * @param mixed $email
   * @param mixed $password
   *
   * @return boolean
   *
   */
  public function loginUser($email, $password)
  {
    // The md5 functions is being used to encrypt the password inside database
    $sql = "SELECT * from User WHERE Email='" . $email . "' and Password='" . md5($password) . "'";
    $output = mysqli_query($this->link, $sql);
    $row_count = $output->num_rows;

    if ($row_count == 1) {
      return true;
    } else {
      return false;
    }
  }

  public function calculateAmount($productId=NULL) {
    $sql = "SELECT price FROM Snacks WHERE id='" . $productId . "'";
    $output = mysqli_query($this->link, $sql);
    $data = mysqli_fetch_array($output);
    return $data[0];
  }

  public function sortItems($product) {
      $sql = "Select * from Snacks WHERE type='" . $product . "' ";
      return ($this->link->query($sql)->fetch_all(MYSQLI_ASSOC));
    }


}
