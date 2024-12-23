use data_uptaeb;

CREATE TABLE estados (
  cod_estado INT AUTO_INCREMENT PRIMARY KEY,
  nombre_estado VARCHAR(30)
);

CREATE TABLE patologias (
  cod_patologia INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(30),
  descripcion TEXT
);

CREATE TABLE ciudades (
  cod_ciudad INT AUTO_INCREMENT PRIMARY KEY,
  cod_estado INT,
  nombre_ciudad VARCHAR(30),
  FOREIGN KEY (cod_estado) REFERENCES estados(cod_estado)
);

CREATE TABLE instituciones (
  rif_institucion VARCHAR(10) PRIMARY KEY,
  cod_ciudad INT,
  nombre VARCHAR(50),
  direccion VARCHAR(255),
  codigo_postal VARCHAR(10),
  telefono VARCHAR(11),
  correo VARCHAR(50),
  tipo_institucion VARCHAR(30),
  FOREIGN KEY (cod_ciudad) REFERENCES ciudades(cod_ciudad)
);

CREATE TABLE afiliado (
  ced_afiliado INT(10) PRIMARY KEY,
  rif_institucion VARCHAR(10),
  primer_nombre VARCHAR(20),
  segundo_nombre VARCHAR(20),
  primer_apellido VARCHAR(20),
  segundo_apellido VARCHAR(20),
  sexo ENUM('M', 'F'),
  fecha_nacimiento DATE,
  estado_civil ENUM('soltero', 'casado', 'divorciado', 'viudo'),
  direccion_habitacion VARCHAR(100),
  estado VARCHAR(30),
  ciudad VARCHAR(30),
  municipio VARCHAR(30),
  parroquia VARCHAR(30),
  correo_electronico VARCHAR(50),
  telefono_celular VARCHAR(11),
  telefono_habitacion VARCHAR(11),
  telefono_trabajo VARCHAR(11),
  fecha_ingreso DATE,
  cargo ENUM('docente', 'adminoistrativo', 'obrero', 'otros'),
  situacion_laboral ENUM('jubilado', 'pensionado', 'contratado'),
  FOREIGN KEY (rif_institucion) REFERENCES instituciones(rif_institucion)
);

CREATE TABLE beneficiarios (
  ced_beneficiario INT(10) PRIMARY KEY,
  ced_afiliado INT(10),
  nombres VARCHAR(50),
  apellidos VARCHAR(50),
  fecha_nacimiento DATE,
  sexo ENUM('M', 'F'),
  parentesco ENUM('padre', 'hijo', 'esposo'),
  estado_civil ENUM('soltero', 'casado', 'divorciado', 'viudo'),
  direccion VARCHAR(100),
  telefono_celular VARCHAR(11),
  FOREIGN KEY (ced_afiliado) REFERENCES afiliado(ced_afiliado)
);

CREATE TABLE empleado (
  ced_empleado INT PRIMARY KEY,
  nombres VARCHAR(50),
  apellidos VARCHAR(50),
  telefono_celular VARCHAR(15),
  contrasena VARCHAR(50),
  rol ENUM('admin', 'empleado') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tramite (
  cod_tramite INT PRIMARY KEY,
  ced_empleado INT,
  nombre VARCHAR(50),
  descripcion VARCHAR(255),
  FOREIGN KEY (ced_empleado) REFERENCES empleado(ced_empleado)
);

CREATE TABLE solicitud_tramite (
  n_solicitud INT PRIMARY KEY,
  ced_afiliado INT,
  cod_tramite INT,
  estado_solicitud ENUM('estado1', 'estado2', 'estado3'),
  fecha_emision DATE,
  fecha_final DATE,
  condicion_aceptado_denegado VARCHAR(250),
  FOREIGN KEY (ced_afiliado) REFERENCES afiliado(ced_afiliado),
  FOREIGN KEY (cod_tramite) REFERENCES tramite(cod_tramite)
);

CREATE TABLE requisito (
  cod_requisito INT PRIMARY KEY,
  nombre VARCHAR(50)
);

CREATE TABLE requisito_tramite (
  cod_tramite INT,
  cod_requisito INT,
  PRIMARY KEY (cod_tramite, cod_requisito),
  FOREIGN KEY (cod_tramite) REFERENCES tramite(cod_tramite),
  FOREIGN KEY (cod_requisito) REFERENCES requisito(cod_requisito)
);

CREATE TABLE especialidades (
  cod_espe INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50)
);

CREATE TABLE medico (
  ced_medico INT PRIMARY KEY,
  nombres VARCHAR(50),
  apellidos VARCHAR(50),
  activo BOOLEAN,
  telefono VARCHAR(11)
);

CREATE TABLE horario_medico (
  cod_horario INT PRIMARY KEY,
  ced_medico INT,
  dia VARCHAR(9),
  hora ENUM('estado1', 'estado2', 'estado3'),
  FOREIGN KEY (ced_medico) REFERENCES medico(ced_medico)
);

CREATE TABLE especialidad_medico (
  cod_especialidad_medico INT AUTO_INCREMENT PRIMARY KEY,
  ced_medico INT,
  cod_espe INT,
  FOREIGN KEY (ced_medico) REFERENCES medico(ced_medico),
  FOREIGN KEY (cod_espe) REFERENCES especialidades(cod_espe)
);

CREATE TABLE citas (
  cod_cita INT AUTO_INCREMENT PRIMARY KEY,
  ced_afiliado INT,
  cod_especialidad_medico INT,
  ced_beneficiario INT,
  fecha DATE,
  hora TIME,
  detalle VARCHAR(255),
  vigente BOOLEAN,
  FOREIGN KEY (ced_afiliado) REFERENCES afiliado(ced_afiliado),
  FOREIGN KEY (ced_beneficiario) REFERENCES beneficiarios(ced_beneficiario),
  FOREIGN KEY (cod_especialidad_medico) REFERENCES especialidad_medico(cod_especialidad_medico)
);

CREATE TABLE historia_medica (
  n_historia INT PRIMARY KEY,
  Fecha_de_registro DATE,
  partida_de_nacimiento VARCHAR(255),
  acta_de_matrimonio VARCHAR(255),
  constancia_trabajo VARCHAR(255),
  tipo_sangre VARCHAR(5)
);

CREATE TABLE consulta (
  n_consulta INT PRIMARY KEY,
  cod_cita INT,
  n_historia INT,
  motivo VARCHAR(255),
  detalle VARCHAR(255),
  FOREIGN KEY (cod_cita) REFERENCES citas(cod_cita),
  FOREIGN KEY (n_historia) REFERENCES historia_medica(n_historia)
);

CREATE TABLE reposos (
  n_reposo INT PRIMARY KEY,
  n_consulta INT,
  motivo VARCHAR(255),
  instrucciones VARCHAR(255),
  fecha_inicio DATE,
  fecha_final DATE,
  FOREIGN KEY (n_consulta) REFERENCES consulta(n_consulta)
);

CREATE TABLE informe_medico (
  cod_informe INT PRIMARY KEY,
  n_consulta INT,
  descripcion TEXT,
  diagnostico TEXT,
  FOREIGN KEY (n_consulta) REFERENCES consulta(n_consulta)
);

CREATE TABLE tratamientos (
  n_tratamiento INT PRIMARY KEY,
  cod_informe INT,
  tipo_tratamiento VARCHAR(20),
  instrucciones VARCHAR(255),
  motivo VARCHAR(255),
  tiempo_tratamiento VARCHAR(25),
  FOREIGN KEY (cod_informe) REFERENCES informe_medico(cod_informe)
);
