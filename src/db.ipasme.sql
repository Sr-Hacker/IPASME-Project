CREATE TABLE direcciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  direccion CHAR(255),
  zona CHAR(255),
  descripcion CHAR(255),
  postal CHAR(255)
);

CREATE TABLE instituciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre CHAR(255),
  rif CHAR(255),
  id_direccion INT,
  FOREIGN KEY (id_direccion) REFERENCES direcciones(id)
);

CREATE TABLE especialidades (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre CHAR(255)
);

CREATE TABLE medicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombres CHAR(255),
  apellidos INT,
  externo BOOLEAN,
  cedula CHAR(255)
);

CREATE TABLE historias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cod_historia CHAR(255),
  tipo_sangre CHAR(255),
  sexo CHAR(255),
  estatura DECIMAL,
  peso DECIMAL,
  fecha_nacimiento DATE
);

CREATE TABLE beneficiarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre CHAR(255),
  apellido CHAR(255),
  telefono CHAR(255),
  edad INT,
  cargo CHAR(255),
  cedula CHAR(255),
  id_historia INT,
  id_direccion INT,
  id_institucion INT,
  FOREIGN KEY (id_direccion) REFERENCES direcciones(id),
  FOREIGN KEY (id_institucion) REFERENCES instituciones(id),
  FOREIGN KEY (id_historia) REFERENCES historias(id)
);

CREATE TABLE requisitos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre CHAR(255),
  cod_requisito INT
);

CREATE TABLE empleados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  apellido CHAR(255),
  nombre CHAR(255),
  telefono CHAR(255),
  contrasena CHAR(255),
  cedula CHAR(255),
  rol CHAR(255)
);

CREATE TABLE informes_medicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  diagnostico CHAR(255),
  descripcion CHAR(255),
  motivo CHAR(255),
  fecha TIME,
  id_historia INT,
  id_medico INT,
  FOREIGN KEY (id_medico) REFERENCES medicos(id),
  FOREIGN KEY (id_historia) REFERENCES historias(id)
);

CREATE TABLE tratamientos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  instrucciones CHAR(255),
  motivo CHAR(255),
  tiempo_tratamiento CHAR(255),
  id_informe INT,
  FOREIGN KEY (id_informe) REFERENCES informes_medicos(id)
);

CREATE TABLE reposos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  instrucciones CHAR(255),
  motivo CHAR(255),
  fecha DATE,
  tiempo_tratamiento CHAR(255),
  id_historia INT,
  FOREIGN KEY (id_historia) REFERENCES historias(id)
);

CREATE TABLE tramites (
  id INT AUTO_INCREMENT PRIMARY KEY,
  activo BOOLEAN,
  fecha CHAR(255),
  tipo_tramite CHAR(255),
  motivo CHAR(255),
  id_beneficiario INT,
  id_empleado INT,
  FOREIGN KEY (id_empleado) REFERENCES empleados(id),
  FOREIGN KEY (id_beneficiario) REFERENCES beneficiarios(id)
);

CREATE TABLE citas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fecha TIME,
  motivo CHAR(255),
  id_beneficiario INT,
  id_medico INT,
  id_familiar INT,
  FOREIGN KEY (id_familiar) REFERENCES familiares(id),
  FOREIGN KEY (id_medico) REFERENCES medicos(id),
  FOREIGN KEY (id_beneficiario) REFERENCES beneficiarios(id)
);

CREATE TABLE familiares (
  id INT AUTO_INCREMENT PRIMARY KEY,
  parentesco CHAR(255),
  cedula CHAR(255),
  nombres CHAR(255),
  telefono CHAR(255),
  edad INT,
  fecha_nacimiento TIME,
  id_beneficiario INT,
  id_historia INT,
  FOREIGN KEY (id_historia) REFERENCES historias(id),
  FOREIGN KEY (id_beneficiario) REFERENCES beneficiarios(id)
);

CREATE TABLE medico_especialidad (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_medico INT,
  id_especialidad INT,
  FOREIGN KEY (id_medico) REFERENCES medicos(id),
  FOREIGN KEY (id_especialidad) REFERENCES especialidades(id)
);

CREATE TABLE documentos_personales (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre CHAR(255),
  descripcion CHAR(255),
  fecha_vencimiento TIME,
  id_historia INT,
  FOREIGN KEY (id_historia) REFERENCES historias(id)
);

CREATE TABLE patologias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  descripcion CHAR(255),
  hereditaria BOOLEAN,
  nombre CHAR(255),
  fecha TIME,
  id_historia INT,
  FOREIGN KEY (id_historia) REFERENCES historias(id)
);

CREATE TABLE requisito_tramite (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_requisito INT,
  id_tramite INT,
  FOREIGN KEY (id_requisito) REFERENCES requisitos(id),
  FOREIGN KEY (id_tramite) REFERENCES tramites(id)
);

INSERT INTO empleados (apellido, nombre, telefono, contrasena, cedula, rol)
VALUES ('Gonzalez', 'jose', '1234567890', '12345', '27436179', 'administrador'),
('Rodríguez', 'Ana', '0987654321', '12345', '7354250', 'empleado');
