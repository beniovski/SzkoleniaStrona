 <?php
ob_start();

require 'phpmailer/PHPMailerAutoload.php';
require 'DbMessage.php';

$dbo = new DbOperation();

$name = $_POST["name"];
$lastname = $_POST["lastname"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$message = $_POST["message"];

$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                             	  // Enable verbose debug output

$mail->isSMTP();                                  	 // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  			// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                // Enable SMTP authentication
$mail->Username = 'szkolenia@paretti.pl';                 // SMTP username
$mail->Password = 'Kalina1!';                        	  // SMTP password
$mail->SMTPSecure = 'tls';                          	  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 	   // TCP port to connect to

$mail->setFrom('szkolenia@paretti.pl', 'Paretti szkolenia');
$mail->addAddress('szkolenia@paretti.pl');    		 // Add a recipient

$mail->isHTML(true);                                	  // Set email format to HTML

$mail->Subject = 'Zgloszenie na kurs VCA';
$mail->Body    = "Nowe zgłoszenie na kurs VCA<br>
                <b>imie :</b>".$name."<br>
                <b>nazwisko :</b>".$lastname."<br>
                <b>numer telefonu :</b>".$phone."<br>
                <b>email :</b>".$email."<br>
                <b>wiadomosc</b>".$message;

if($mail->send())
{
	$dbo->insert($name, $lastname, $phone, $email, $message);
	echo "<script>alert('Twoje zgłoszenie na szkolenie VCA zostało wysłane')</script>";
}
else
{
	echo "<script>alert('Nie można wysłać wiadomości skontatuj się z administratorem strony')</script>";
}


echo "<script>location='http://www.vca.paretti.pl'</script>";    
ob_end_flush();
?>




