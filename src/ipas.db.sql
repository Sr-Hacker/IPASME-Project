CREATE DATABASE data_uptaeb;
USE data_uptaeb;

-- las tablas sin dependencias
CREATE TABLE direcciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  direccion CHAR(255),
  zona CHAR(100),
  descripcion CHAR(255),
  postal CHAR(20)
);

CREATE TABLE historia_medica (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cod_historia INT,
  tipo_sangre CHAR(3),
  sexo CHAR(1),
  estatura DECIMAL(5,2),
  peso DECIMAL(5,2),
  fecha_nacimiento DATE
);

CREATE TABLE especialidades (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre CHAR(100)
);

CREATE TABLE medicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombres CHAR(255),
  apellidos CHAR(255),
  estado ENUM('EXTERNO', 'INTERNO'),
  cedula CHAR(20)
);

CREATE TABLE requisitos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre CHAR(100),
  cod_requisito INT
);

CREATE TABLE empleados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  apellido CHAR(100),
  nombre CHAR(100),
  telefono CHAR(20),
  contrasena CHAR(255),
  cedula CHAR(20),
  rol ENUM('ADMINISTRADOR', 'EMPLEADO'),
);

-- Tablas con dependencias a las anteriores
CREATE TABLE instituciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre CHAR(255),
  rif CHAR(20),
  id_direccion INT,
  FOREIGN KEY (id_direccion) REFERENCES direcciones(id)
);

CREATE TABLE medico_especialidad (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_medico INT,
  id_especialidad INT,
  FOREIGN KEY (id_medico) REFERENCES medicos(id),
  FOREIGN KEY (id_especialidad) REFERENCES especialidades(id)
);

CREATE TABLE afiliados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre CHAR(100),
  apellido CHAR(100),
  telefono CHAR(20),
  edad INT,
  cargo CHAR(50),
  cedula CHAR(20),
  estado BOOLEAN,
  id_direccion INT,
  id_institucion INT,
  id_historia INT,
  FOREIGN KEY (id_historia) REFERENCES historia_medica(id),
  FOREIGN KEY (id_institucion) REFERENCES instituciones(id),
  FOREIGN KEY (id_direccion) REFERENCES direcciones(id)
);

CREATE TABLE beneficiarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  parentesco CHAR(50),
  cedula CHAR(20),
  nombre CHAR(100),
  apellido CHAR(100),
  telefono CHAR(20),
  edad INT,
  fecha_nacimiento DATE,
  estado BOOLEAN,
  id_afiliado INT,
  id_historia INT,
  id_direccion INT,
  FOREIGN KEY (id_afiliado) REFERENCES afiliados(id),
  FOREIGN KEY (id_historia) REFERENCES historia_medica(id),
  FOREIGN KEY (id_direccion) REFERENCES direcciones(id)
);

CREATE TABLE patologias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  descripcion CHAR(255),
  hereditaria BOOLEAN,
  nombre CHAR(100),
  fecha DATE,
  id_historia INT,
  FOREIGN KEY (id_historia) REFERENCES historia_medica(id)
);

CREATE TABLE informes_medicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  diagnostico CHAR(255),
  descripcion CHAR(255),
  motivo CHAR(255),
  fecha DATE,
  id_historia INT,
  id_medico INT,
  FOREIGN KEY (id_historia) REFERENCES historia_medica(id),
  FOREIGN KEY (id_medico) REFERENCES medicos(id)
);

CREATE TABLE tratamientos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  instrucciones CHAR(255),
  motivo CHAR(255),
  tiempo_tratamiento CHAR(50),
  id_informe INT
  FOREIGN KEY (id_informe) REFERENCES informes_medicos(id);
);

CREATE TABLE reposos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  instrucciones CHAR(255),
  motivo CHAR(255),
  fecha DATE,
  fecha_fin DATE,
  id_historia INT,
  FOREIGN KEY (id_historia) REFERENCES historia_medica(id)
);

CREATE TABLE citas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fecha DATE,
  motivo CHAR(255),
  id_beneficiario INT,
  id_medico INT,
  id_afiliado INT,
  FOREIGN KEY (id_beneficiario) REFERENCES beneficiarios(id),
  FOREIGN KEY (id_medico) REFERENCES medicos(id)
);

CREATE TABLE documentos_personales (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre CHAR(100),
  descripcion CHAR(255),
  fecha_vencimiento DATE,
  id_historia INT,
  FOREIGN KEY (id_historia) REFERENCES historia_medica(id)
);

CREATE TABLE tramites (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre CHAR(100),
  motivo CHAR(255),
  descripcion CHAR(255),
  id_empleado INT,
  FOREIGN KEY (id_empleado) REFERENCES empleados(id)
);

CREATE TABLE requisito_tramite (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_requisito INT,
  id_tramite INT,
  FOREIGN KEY (id_requisito) REFERENCES requisitos(id),
  FOREIGN KEY (id_tramite) REFERENCES tramites(id)
);

CREATE TABLE solicitudes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  estado ENUM('PENDIENTE', 'APROBADO', 'RECHAZADO'),
  fecha_emision DATE,
  fecha_finalizacion DATE,
  id_afiliado INT,
  id_tramite INT,
  FOREIGN KEY (id_afiliado) REFERENCES afiliados(id),
  FOREIGN KEY (id_tramite) REFERENCES tramites(id)
);
