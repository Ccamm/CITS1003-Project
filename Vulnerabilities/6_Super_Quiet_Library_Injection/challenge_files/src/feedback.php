<?php
include("db.php");

if (isset($_POST)) {
  if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $db->exec("INSERT INTO feedback ('name', 'email', 'message') VALUES ('$name', '$email', '$message')");
    echo "Thank you for providing feedback $name!";
  }
}
?>
