<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Autolavado Franco</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      background: url('A_photograph_captures_two_workers_washing_a_white_.png') no-repeat center center fixed;
      background-size: cover;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .overlay {
      background-color: rgba(255, 255, 255, 0.85);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.15);
      text-align: center;
      max-width: 400px;
      width: 90%;
    }
    .overlay h1 {
      font-size: 22px;
      margin-bottom: 10px;
      color: #333;
    }
    .overlay img {
      max-width: 200px;
      margin-bottom: 20px;
    }
    .overlay input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    .overlay button {
      background-color: #2d3e50;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="overlay">
    <h1>Bienvenido al sistema de:</h1>
    <img src="autolavado franco logo.jpeg" alt="Logo Autolavado Franco">
    <form action="validar.php" method="post">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <input type="password" name="contrasena" placeholder="Contraseña" required>
      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>
