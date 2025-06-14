
<?php
session_start();

echo "✅ Inicio del script<br>";

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $passwordPlano = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    echo "✅ Usuario autenticado: " . $_SESSION['usuario'] . "<br>";
    echo "✅ Formulario enviado<br>";
    echo "📩 Datos recibidos: $usuario<br>";

    if ($passwordPlano !== $confirmPassword) {
        echo "<script>alert('❌ Las contraseñas no coinciden.'); window.history.back();</script>";
        exit();
    }

    $passwordHash = password_hash($passwordPlano, PASSWORD_DEFAULT);

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=autolavado;charset=utf8", "oscar", "TuPassword");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)");
        $stmt->execute([
            ':usuario' => $usuario,
            ':password' => $passwordHash
        ]);

        echo "<script>alert('✅ Usuario registrado correctamente'); window.location.href='dashboard.php';</script>";
        exit();
    } catch (PDOException $e) {
        echo "<script>alert('❌ Error al registrar el usuario: " . $e->getMessage() . "'); window.history.back();</script>";
    }
} else {
    header("Location: formulario_registro.php");
    exit();
}
?>
