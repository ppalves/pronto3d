<?php
header('Content-Type: text/plain');
require 'PHPMailer.php';
require 'SMTP.php';

$json = utf8_encode($_POST['fields']);
$data = json_decode($json);

$name   = trim(($data->name));
$email   = trim(($data->email));
$subject = trim(($data->subject));
$message = trim(($data->message));
if ($name == "" || $subject == "" || $message == "" || $email == "") {
    header('HTTP/1.1 400 Bad Request');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array(
        'message' => 'Preencha todos os campos',
        'code' => 1
    )));
} else {
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0; // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'contatopronto3d@gmail.com'; // SMTP username
        $mail->Password   = 'fablab2016'; // SMTP passworsd
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587; // TCP port to connect to
        
        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('contatopronto3d@gmail.com', 'Teste'); // Add a recipient
        $mail->addReplyTo($email, $name);
        
        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Chegou um novo email';
        $mail->Body    = "<b>Nome: </b>" . $name . '<br><br>';
        $mail->Body .= "<b>Email: </b>" . $email . '<br><br>';
        $mail->Body .= "<b>Assunto: </b>" . $subject . '<br>';
        $mail->Body .= "<b>Mensagem: </b>" . $message;
        
        $mail->send();
        
        $name = $subject = $email = $message = "";
        
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array(
            'message' => 'Contato enviado com sucesso!'
        )));
        
    }
    catch (Exception $e) {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array(
            'message' => $e->getMessage(),
            'code' => $e->getCode()
        )));
    }
}

?>