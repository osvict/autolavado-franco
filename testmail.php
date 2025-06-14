
<?php
$to = "tucorreo@dominio.com"; // <-- Reemplaza con tu correo real
$subject = "Prueba de correo desde PHP";
$message = "Esto es una prueba de envío de correo desde tu servidor.";
$headers = "From: prueba@autolavado.com";

if (mail($to, $subject, $message, $headers)) {
    echo "✅ Correo enviado con éxito a $to";
} else {
    echo "❌ No se pudo enviar el correo. Verifica configuración del servidor.";
}
?>
