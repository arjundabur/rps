<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php

$ipaddress = getenv("REMOTE_ADDR") ;
$name = $_POST["studentname"];
$class = $_POST["class"];
$section = $_POST["section"];
$message = $_POST["suggestion"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);


$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "rpsk.app@gmail.com";
$mail->Password = "fuoieqerfkrqilme";

$mail->setFrom("rpsk.app@gmail.com");
$mail->addAddress("rpsk.app@gmail.com", "Admin");
$mail->addAddress("suggestionportal@gmail.com", "Admin");

$mail->Subject = ("New Suggestion");
$mail->Body = "Student Name: ". $name ."   |   ". "Class: " . $class ."   |   ". "Section: " . $section."   |   ". "IP Address: " . $ipaddress."   |                                                                                                                      ". "SUGGESTION:   " . $message;

$mail->send();

header("Location: submitted.html");

?>