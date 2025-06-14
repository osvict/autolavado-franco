
<?php
session_start();

// Configuración de conexión
$host = "localhost";
$db = "autolavado";
$user = "oscar";
$pass = "TuPassword"; // ← Reemplaza esto por tu contraseña real

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica que se recibieron los datos del formulario
    if (!isset($_POST['usuario']) || !isset($_POST['contrasena'])) {
        header("Location: login.php");
        exit();
    }

    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);

    // Buscar al usuario en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Validar contraseña segura
    if ($row && password_verify($contrasena, $row['password'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
