-- Creación de la BBDD
CREATE DATABASE IF NOT EXISTS proyectoDAW DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
use proyectoDAW;


-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    contrasena VARCHAR(100) NOT NULL
);

-- Tabla de recetas
CREATE TABLE IF NOT EXISTS recetas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT,
    duracion_preparacion INT,
    categoria VARCHAR(50) NOT NULL, 
    usuario_id INT,
    cantidad_ingrediente INT NOT NULL,
	medida_ingrediente VARCHAR(20) NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Tabla de ingredientes de recetas
CREATE TABLE IF NOT EXISTS ingredientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    receta_id INT,
    FOREIGN KEY (receta_id) REFERENCES recetas(id)
);

-- Tabla de pasos de recetas
CREATE TABLE IF NOT EXISTS pasos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion TEXT NOT NULL,
    orden INT NOT NULL,
    receta_id INT,
    FOREIGN KEY (receta_id) REFERENCES recetas(id)
);

-- Tabla de comentarios
CREATE TABLE IF NOT EXISTS comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenido TEXT,
    usuario_id INT,
    receta_id INT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (receta_id) REFERENCES recetas(id)
);

-- Tabla de calificaciones de popularidad
CREATE TABLE IF NOT EXISTS calificaciones_popularidad (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor INT, 
    usuario_id INT,
    receta_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (receta_id) REFERENCES recetas(id)
);

-- Tabla de calificaciones de dificultad
CREATE TABLE IF NOT EXISTS calificaciones_dificultad (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor INT, 
    usuario_id INT,
    receta_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (receta_id) REFERENCES recetas(id)
);

-- Usuario y Permisos
CREATE USER IF NOT EXISTS gestor@'localhost' IDENTIFIED BY "secreto";
GRANT ALL ON proyectoDAW.* TO gestor@'localhost';
