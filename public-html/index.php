<!DOCTYPE html>
<html>
<head>
    <title>Mesa de Partes Virtual (Legacy)</title>
    <style>body { font-family: sans-serif; padding: 20px; }</style>
</head>
<body>
    <h2>Subida de Documentos Probatorios</h2>
    <p>Adjunte su DNI o voucher de pago. (Máx. 5MB)</p>
    
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="archivo" required>
        <button type="submit">Enviar Documento</button>
    </form>

    <hr>
    <p><small>Sistema en mantenimiento. Revise la carpeta <a href="/respaldos/">/respaldos/</a> para logs antiguos.</small></p>
</body>
</html>
