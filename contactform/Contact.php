<?php
header('Content-Type: text/plain');
require 'PHPMailer.php';
require 'SMTP.php';

// $json = utf8_encode($_POST['fields']);
// $data = json_decode($json);

// $fname   = ($data->fname).trim();
// $lname   = ($data->lname).trim();
// $email   = ($data->email).trim();
// $subject = ($data->subject).trim();
// $message = ($data->message).trim();

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
    

    
    
    //Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Teste 2';
    $mail->Body =  "<p>teste lala</p>";
    // $mail->Body    = "<b>Nome: </b>" . $fname . '<br><br>';
    // $mail->Body .= "<b>Sobrenome: </b>" . $lname . '<br>';
    // $mail->Body = "<b>Email: </b>" . $email . '<br><br>';
    // $mail->Body .= "<b>Assunto: </b>" . $subject . '<br>';
    // $mail->Body .= "<b>Mensagem: </b>" . $message;
    
    $mail->send();
    
    // $fname = $lname = $subject = $email = $message = "";
    
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


?>