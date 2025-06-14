
-- Crear base de datos
CREATE DATABASE IF NOT EXISTS autolavado;
USE autolavado;

-- Crear tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insertar usuario de prueba (usuario: admin, contraseña: 123456)
INSERT INTO usuarios (usuario, password)
VALUES (
  'admin',
  '$2y$10$gVymHoUDUth85G3ZZr8yjeTfrJMIUF2AdR/vRY7M5Kvl0TkPGldru'
);
