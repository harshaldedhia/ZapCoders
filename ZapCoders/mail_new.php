<?php
require_once "Mail.php";

$from = 'dharmikjoshi98@gmail.com';
$to = 'harshal.ad@somaiya.edu';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'dharmikjoshi98@gmail.com',
        'password' => 'YOUR_PASSWORD_HERE'
    ));
	
if (PEAR::isError($smtp)) {
    echo $smtp->getMessage() . "\n" . $smtp->getUserInfo() . "\n";
    die();
}

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}

?>