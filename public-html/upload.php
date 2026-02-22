<?php
function upload_page_start($title)
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

function upload_page_end()
{
    echo "</main><script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'></script></body></html>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
    $unidad = $_POST['unidad'] ?? 'mesa_partes';
    $expediente = $_POST['expediente'] ?? 'SIN-CODIGO';
    $mime = $_FILES['archivo']['type'] ?? '';
    $size = $_FILES['archivo']['size'] ?? 0;
    $permitidos = ['application/pdf', 'image/jpeg', 'image/png', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

    if (!in_array($mime, $permitidos) || $size > (5 * 1024 * 1024)) {
        upload_page_start("Archivo no permitido");
        echo "<section class='card section-card'><div class='section-head'>Validación de archivo</div><div class='card-body'>";
        echo "<p class='mb-3'>Archivo no permitido por política de recepción.</p>";
        echo "<a class='btn btn-primary' href='index.php'>Volver</a>";
        echo "</div></section>";
        upload_page_end();
        exit;
    }

    $baseDir = 'uploads/' . $unidad . '/';
    if (!is_dir($baseDir)) {
        mkdir($baseDir, 0777, true);
    }

    $nombre = date('Ymd_His') . '_' . basename($_FILES['archivo']['name']);
    $archivo_destino = $baseDir . $nombre;

    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo_destino)) {
        $ticket = strtoupper(substr(md5($expediente . $nombre), 0, 10));
        upload_page_start("Recepción confirmada");
        echo "<section class='card section-card'>";
        echo "<div class='section-head'><i class='bi bi-check2-circle me-2'></i>Recepción confirmada</div>";
        echo "<div class='card-body'>";
        echo "<p><strong>Ticket:</strong> " . htmlspecialchars($ticket) . "</p>";
        echo "<p>El documento fue almacenado para validación de mesa de partes.</p>";
        echo "<a class='btn btn-primary me-2' href='" . htmlspecialchars($archivo_destino) . "'>Descargar cargo</a>";
        echo "<a class='btn btn-outline-secondary' href='index.php'>Volver al registro</a>";
        echo "</div></section>";
        upload_page_end();
    } else {
        upload_page_start("Error de carga");
        echo "<section class='card section-card'><div class='section-head'>Error de carga</div><div class='card-body'>";
        echo "<p class='mb-3'>No se pudo completar la carga del documento.</p>";
        echo "<a class='btn btn-primary' href='index.php'>Reintentar</a>";
        echo "</div></section>";
        upload_page_end();
    }
} else {
    upload_page_start("Acceso no permitido");
    echo "<section class='card section-card'><div class='section-head'>Acceso no permitido</div><div class='card-body'>";
    echo "<p class='mb-3'>Solicitud inválida para el módulo de carga.</p>";
    echo "<a class='btn btn-primary' href='index.php'>Ir al inicio</a>";
    echo "</div></section>";
    upload_page_end();
}
?>
