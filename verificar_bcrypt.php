
<?php
echo "<h3>🚀 Diagnóstico de bcrypt en PHP</h3>";

if (function_exists('password_hash')) {
    echo "<p>✅ La función <code>password_hash()</code> está disponible.</p>";
    $hash = password_hash("123456", PASSWORD_DEFAULT);
    echo "<p>🔐 Hash generado para '123456': <code>$hash</code></p>";

    if (password_verify("123456", $hash)) {
        echo "<p>✅ password_verify() también funciona correctamente.</p>";
    } else {
        echo "<p>❌ password_verify() NO coincide con el hash generado.</p>";
    }
} else {
    echo "<p>❌ La función <code>password_hash()</code> NO está disponible. PHP necesita ser actualizado o recompilado con soporte para bcrypt.</p>";
}

echo "<h4>📦 Extensiones cargadas:</h4><pre>";
print_r(get_loaded_extensions());
echo "</pre>";
?>
