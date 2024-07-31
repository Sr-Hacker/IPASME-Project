CREATE TABLE medicos (
  ced_medico CHAR(10) PRIMARY KEY,
  nombre CHAR(50),
  apellido CHAR(50),
  estado CHAR(50)
);

CREATE TABLE especialidades (
  cod_especialidad CHAR(10) PRIMARY KEY,
  nombre CHAR(50)
);

CREATE TABLE empleados (
  ced_empleado VARCHAR(20) PRIMARY KEY,
  nombre VARCHAR(50),
  apellido VARCHAR(50),
  telefono VARCHAR(100),
  fecha_nacimiento DATE,
  sexo CHAR(1),
  estado_provincia VARCHAR(100),
  ciudad VARCHAR(100),
  direccion VARCHAR(255),
  numero_casa VARCHAR(10),
  codigo_postal VARCHAR(10),
  correo VARCHAR(100),
  contrasena VARCHAR(50),
  rol ENUM('admin', 'user')
);

CREATE TABLE tramites (
  cod_tramite VARCHAR(20) PRIMARY KEY,
  ced_empleado VARCHAR(20),
  nombre VARCHAR(50),
  fecha DATE,
  activo BOOLEAN,
  motivo TEXT,
  FOREIGN KEY (ced_empleado) REFERENCES empleados(ced_empleado)
);

CREATE TABLE historias_medicas (
  n_historia VARCHAR(20) PRIMARY KEY,
  fecha_registro DATE,
  partida_de_nacimiento boolean,
  acta_de_matrimonio boolean,
  constancia_Trabajo boolean
);

CREATE TABLE instituciones (
  rif VARCHAR(20) PRIMARY KEY,
  direccion VARCHAR(255),
  nombre VARCHAR(100),
  telefono VARCHAR(15),
  correo VARCHAR(50),
  ciudad VARCHAR(100),
  estado_provincia VARCHAR(100),
  zona_postal VARCHAR(10)
);

CREATE TABLE afiliados (
  ced_afiliado VARCHAR(20) PRIMARY KEY,
  nombre VARCHAR(100),
  apellido VARCHAR(100),
  fecha_nacimiento DATE,
  sexo CHAR(1),
  estado_provincia VARCHAR(100),
  ciudad VARCHAR(100),
  direccion VARCHAR(255),
  numero_casa VARCHAR(10),
  codigo_postal VARCHAR(10),
  telefono VARCHAR(100),
  correo VARCHAR(100),
  tipo_sangre VARCHAR(3),
  n_historia VARCHAR(20),
  rif_institucion VARCHAR(20),
  FOREIGN KEY (n_historia) REFERENCES historias_medicas(n_historia),
  FOREIGN KEY (rif_institucion) REFERENCES instituciones(rif_institucion)
);

CREATE TABLE beneficiarios (
  ced_beneficiario VARCHAR(20) PRIMARY KEY,
  ced_afiliado VARCHAR(20),
  n_historia VARCHAR(20),
  nombre VARCHAR(100),
  apellido VARCHAR(100),
  fecha_nacimiento DATE,
  sexo CHAR(1),
  estado_provincia VARCHAR(100),
  ciudad VARCHAR(100),
  direccion VARCHAR(255),
  numero_casa VARCHAR(10),
  codigo_postal VARCHAR(10),
  telefono VARCHAR(100),
  correo VARCHAR(100),
  tipo_sangre VARCHAR(3),
  relacion VARCHAR(50),
  FOREIGN KEY (ced_afiliado) REFERENCES afiliados(ced_afiliado),
  FOREIGN KEY (n_historia) REFERENCES historias_medicas(n_historia)
);

CREATE TABLE especialidad_medico (
  cod_especialidad_medico VARCHAR(20),
  ced_medico VARCHAR(20),
  cod_especialidad VARCHAR(20),
  FOREIGN KEY (ced_medico) REFERENCES medicos(ced_medico),
  FOREIGN KEY (cod_especialidad) REFERENCES especialidad(cod_especialidad)
);

CREATE TABLE citas (
  cod_cita INT AUTO_INCREMENT PRIMARY KEY,
  ced_afiliado VARCHAR(20),
  cod_especialidad_medico VARCHAR(20),
  fecha DATE,
  hora TIME,
  FOREIGN KEY (ced_medico) REFERENCES medicos(ced_medico),
  FOREIGN KEY (ced_afiliado) REFERENCES afiliados(ced_afiliado)
);

CREATE TABLE solicitudes (
  n_solicitud VARCHAR(20) PRIMARY KEY,
  ced_afiliado VARCHAR(20),
  cod_tramite VARCHAR(20),
  fecha_emision DATE,
  estado VARCHAR(20),
  fecha_final DATE,
  FOREIGN KEY (ced_afiliado) REFERENCES afiliados(ced_afiliado),
  FOREIGN KEY (cod_tramite) REFERENCES tramites(cod_tramite)
);

CREATE TABLE requisitos (
  cod_requisito VARCHAR(20) PRIMARY KEY,
  nombre VARCHAR(50)
);

CREATE TABLE requisito_tramite (
  cod_requisito VARCHAR(20),
  cod_tramite VARCHAR(20),
  PRIMARY KEY (cod_requisito, cod_tramite),
  FOREIGN KEY (cod_requisito) REFERENCES requisitos(cod_requisito),
  FOREIGN KEY (cod_tramite) REFERENCES tramites(cod_tramite)
);

CREATE TABLE tratamientos (
  n_tratamiento VARCHAR(20) PRIMARY KEY,
  tipo_tratamiento VARCHAR(20),
  instrucciones TEXT,
  motivo VARCHAR(255),
  tiempo_tratamiento VARCHAR(50)
);

CREATE TABLE consultas (
  n_consulta INT PRIMARY KEY,
  ced_empleado VARCHAR(20),
  n_historia VARCHAR(20),
  fecha DATE,
  motivo VARCHAR(255),
  descripcion TEXT
);

CREATE TABLE patologias (
  codigo_patologia VARCHAR(20) PRIMARY KEY,
  nombre VARCHAR(50),
  descripcion TEXT
);

CREATE TABLE informes_medicos (
  codigo_informe VARCHAR(20) PRIMARY KEY,
  n_consulta INT,
  descripcion TEXT,
  diagnostico TEXT,
  FOREIGN KEY (n_consulta) REFERENCES consultas(n_consulta)
);

CREATE TABLE informe_patologia (
  codigo_informe VARCHAR(20),
  codigo_patologia VARCHAR(20),
  PRIMARY KEY (codigo_informe, codigo_patologia)
  FOREIGN KEY (codigo_informe) REFERENCES informes_medicos(codigo_informe)
  FOREIGN KEY (codigo_patologia) REFERENCES consultas(codigo_patologia)
);

CREATE TABLE reposos (
  n_reposo INT AUTO_INCREMENT PRIMARY KEY,
  n_consulta int,
  instrucciones TEXT,
  motivo VARCHAR(255),
  fecha_inicio DATE,
  fecha_fin DATE,
  FOREIGN KEY (n_consulta) REFERENCES consultas(n_consulta)
);
