<?php
$servicios = ["Lavado exterior", "Lavado interior", "Encerado", "Motor"];
echo "<h2>Lista de Servicios</h2><ul>";
foreach ($servicios as $s) {
  echo "<li>$s</li>";
}
echo "</ul>";
?>
