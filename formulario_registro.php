
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario - Autolavado Franco</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f7f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 2rem 3rem;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #1e88e5;
        }
        label {
            display: block;
            margin-top: 1rem;
            font-weight: 600;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .show-password {
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
        }
        .show-password input {
            margin-right: 5px;
        }
        button {
            width: 100%;
            margin-top: 2rem;
            padding: 10px;
            background-color: #1e88e5;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
        }
        button:hover {
            background-color: #1565c0;
        }
    </style>
    <script>
        function togglePasswordVisibility() {
            var pw = document.getElementById('password');
            var cpw = document.getElementById('confirm_password');
            pw.type = pw.type === 'password' ? 'text' : 'password';
            cpw.type = cpw.type === 'password' ? 'text' : 'password';
        }

        function validateForm() {
            var password = document.getElementById('password').value;
            var confirm = document.getElementById('confirm_password').value;
            if (password !== confirm) {
                alert("Las contraseñas no coinciden.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h2>Registrar Nuevo Usuario</h2>
        <form action="registrar_usuario.php" method="POST" onsubmit="return validateForm();">
            <label for="usuario">Nombre de Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" required>

            <div class="show-password">
                <input type="checkbox" onclick="togglePasswordVisibility()"> Mostrar contraseña
            </div>

            <button type="submit">Registrar Usuario</button>
        </form>
    </div>
</body>
</html>
