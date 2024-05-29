<?php
// Sanitize and validate inputs
$to = "manojdalai7142@gmail.com";
$cc = "dalamanoji@gmail.com"; 
// Replace with your email address
$from = filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL);
$name = htmlspecialchars($_REQUEST['name']);
$subject = htmlspecialchars($_REQUEST['subject']);
$number = htmlspecialchars($_REQUEST['number']);
$cmessage = htmlspecialchars($_REQUEST['message']);

if ($from && $name && $subject && $cmessage) {
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "Cc: $cc\r\n"; // Add Cc header
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "New mail from manoj.codes";

    $logo = 'img/mylogo.png';
    $link = '#';

    $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
    $body .= "<a href='{$link}'><img src='{$mylogo}' alt=''></a><br><br>";
    $body .= "</td></tr></thead><tbody><tr>";
    $body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
    $body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
    $body .= "</tr>";
    $body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
    $body .= "<tr><td style='border:none;'><strong>Contact Number:</strong> {$number}</td></tr>";
    $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
    $body .= "</tbody></table>";
    $body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);

    if ($send) {
        echo "Mail sent successfully.";
    } else {
        echo "Mail sending failed.";
    }
} else {
    echo "Invalid input.";
}
?>
