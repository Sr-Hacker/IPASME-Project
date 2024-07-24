-- Tabla: institucion
CREATE TABLE institucion (
  rif VARCHAR(20) PRIMARY KEY,
  direccion VARCHAR(255),
  nombre VARCHAR(100),
  telefono VARCHAR(15),
  correo VARCHAR(50),
  ciudad VARCHAR(100),
  estado_provincia VARCHAR(100),
  zona_postal VARCHAR(10)
);

-- Tabla: empleado
CREATE TABLE empleado (
  ced_empleado CHAR(10) PRIMARY KEY,
  apellido CHAR(50),
  nombre CHAR(50),
  telefono CHAR(15),
  contrasena CHAR(50),
  rol ENUM('Admin', 'User')
);

-- Tabla: medico
CREATE TABLE medico (
  ced_medico CHAR(10) PRIMARY KEY,
  nombre CHAR(50),
  apellido CHAR(50),
  estado CHAR(50)
);

-- Tabla: especialidad
CREATE TABLE especialidad (
  cod_especialidad CHAR(10) PRIMARY KEY,
  nombre CHAR(50)
);

-- Tabla: informe_medico
CREATE TABLE informe_medico (
  n_informe CHAR(10) PRIMARY KEY,
  diagnostico CHAR(255),
  descripcion CHAR(255),
  ced_medico CHAR(10),
  FOREIGN KEY (ced_medico) REFERENCES medico(ced_medico)
);

-- Tabla: historia_medica
CREATE TABLE historia_medica (
  n_historia CHAR(10) PRIMARY KEY,
  n_informe CHAR(10),
  examenes_medicos CHAR(255),
  FOREIGN KEY (n_informe) REFERENCES informe_medico(n_informe)
);

-- Tabla: afiliado
CREATE TABLE afiliado (
  ced_afiliado CHAR(10) PRIMARY KEY,
  nombre CHAR(50),
  apellido CHAR(50),
  fecha_nacimiento DATE,
  sexo CHAR(1),
  telefono CHAR(15),
  correo VARCHAR(50),
  direccion CHAR(255),
  cargo CHAR(50),
  estado BOOLEAN,
  ciudad CHAR(50),
  provincia CHAR(50),
  codigo_postal VARCHAR(10),
  n_historia CHAR(10),
  rif_institucion VARCHAR(20),
  FOREIGN KEY (rif_institucion) REFERENCES institucion(rif),
  FOREIGN KEY (n_historia) REFERENCES historia_medica(n_historia)
);

-- Tabla: beneficiario
CREATE TABLE beneficiario (
  ced_beneficiario CHAR(10) PRIMARY KEY,
  nombre CHAR(50),
  apellido CHAR(50),
  fecha_nacimiento DATE,
  sexo CHAR(1),
  telefono CHAR(15),
  correo VARCHAR(50),
  direccion CHAR(255),
  ciudad CHAR(50),
  provincia CHAR(50),
  codigo_postal VARCHAR(10),
  n_historia CHAR(10),
  ced_afiliado CHAR(10),
  FOREIGN KEY (ced_afiliado) REFERENCES afiliado(ced_afiliado),
  FOREIGN KEY (n_historia) REFERENCES historia_medica(n_historia)
);

-- Tabla: cita
CREATE TABLE cita (
  cod_cita INT AUTO_INCREMENT PRIMARY KEY,
  fecha DATE,
  hora TIME,
  ced_medico CHAR(10),
  ced_beneficiario CHAR(10),
  ced_afiliado CHAR(10),
  FOREIGN KEY (ced_medico) REFERENCES medico(ced_medico),
  FOREIGN KEY (ced_beneficiario) REFERENCES beneficiario(ced_beneficiario),
  FOREIGN KEY (ced_afiliado) REFERENCES afiliado(ced_afiliado)
);

-- Tabla: patologia
CREATE TABLE patologia (
  cod_patologia INT AUTO_INCREMENT PRIMARY KEY,
  tipo_patologia CHAR(50),
  descripcion CHAR(255),
  hereditaria BOOLEAN,
  n_historia CHAR(10),
  FOREIGN KEY (n_historia) REFERENCES historia_medica(n_historia)
);

-- Tabla: tramite
CREATE TABLE tramite (
  cod_tramite CHAR(10) PRIMARY KEY,
  activo BOOLEAN,
  ced_afiliado CHAR(10),
  ced_empleado CHAR(10),
  fecha DATE,
  tipo_tramite CHAR(50),
  motivo CHAR(255),
  FOREIGN KEY (ced_afiliado) REFERENCES afiliado(ced_afiliado),
  FOREIGN KEY (ced_empleado) REFERENCES empleado(ced_empleado)
);

-- Tabla: tratamiento
CREATE TABLE tratamiento (
  n_tratamiento CHAR(10) PRIMARY KEY,
  tipo_tratamiento CHAR(50),
  instrucciones CHAR(255),
  motivo CHAR(255),
  tiempo_tratamiento CHAR(50),
  n_historia CHAR(10),
  n_informe CHAR(10),
  FOREIGN KEY (n_historia) REFERENCES historia_medica(n_historia),
  FOREIGN KEY (n_informe) REFERENCES informe_medico(n_informe)
);

-- Tabla: solicitud
CREATE TABLE solicitud (
  n_solicitud CHAR(10) PRIMARY KEY,
  estado CHAR(20),
  fecha_emision DATE,
  fecha_finalizacion DATE,
  ced_afiliado CHAR(10),
  cod_tramite CHAR(10),
  FOREIGN KEY (ced_afiliado) REFERENCES afiliado(ced_afiliado),
  FOREIGN KEY (cod_tramite) REFERENCES tramite(cod_tramite)
);

-- Tabla: requisito
CREATE TABLE requisito (
  cod_requisito CHAR(10) PRIMARY KEY,
  nombre CHAR(50),
  activo BOOLEAN
);

-- Tabla: reposos
CREATE TABLE reposos (
  n_reposo INT AUTO_INCREMENT PRIMARY KEY,
  instrucciones TEXT,
  motivo VARCHAR(255),
  fecha_inicio DATE,
  fecha_fin DATE,
  n_historia VARCHAR(50),
  FOREIGN KEY (n_historia) REFERENCES historia_medica(n_historia)
);

-- Tabla union: especialidad_medico
CREATE TABLE especialidad_medico (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ced_medico VARCHAR(20),
  cod_especialidad VARCHAR(50),
  FOREIGN KEY (ced_medico) REFERENCES medico(ced_medico),
  FOREIGN KEY (cod_especialidad) REFERENCES especialidad(cod_especialidad)
);

-- Tabla: documentos_personales
CREATE TABLE documentos_personales (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255),
  descripcion TEXT,
  fecha_vencimiento DATE,
  n_historia VARCHAR(50),
  FOREIGN KEY (n_historia) REFERENCES historia_medica(n_historia)
);

-- Tabla union: requisito_tramite
CREATE TABLE requisito_tramite (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cod_requisito CHAR(10),
  cod_tramite CHAR(10),
  FOREIGN KEY (cod_requisito) REFERENCES requisito(cod_requisito),
  FOREIGN KEY (cod_tramite) REFERENCES tramite(cod_tramite)
);
