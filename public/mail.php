<?php


$response = ['response'=>'error'];

if(isset($_POST['email'])
    && isset($_POST['message'])
    && isset($_POST['name'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $to = 'conny@greenalligator.com';
        $subject = 'New message from MICE website';

        $headers = "From: " . strip_tags($email) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
//        $headers .= "CC: susan@example.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $content = '<html><body>';
        $content .= '<p>Costumer: '.$name.'</p>';
        $content .= '<p>Email: '.$email.'</p>';
        $content .= '<p>Message: '.$message.'</p>';
        $content .= '</body></html>';

        mail($to, $subject, $content, $headers);

        $response = ['response' => 'success'];
    }
}

echo json_encode($response);