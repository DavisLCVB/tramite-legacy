<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
    $directorio_subida = 'uploads/';
    
    // VULNERABILIDAD: Tomamos el nombre del archivo tal cual viene del usuario
    // No validamos la extensión (CVE-2024-21887 simulado)
    $archivo_destino = $directorio_subida . basename($_FILES['archivo']['name']);

    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo_destino)) {
        echo "<h3>¡Documento recibido con éxito!</h3>";
        echo "<p>Su archivo ha sido guardado en el servidor.</p>";
        // Le mostramos al atacante dónde quedó su archivo (facilita la explotación)
        echo "<a href='" . htmlspecialchars($archivo_destino) . "'>Ver archivo subido</a>";
    } else {
        echo "Error al subir el archivo.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
