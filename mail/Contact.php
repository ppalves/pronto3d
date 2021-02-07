<?php
// header('Content-Type: text/plain');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// If necessary, modify the path in the require statement below to refer to the
// location of your Composer autoload.php file.
require '../vendor/autoload.php';

$json = utf8_encode($_POST['fields']);
$data = json_decode($json);

$name   = trim(($data->name));
$email   = trim(($data->email));
$msg_subject = trim(($data->subject));
$message = trim(($data->message));
if ($name == "" || $msg_subject == "" || $message == "" || $email == "") {
    header('HTTP/1.1 400 Bad Request');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array(
        'message' => 'Preencha todos os campos',
        'code' => 1
    )));
} else {

    // Replace sender@example.com with your "From" address.
    // This address must be verified with Amazon SES.
    $sender = 'contatopronto3d@gmail.com';
    $senderName = 'Contato Pronto3D';

    // Replace recipient@example.com with a "To" address. If your account
    // is still in the sandbox, this address must be verified.
    $recipient = 'pronto3d@gmail.com';

    // Replace smtp_username with your Amazon SES SMTP user name.
    $usernameSmtp = getenv("PRONTO_SES_USERNAME");

    // Replace smtp_password with your Amazon SES SMTP password.
    $passwordSmtp = getenv("PRONTO_SES_PASSWORD");

    // Specify a configuration set. If you do not want to use a configuration
    // set, comment or remove the next line.

    //$configurationSet = 'ConfigSet';

    // If you're using Amazon SES in a region other than US West (Oregon),
    // replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
    // endpoint in the appropriate region.
    $host = 'email-smtp.sa-east-1.amazonaws.com';
    $port = 587;

    // The subject line of the email
    $subject = 'Novo contato no site do Pronto3D!';

    // The plain-text body of the email

    $bodyText =  "assunto: $msg_subject \r\n nome: $name \r\n email: $email \r\n menssagem: $message";

    // The HTML-formatted body of the email
    $bodyHtml = "<h1>Assunto: $msg_subject </h1>
        <p><b>Nome: </b> $name </p>
        <p><b>Email: </b> $email </p>
        <p><b>Mensagem: </b> $message</p>";

    $mail = new PHPMailer(true);

    try {
        // Specify the SMTP settings.
        $mail->isSMTP();
        $mail->setFrom($sender, $senderName);
        $mail->Username   = $usernameSmtp;
        $mail->Password   = $passwordSmtp;
        $mail->Host       = $host;
        $mail->Port       = $port;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = 'tls';
        // $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

        // Specify the message recipients.
        $mail->addAddress($recipient);
        // You can also add CC, BCC, and additional To recipients here.

        // Specify the content of the message.
        $mail->isHTML(true);
        $mail->Subject    = $subject;
        $mail->Body       = $bodyHtml;
        $mail->AltBody    = $bodyText;
        $mail->Send();

        $name = $subject = $email = $message = "";

        echo "Email sent!" , PHP_EOL;

        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array(
            'message' => 'Contato enviado com sucesso!'
        )));

    } catch (Exception $e) {
        echo "An error occurred. {$e->errorMessage()}", PHP_EOL;
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array(
            'message' => $e->getMessage(),
            'code' => $e->getCode()
        )));
    }
}

?>