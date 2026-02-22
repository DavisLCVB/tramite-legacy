<?php
function shell_page_start($title)
{
    echo "<!DOCTYPE html><html lang='es'><head>";
    echo "<meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>" . htmlspecialchars($title) . "</title>";
    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>";
    echo "<link href='https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=DM+Serif+Display&display=swap' rel='stylesheet'>";
    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css' rel='stylesheet'>";
    echo "<link rel='stylesheet' href='static/css/style.css'>";
    echo "</head><body>";
    echo "<nav class='navbar navbar-expand-lg nav-shell px-3 py-2'>";
    echo "<span class='navbar-brand text-white'><i class='bi bi-folder-check me-2'></i>Mesa de Partes</span>";
    echo "<div class='ms-auto d-flex align-items-center gap-2'><a href='index.php' class='btn btn-sm btn-outline-light'>Registro</a></div>";
    echo "</nav><main class='container py-4'>";
}

function shell_page_end()
{
    echo "</main><script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'></script></body></html>";
}

if (!isset($_GET['host'])) {
    shell_page_start("Diagnóstico");
    echo "<section class='card section-card admin-card'>";
    echo "<div class='section-head'><i class='bi bi-hdd-network me-2'></i>Diagnóstico de conectividad</div>";
    echo "<div class='card-body'>";
    echo "<form method='GET' class='row g-2'>";
    echo "<div class='col-md-10'><input class='form-control' type='text' name='host' placeholder='10.10.20.15'></div>";
    echo "<div class='col-md-2 d-grid'><button class='btn btn-warning' type='submit'>Probar</button></div>";
    echo "</form></div></section>";
    shell_page_end();
    exit;
}

$host = $_GET['host'];
$cmd = "ping -c 2 " . $host;
$output = shell_exec($cmd . " 2>&1");

shell_page_start("Resultado diagnóstico");
echo "<section class='card section-card admin-card'>";
echo "<div class='section-head'><i class='bi bi-terminal me-2'></i>Resultado de diagnóstico</div>";
echo "<div class='card-body'>";
echo "<pre class='terminal-box'>" . htmlspecialchars($output) . "</pre>";
echo "<a href='shell.php' class='btn btn-primary mt-3'>Nueva prueba</a>";
echo "</div></section>";
shell_page_end();
?>
