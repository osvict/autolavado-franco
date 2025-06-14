
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes - Autolavado Franco</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            display: flex;
            height: 100vh;
        }
        aside {
            width: 220px;
            background-color: #0d47a1;
            color: white;
            padding: 3rem 1rem 2rem 1rem;
            display: flex;
            flex-direction: column;
        }
        .menu-links {
            display: flex;
            flex-direction: column;
            margin-top: 3rem;
        }
        aside a {
            text-decoration: none;
            color: white;
            background-color: #1565c0;
            padding: 0.9rem 1.2rem;
            margin-bottom: 1.2rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            box-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            transition: all 0.2s ease-in-out;
        }
        aside a:hover {
            background-color: #1e88e5;
            transform: scale(1.05);
        }
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .top-bar {
            background-color: #0d47a1;
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: -220px;
        }
        .top-bar div:first-child {
            font-size: 1.8rem;
            font-weight: bold;
        }
        .content {
            padding: 2rem;
        }
        .form-container {
            background-color: white;
            max-width: 600px;
            margin: 3rem auto;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-container h2 {
            margin-bottom: 1.5rem;
        }
        .form-container label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .form-container input[type="text"],
        .form-container input[type="email"] {
            width: 100%;
            padding: 0.6rem;
            margin-bottom: 1.2rem;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .form-container button {
            background-color: #0d47a1;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 1rem;
        }
        .form-container button:hover {
            background-color: #1565c0;
        }
        .placa-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        .placa-group input {
            flex: 1;
        }
        .placa-group button {
            background-color: #d32f2f;
            padding: 0 1rem;
        }
    </style>
    <script>
        function agregarPlaca() {
            const container = document.getElementById("placas-container");
            const div = document.createElement("div");
            div.className = "placa-group";
            div.innerHTML = `
                <input type="text" name="placas[]" placeholder="Placa del vehículo" required>
                <button type="button" onclick="eliminarPlaca(this)">X</button>
            `;
            container.appendChild(div);
        }

        function eliminarPlaca(boton) {
            boton.parentElement.remove();
        }
    </script>
</head>
<body>
    <aside>
        <div class="menu-links">
            <a href="clientes.php">Clientes</a>
            <a href="#">Reportes</a>
            <a href="#">Configuración</a>
            <a href="registro_usuario.php">Registrar Usuario</a>
        </div>
    </aside>

    <main>
        <div class="top-bar">
            <div>Sistema de Gestión de Autolavado</div>
            <div>
                Conectado como: <strong>admin</strong>
                <a href="logout.php" style="color:white; margin-left: 1rem;">Cerrar sesión</a>
            </div>
        </div>
        <div class="content">
            <div class="form-container">
                <h2>Registrar Cliente</h2>
                <form method="POST" action="procesar_cliente.php">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo">

                    <label for="celular">Celular</label>
                    <input type="text" id="celular" name="celular">

                    <label>Placas del vehículo</label>
                    <div id="placas-container">
                        <div class="placa-group">
                            <input type="text" name="placas[]" placeholder="Placa del vehículo" required>
                        </div>
                    </div>
                    <button type="button" onclick="agregarPlaca()">Agregar otra placa</button>

                    <button type="submit">Registrar Cliente</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
