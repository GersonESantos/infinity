<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'seuemail@gmail.com';  // Substitua pelo seu e-mail Gmail
        $mail->Password = 'suasenha';  // Substitua pela sua senha do Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipiente
        $mail->setFrom('seuemail@gmail.com', 'Nome do Remetente');
        $mail->addAddress('gebhsantos@gmail.com');  // Substitua pelo e-mail de destino

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = "Novo contato de " . $name;
        $mail->Body    = "Nome: $name<br>Email: $email<br>Mensagem: $message";

        // Enviar
        $mail->send();
        echo "Email enviado com sucesso!";
    } catch (Exception $e) {
        echo "Falha no envio do email. Erro: {$mail->ErrorInfo}";
    }
}
?>
