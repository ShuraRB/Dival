DROP DATABASE IF EXISTS dival_DB;
CREATE DATABASE IF NOT EXISTS dival_DB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE dival_DB;

GRANT ALL PRIVILEGES ON dival_DB.* TO 'user_dival'@'localhost' IDENTIFIED BY 'dival123';


CREATE TABLE roles (
    estatus_rol TINYINT(1) NOT NULL DEFAULT 2 COMMENT '2-> Habilitado, -1-> Deshabilitado',
    id_rol INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(40) NOT NULL
)ENGINE=InnoDB;

INSERT INTO roles (estatus_rol, id_rol, rol) VALUES
('2', 444, 'Superadmin'),
('2', 784, 'Operador');


CREATE TABLE usuarios (
    estatus_usuario TINYINT(1) NOT NULL DEFAULT 2 COMMENT '2-> Habilitado, -1-> Deshabilitado',
    id_usuario INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(50) NOT NULL,
    ap_paterno_usuario VARCHAR(50) NOT NULL,
    ap_materno_usuario VARCHAR(50) NOT NULL,
    sexo_usuario TINYINT(1) NOT NULL COMMENT '0-> Femenino, 1-> Masculino',
    imagen_usuario VARCHAR(100)  NULL,
    email_usuario VARCHAR(100) NOT NULL,
    password_usuario VARCHAR(64) NOT NULL,
    id_rol INT(3) NOT NULL,
    FOREIGN KEY(id_rol) REFERENCES roles (id_rol) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

INSERT INTO usuarios (estatus_usuario, id_usuario, nombre_usuario, ap_paterno_usuario, ap_materno_usuario,
sexo_usuario, imagen_usuario, email_usuario, password_usuario, id_rol) 
VALUES
('2', NULL, 'Alejandro', 'Huerta', 'Cote',1,NULL,'jahc@gm ail.com',SHA2('abc123',0),444),
('2', NULL, 'Patricia', 'Netzahuatl', 'Rugerio',1,NULL,'pextidevil@gmail.com',SHA2('abc123',0),784);

CREATE TABLE cliente (
    id_cliente INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    ap_p VARCHAR(50) NOT NULL,
    ap_m VARCHAR(50) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    correo VARCHAR(50) NOT NULL,
    empresa VARCHAR(50) NOT NULL,
    fecha DATE NOT NULL
)ENGINE=InnoDB;

