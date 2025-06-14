
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Autolavado Franco</title>
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
            text-align: center;
        }
        .content img.logo {
            max-height: 100px;
            margin-bottom: 1rem;
            opacity: 0.6; /* logo translúcido */
        }
        .bienvenida {
            margin-top: 2rem;
        }
        .bienvenida h2 {
            margin-top: 0;
        }
    </style>
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
            <img src="autolavado franco logo.jpeg" alt="Logo Autolavado Franco" class="logo">
            <div class="bienvenida">
                <h2>Bienvenido al sistema</h2>
                <p>Selecciona una opción del menú para comenzar.</p>
            </div>
        </div>
    </main>
</body>
</html>
