<?php

require 'phpmailer/PHPMailerAutoload.php';
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$message = $_POST["message"];

$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'crm@paretti.pl';                 // SMTP username
$mail->Password = '';                          // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('crm@paretti.pl', 'Paretti szkolenia');
$mail->addAddress('daniel.bednarczuk@paretti.pl');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Zgłoszenie na kurs VCA';
$mail->Body    = "Nowe zgłoszenie na kurs VCA<br>
                <b>imie :</b>".$name."<br>
                <b>nazwisko :</b>".$lastname."<br>
                <b>numer telefonu :</b>".$phone."<br>
                <b>email :</b>".$email."<br>
                <b>wiadomosc</b>".$message;

if(!$mail->send()) {
    header('Location:index.html');

} else {
    header('Location:index.html');
}






