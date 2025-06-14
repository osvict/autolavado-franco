
<?php
echo "✅ Iniciando procesamiento de cliente...<br>";

// Verificar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"] ?? '';
    $correo = $_POST["correo"] ?? '';
    $celular = $_POST["celular"] ?? '';
    $placas = $_POST["placas"] ?? [];

    echo "📥 Datos recibidos:<br>";
    echo "👤 Nombre: $nombre<br>";
    echo "📧 Correo: $correo<br>";
    echo "📱 Celular: $celular<br>";
    echo "🚗 Placas: " . implode(", ", $placas) . "<br>";

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=autolavado;charset=utf8", "oscar", "TuPassword");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "✅ Conexión exitosa a la base de datos<br>";

        // Insertar cliente
        $stmt = $pdo->prepare("INSERT INTO clientes (nombre, correo, celular) VALUES (?, ?, ?)");
        $stmt->execute([$nombre, $correo, $celular]);
        $cliente_id = $pdo->lastInsertId();

        echo "✅ Cliente insertado con ID: $cliente_id<br>";

        // Insertar placas
        $stmtPlaca = $pdo->prepare("INSERT INTO vehiculos (cliente_id, placa) VALUES (?, ?)");
        foreach ($placas as $placa) {
            if (!empty(trim($placa))) {
                $stmtPlaca->execute([$cliente_id, trim($placa)]);
                echo "➡️ Placa registrada: " . htmlspecialchars($placa) . "<br>";
            }
        }

        echo "<br>✅ Cliente y placas registrados correctamente.";
    } catch (PDOException $e) {
        echo "❌ Error de base de datos: " . $e->getMessage();
    }
} else {
    echo "❌ No se recibió el formulario.";
}
?>
