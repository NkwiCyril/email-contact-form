<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>Email Form</title>
</head>
<body>


  <div class="form">
    <h1>Contact Me Anytime!</h1>
    <form action="index.php" method="post">
      <label for="name">Your name:</label>
      <input placeholder="Your name" type="text" name="sender-name" id="sender-name" required autofocus autocomplete>
      <label for="email">
        Your email:
      </label>
      <input placeholder="example@gmail.com" type="email" name="sender-email" id="sender-email" required autocomplete>
      <label for="message"></label>
      <label for="message">Message:</label>
      <textarea placeholder="Your message" name="message" id="message" cols="30" rows="5" required></textarea>
      <input type="submit" value="Send">
    </form>
  </div>

</body>
</html>

<?php
require 'connection.php';

if (!empty($_POST)) {
    $sender_name = $_POST["sender-name"];
    $sender_email = $_POST["sender-email"];
    $message = $_POST["message"];
    $message = str_replace("\n.", "\n..", $message);

    $receiver = "akinimbomnkwi@gmail.com";
    $subject = "From my portfolio website from $sender_name($sender_email)";

    $query = "INSERT INTO client_details (name, email, message) VALUES ('$sender_name', '$sender_email', '$message')";    

    try {
      $response = mail($receiver, $subject, $message);
      mysqli_query($conn, $query);

      echo '<div class="center"><b>Message sent successfully to ' . $receiver . '!!</b></div>';
    } catch (Exception $e) {
        echo "Cannot send message at the moment: " . $e->getMessage();
    }

}
