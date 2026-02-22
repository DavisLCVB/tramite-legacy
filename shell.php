<?php
if (!isset($_GET['host'])) {
    echo "<link rel='stylesheet' href='public-html/static/css/style.css'>";
    echo "<div class='container'><section class='card section-card'>";
    echo "<div class='section-head'>Diagnóstico de conectividad</div>";
    echo "<form class='form-grid' method='GET'>";
    echo "<label>Host o IP<input class='input' type='text' name='host' placeholder='10.10.20.15'></label>";
    echo "<button class='btn-primary' type='submit'>Probar</button>";
    echo "</form></section></div>";
    exit;
}

$host = $_GET['host'];
$cmd = "ping -c 2 " . $host;
$output = shell_exec($cmd . " 2>&1");
echo "<link rel='stylesheet' href='public-html/static/css/style.css'>";
echo "<div class='container'><section class='card section-card'>";
echo "<div class='section-head'>Resultado de diagnóstico</div>";
echo "<pre class='terminal-box'>" . htmlspecialchars($output) . "</pre>";
echo "<p class='hint'><a href='shell.php'>Nueva prueba</a></p>";
echo "</section></div>";
?>
