<?php

namespace UserClass;
require_once './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use Database\Database;

class UserClass extends Database
{


  /**
   * Fetches content from database
   *
   * @return array
   *
   */
  public function getContent()
  {
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
  public function createAccount($name, $email, $password)
  {
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

  /**
   * Used to calculate the total amount of the products combined
   *
   * @param null $productId
   *
   * @return array
   *
   */
  public function calculateAmount($productId = NULL)
  {
    $sql = "SELECT price FROM Snacks WHERE id='" . $productId . "'";
    $output = mysqli_query($this->link, $sql);
    $data = mysqli_fetch_array($output);
    return $data[0];
  }

  /**
   * Used to sort the items
   *
   * @param mixed $product
   *
   * @return array
   *
   */
  public function sortItems($product)
  {
    $sql = "Select * from Snacks WHERE type='" . $product . "' ";
    return ($this->link->query($sql)->fetch_all(MYSQLI_ASSOC));
  }

  /**
   * Facilitates sending of mail
   *
   * @param mixed $name
   * @param mixed $email
   * @param mixed $phone
   * @param mixed $price
   *
   * @return void
   *
   */
  public function sendMail($name, $email, $phone, $price)
  {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sandiptasardar99@gmail.com';
    $mail->Password = 'lwkbmdihsqvbqple';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('sandiptasardar99@gmail.com');
    $mail->addAddress('shuva.mallick@innoraft.com');
    $mail->isHTML(true);
    $mail->Subject = 'Order Confirmation';
    $mail->Body = '<h1>Hello  ' . $name . '</h1><br>
    <p>Your Order of Rupees'.$price.' is confirmed </p><br>
    User Phone Number : '.$phone.'<br>
    User Email ID :'.$email.'';
    $mail->send();
  }


  /**
   * Used to generate a document consisting of information
   *
   * @param mixed $name
   * @param mixed $email
   * @param mixed $phone
   * @param mixed $price
   *
   * @return void
   *
   */
  public function makePdf($name,$email,$phone,$price) {

    $pdf = new \FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell(0, 10, "Order Details", 1, 1, 'C');
    $pdf->Cell(100, 10, "Name", 1, 0, 'C', true);
    $pdf->Cell(0, 10, $name, 1, 1, 'C', true);
    $pdf->Cell(100, 10, "Email", 1, 0, 'C');
    $pdf->Cell(0, 10, $email, 1, 1, 'C');
    $pdf->Cell(100, 10, "Phone Number", 1, 0, 'C', true);
    $pdf->Cell(0, 10, $phone, 1, 1, 'C', true);
    $pdf->Cell(100, 10, "Total Cost", 1, 0, 'C');
    $pdf->Cell(0, 10, $price, 1, 1, 'C');
    $file = 'order-' . time() . '.pdf';
    $pdf->Output($file, 'D');

  }
}

?>
