<?php
$postdata = file_get_contents("php://input"); 
$account="mail";//gmail
$password="password";//passord
$to="noureddine0elmouden@gmail.com";
$from="mr.geek0011@gmail.com";
$from_name="noureddine elmouden";
$data = "First Name : ".$_POST["fname"]."<br>"."Last Name : ".$_POST["lname"]."<br>"."Email : ".$_POST["email"]."<br>"."Subject : ".$_POST["subject"]."<br>"."message : ".$_POST["message"]."<br>";
$subject="HTML message";
/*End Config*/


include("phpmailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth= true;
$mail->Port = 465;
$mail->Username= $account;
$mail->Password= $password;
$mail->SMTPSecure = 'ssl';
$mail->From = $from;
$mail->FromName= $from_name;
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $data;
$mail->addAddress($to);
if(!$mail->send()){
 echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    header('Location: http://localhost/phpmailerout/index.php');
}
?>
