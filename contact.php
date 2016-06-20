<?php require 'function.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/style.css" media="screen" title="no title" charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" charset="utf-8"></script>
  <link href='https://fonts.googleapis.com/css?family=Roboto|Ubuntu|Raleway|Open+Sans' rel='stylesheet' type='text/css'>
    <title>Kontakta oss</title>
  </head>
  <body>

  <?php
// define variables and set to empty values
$nameErr = $emailErr = $subjectErr = $messageErr = "";
$name = $email = $subject = $comment = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  global $mysqli;
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    echo   '<script type="text/javascript">';
    echo '$(document).ready(function(){
          $("#name").text("Name is required*");});';
    echo '</script>';

  } else {
    $name = $mysqli->real_escape_string($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      echo   '<script type="text/javascript">';
      echo '$(document).ready(function(){
            $("#name").text("Only letters and white space allowed");});';
      echo '</script>';
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    echo   '<script type="text/javascript">';
    echo '$(document).ready(function(){
          $("#email").text("Email is required*");});';
    echo '</script>';
  } else {
    $email =  $mysqli->real_escape_string($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      echo   '<script type="text/javascript">';
      echo '$(document).ready(function(){
            $("#email").text("Invalid email format");});';
      echo '</script>';
    }
  }

  if (!empty($_POST['subject'])) {
    $subject =  "From your Website Contact From, Subject:".$mysqli->real_escape_string($_POST['subject']);
  }

  if (!empty($_POST['message'])) {
    $message = wordwrap($_POST['message'], 70);
  }

  if (empty($nameErr) && empty($emailErr)) {
    //mail(to,subject,message,headers,parameters);
    //mail("gustav_salem@hotmail.com", $subject, $message, $email,$name);
    //send email

    mail("gustav_salem@hotmail.com", "$subject", $message, "From:".$email);
    echo   '<script type="text/javascript">';
    echo '$(document).ready(function(){
          $("#success").text("Email Succesfully sent!");});';
    echo '</script>';
  }
}
?>

    <div class="container">
      <div class="contact_form">
        <div id="success"></div>
        <label id="header"><h1>Kontakt Formulär</h1></label>
        <form  class="form" action="contact.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="action" value="submit"> <!-- Empty om inget skrivits -->
          Name: (Required) <label id="name"></label><br>
          <input class="input" name="name" type="text" value="" size="44"/><br>
          Email: (Required) <label id="email"></label><br>
          <input class="input" name="email" type="text" size="44" /><br>
          Subject:<br>
          <input class="input" name="subject" type="text" size="44"/><br>
          Message:<br>
          <textarea name="message" rows="10" cols="45"></textarea><br><br>
          <input class="btn" type="submit" value="Send email"/>
        </form>


      </div>
    </div>


  </body>
</html>
<?php
