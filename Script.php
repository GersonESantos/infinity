<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Configurações do e-mail
    $to = "gebhsantos@gmail.com";  // Substitua pelo seu e-mail
    $subject = "Novo contato de " . $name;
    $body = "Nome: $name\nEmail: $email\nMensagem: $message";

    // Cabeçalhos do e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Enviar o e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "<p class='msg'>Email enviado com sucesso!</p>";
    } else {
        echo "<p class='error'>Falha no envio do email.</p>";
    }
}
?>
