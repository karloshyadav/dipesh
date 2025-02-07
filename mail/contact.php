<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(400); // Bad request
  exit('Please fill in all fields correctly.');
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "waneraayam123@gmail.com"; 
$subject = "$m_subject: $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email\r\n";
$header .= "Reply-To: $email\r\n";
$header .= "Content-Type: text/plain; charset=UTF-8\r\n";

if(!mail($to, $subject, $body, $header)) {
  http_response_code(500);
  echo "Mail sending failed!";
} else {
  echo "Mail sent successfully!";
}
?>
