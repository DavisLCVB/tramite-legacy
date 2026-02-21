-- DUMP DE BASE DE DATOS DEL SISTEMA DE TRAMITES
-- Fecha: Octubre 2025

CREATE TABLE administradores (
    id INT,
    username VARCHAR(50),
    password_hash VARCHAR(255)
);

INSERT INTO administradores VALUES (1, 'admin_tramite', 'admin123456');
INSERT INTO administradores VALUES (2, 'edgar.quispe10@unmsm.edu.pe', 'Temporal2025!');
