<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesa de Partes Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg nav-shell px-3 py-2">
        <span class="navbar-brand text-white"><i class="bi bi-folder-check me-2"></i>Mesa de Partes</span>
        <div class="ms-auto d-flex align-items-center gap-2">
            <a href="shell.php" class="btn btn-sm btn-outline-light">Diagnóstico</a>
        </div>
    </nav>

    <main class="container py-4">
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="kpi-card card h-100">
                    <div class="kpi-label">Canal</div>
                    <div class="kpi-value">Virtual</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="kpi-card card h-100">
                    <div class="kpi-label">Estado</div>
                    <div class="kpi-value">Operativo</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="kpi-card card h-100">
                    <div class="kpi-label">Periodo</div>
                    <div class="kpi-value">2026-I</div>
                </div>
            </div>
        </div>

        <section class="card section-card mb-4">
            <div class="section-head"><i class="bi bi-upload me-2"></i>Recepción de documentos</div>
            <div class="card-body">
                <p class="text-muted mb-3">Adjunte sustento digital para continuar su trámite institucional.</p>
                <form action="upload.php" method="POST" enctype="multipart/form-data" class="row g-2">
                    <div class="col-md-4">
                        <label class="form-label">Dependencia</label>
                        <select name="unidad" class="form-select">
                            <option value="mesa_partes">Mesa de Partes</option>
                            <option value="tesoreria">Tesorería</option>
                            <option value="archivo">Archivo Central</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Código de expediente</label>
                        <input type="text" name="expediente" class="form-control" placeholder="EXP-2026-001245" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Documento</label>
                        <input type="file" name="archivo" class="form-control" required>
                    </div>

                    <div class="col-12 d-grid d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary px-4">Enviar documento</button>
                    </div>
                </form>
                <p class="search-caption mb-0">Formatos admitidos: PDF, JPG, PNG, DOCX (máx. 5MB)</p>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
