
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

echo "🚀 Inicio de prueba de envío de correo SMTP con Brevo<br>";

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp-relay.brevo.com';
    $mail->SMTPAuth = true;
    $mail->Username = '8f9f51001@smtp-brevo.com';
    $mail->Password = 'Xvjn5JygIVkBpOzY';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('8f9f51001@smtp-brevo.com', 'Autolavado Franco');
    $mail->addAddress('osvict10@gmail.com', 'Oscar Test');

    $mail->isHTML(true);
    $mail->Subject = '🧪 Prueba de envío SMTP desde PHPMailer (Brevo)';
    $mail->Body    = 'Este es un <strong>correo de prueba</strong> enviado desde tu sistema usando Brevo y PHPMailer.<br><br>🚀 ¡Funciona!';

    $mail->send();
    echo "✅ Correo de prueba enviado correctamente.";
} catch (Exception $e) {
    echo "❌ Error al enviar el correo: {$mail->ErrorInfo}";
}
?>
