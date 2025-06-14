
<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "<p style='color:red;'>❌ Acceso denegado. Debes iniciar sesión.</p>";
    exit();
}

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm_password']);

    if ($password !== $confirm) {
        $mensaje = "<p style='color:red;'>❌ Las contraseñas no coinciden.</p>";
    } else {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=autolavado;charset=utf8", "oscar", "TuPassword");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)");
            $stmt->execute([
                ':usuario' => $usuario,
                ':password' => $hash
            ]);

            $mensaje = "<p style='color:green;'>✅ Usuario registrado correctamente.</p>";
        } catch (PDOException $e) {
            $mensaje = "<p style='color:red;'>❌ Error: " . $e->getMessage() . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 2rem 3rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            color: #1e88e5;
            text-align: center;
        }
        label {
            font-weight: 600;
            margin-top: 1rem;
            display: block;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 0.6rem;
            margin-top: 0.4rem;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        .show-password {
            margin-top: 0.6rem;
        }
        button {
            width: 100%;
            margin-top: 1.5rem;
            padding: 0.8rem;
            background-color: #1e88e5;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background-color: #1565c0;
        }
        .mensaje {
            margin-top: 1rem;
            text-align: center;
        }
    </style>
    <script>
        function togglePassword() {
            var pw = document.getElementById("password");
            var cpw = document.getElementById("confirm_password");
            pw.type = pw.type === "password" ? "text" : "password";
            cpw.type = cpw.type === "password" ? "text" : "password";
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2>Registrar Usuario</h2>
        <?php if ($mensaje): ?>
            <div class="mensaje"><?php echo $mensaje; ?></div>
        <?php endif; ?>
        <form method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>

            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" name="confirm_password" id="confirm_password" required>

            <div class="show-password">
                <input type="checkbox" onclick="togglePassword()"> Mostrar contraseña
            </div>

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
