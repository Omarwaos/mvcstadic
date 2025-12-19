CREATE DATABASE tiendaperu;


USE tiendaperu;

CREATE TABLE productos
(
  id INT AUTO_INCREMENT PRIMARY KEY,
  clasificacion ENUM('Equipo','Accesorio','Consumible') NOT NULL,
  marca       VARCHAR(30) NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  garantia    TINYINT NOT NULL DEFAULT 12,
  ingreso     DATE NOT NULL,
  cantidad    SMALLINT NOT NULL,
  created     DATETIME NOT NULL DEFAULT NOW() COMMENT 'Campo calculado de fecha y hora', 
  updated     DATETIME NULL COMMENT 'Se agrega al detectar un cambio'
)ENGINE= INNODB; /*INNODB (relacional-join), MYISAM (veloz no relacional) */

CREATE TABLE proveedores(
  id            INT AUTO_INCREMENT PRIMARY KEY,
  razonsocial   VARCHAR(150) NOT NULL,
  ruc           CHAR(11) NULL,
  telefono      CHAR(9) NULL,
  origen        ENUM('N','E') DEFAULT 'N' NOT NULL,
  contacto      VARCHAR(50) NOT NULL,
  confianza     TINYINT NOT NULL DEFAULT 1,
  created     DATETIME NOT NULL DEFAULT NOW() COMMENT 'Campo calculado de fecha y hora', 
  updated     DATETIME NULL COMMENT 'Se agrega al detectar un cambio'
)ENGINE = INNODB;






INSERT INTO productos 
  (clasificacion, marca, descripcion, garantia, ingreso, cantidad) VALUES
  ('Equipo','Epson','Impresora L200',24,'2025-10-05',10),
  ('Accesorio','Logitech','Teclado USB negro',12,'2025-11-01',20),
  ('Consumible','Canon','Pixma 190 Yellow',6,'2025-09-10',5);

INSERT INTO proveedores (razonsocial, ruc, telefono, origen, contacto, confianza)
VALUES
('Comercial Andes SAC', '20123456789', '987654321', 'N', 'Juan Pérez', 3),
('Importaciones Global Ltda', '20987654321', '912345678', 'E', 'María Gómez', 4),
('Servicios Técnicos del Sur', '20456789123', '956123789', 'N', 'Carlos Ramírez', 2);




SELECT * FROM proveedores;

SELECT 
  id, clasificacion, marca, descripcion, garantia, ingreso, cantidad
FROM productos
ORDER BY id DESC;

