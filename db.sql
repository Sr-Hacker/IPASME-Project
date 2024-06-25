CREATE DATABASE data_uptaeb;

USE data_uptaeb;

-- Crear la tabla "empleados"
CREATE TABLE empleados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  apellido VARCHAR(255),
  dni VARCHAR(255),
  rol ENUM('admin', 'empleado'),
  edad INT,
  correo_electronico VARCHAR(255) UNIQUE,
  contrasena VARCHAR(255),
  telefono VARCHAR(255),
  direccion VARCHAR(255),
  referencia VARCHAR(255),
  estado VARCHAR(255),
  ciudad VARCHAR(255)
);

-- Crear la tabla "clientes"
CREATE TABLE clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  apellido VARCHAR(255),
  dni VARCHAR(255),
  edad INT,
  correo_electronico VARCHAR(255) UNIQUE,
  telefono VARCHAR(255),
  direccion VARCHAR(255),
  referencia VARCHAR(255),
  estado VARCHAR(255),
  ciudad VARCHAR(255)
);

-- Crear la tabla "proveedores"
CREATE TABLE proveedores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  apellido VARCHAR(255),
  dni VARCHAR(255),
  edad INT,
  correo_electronico VARCHAR(255) UNIQUE,
  telefono VARCHAR(255),
  direccion VARCHAR(255),
  referencia VARCHAR(255),
  estado VARCHAR(255),
  ciudad VARCHAR(255),
  fabrica VARCHAR(255)
);

-- Crear la tabla "productos"
CREATE TABLE productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  categoria VARCHAR(255),
  codigo INT,
  precio DECIMAL(10, 2),
  cantidad INT,
  imagen VARCHAR(255)
);

-- Crear la tabla "pedidos"
CREATE TABLE pedidos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  estado BOOLEAN,
  metodo_de_pago VARCHAR(255),
  total DECIMAL(10, 2),
  id_cliente INT,
  id_empleado INT,
  -- Definicion de la clave foranea
  FOREIGN KEY (id_cliente) REFERENCES clientes(id),
  FOREIGN KEY (id_empleado) REFERENCES empleados(id)
);

-- Tabla de enlace para pedidos y productos
CREATE TABLE pedidos_productos (
  id_pedido INT,
  id_producto INT,
  -- Definicion de la clave foranea
  FOREIGN KEY (id_pedido) REFERENCES pedidos(id),
  FOREIGN KEY (id_producto) REFERENCES productos(id)
);

-- Crear la tabla "cuentas"
CREATE TABLE cuentas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tipo ENUM('Empleado', 'Cliente', 'Proveedor'),
  saldo DECIMAL(10, 2),
  dni VARCHAR(255), -- Clave foranea que se relacionara con el DNI de empleados, clientes o proveedores
);

-- Crear la tabla "telefonos"
CREATE TABLE telefonos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dni VARCHAR(255), -- Clave foranea que se relacionara con el DNI de empleados, clientes o proveedores
  numero VARCHAR(255),
  tipo VARCHAR(255)
);

-- Crear la tabla "direcciones"
CREATE TABLE direcciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dni VARCHAR(255), -- Clave foranea que se relacionara con el DNI de empleados, clientes o proveedores
  direccion VARCHAR(255),
  referencia VARCHAR(255),
  estado VARCHAR(255),
  ciudad VARCHAR(255)
);

-- Agregar claves foraneas a las tablas existentes
-- Para la tabla "cuentas"
ALTER TABLE cuentas
ADD CONSTRAINT fk_cuentas_empleados FOREIGN KEY (dni) REFERENCES empleados(dni);

ALTER TABLE cuentas
ADD CONSTRAINT fk_cuentas_clientes FOREIGN KEY (dni) REFERENCES clientes(dni);

ALTER TABLE cuentas
ADD CONSTRAINT fk_cuentas_proveedores FOREIGN KEY (dni) REFERENCES proveedores(dni);

-- Para la tabla "telefonos"
ALTER TABLE telefonos
ADD CONSTRAINT fk_telefonos_empleados FOREIGN KEY (dni) REFERENCES empleados(dni);

ALTER TABLE telefonos
ADD CONSTRAINT fk_telefonos_clientes FOREIGN KEY (dni) REFERENCES clientes(dni);

ALTER TABLE telefonos
ADD CONSTRAINT fk_telefonos_proveedores FOREIGN KEY (dni) REFERENCES proveedores(dni);

-- Para la tabla "direcciones"
ALTER TABLE direcciones
ADD CONSTRAINT fk_direcciones_empleados FOREIGN KEY (dni) REFERENCES empleados(dni);

ALTER TABLE direcciones
ADD CONSTRAINT fk_direcciones_clientes FOREIGN KEY (dni) REFERENCES clientes(dni);

ALTER TABLE direcciones
ADD CONSTRAINT fk_direcciones_proveedores FOREIGN KEY (dni) REFERENCES proveedores(dni);

-- Tabla de enlace para cuentas y pedidos
CREATE TABLE cuentas_pedidos (
  id_cuenta INT,
  id_pedido INT,
  -- Definicion de la clave foranea
  FOREIGN KEY (id_cuenta) REFERENCES cuentas(id),
  FOREIGN KEY (id_pedido) REFERENCES pedidos(id)
);

INSERT INTO empleados (
  nombre,
  apellido,
  dni,
  rol,
  edad,
  correo_electronico,
  contrasena,
  telefono,
  direccion,
  referencia,
  estado,
  ciudad) VALUES (
    'Juan',
    'Perez',
    '123456789',
    'empleado',
    30,
    'juan.perez@example.com',
    'contrasena123',
    '555-123-4567',
    'Calle Principal 123',
    'Frente al parque',
    'California',
    'Los Angeles'
  );

SELECT * FROM empleados;
