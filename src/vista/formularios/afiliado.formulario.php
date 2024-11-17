<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Beneficiarios</title>
	<link rel="stylesheet" href="css/estilos_formularios.css">
</head>
<body>
<main>

  <form action="" class="formulario" id="formulario">

    

    <!-- Grupo: Nacionalidad -->
    <div class="formulario__grupo" id="grupo__nacionalidad">
      <label for="nacionalidad" class="formulario__label">Nacionalidad</label>
      <div class="formulario__grupo-input">
        <select name="nacionalidad" id="nacionalidad" class="nacionalidad">
            <option value="V">V</option>
            <option value="E">E</option>
        </select>
      </div>
      <p class="formulario__input-error">La cédula no debe contener letras, caracteres especiales y tampoco espacios</p>
    </div>

    <!-- Grupo: ced_afiliado -->
    <div class="formulario__grupo" id="grupo__ced_afiliado">
      <label for="ced_afiliado" class="formulario__label">Cédula</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" name="ced_afiliado" id="ced_afiliado" placeholder="12345678">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La cédula no debe contener letras, caracteres especiales y tampoco espacios</p>
    </div>

    <!-- Grupo: Tipo de rif -->
    <div class="formulario__grupo" id="grupo__tipo_rif">
      <label for="tipo_rif" class="formulario__label">Tipo de rif</label>
      <div class="formulario__grupo-input">
        <select name="tipo_rif" id="tipo_rif" class="tipo_rif">
            <option value="J">J</option>
            <option value="G">G</option>
        </select>
      </div>
      <p class="formulario__input-error">El rif de la institucion no debe contener simbolos, espacios ni letras a exección de la primera</p>
    </div>

    <!-- Grupo: Rif de la institución -->
    <div class="formulario__grupo" id="grupo__rif_institucion">
      <label for="rif_institucion" class="formulario__label">Rif de la institucion</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="J-12345678-9" id="rif_institucion" name="rif_institucion">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El rif de la institucion no debe contener simbolos, espacios ni letras a exección de la primera</p>
    </div>

    <!-- Grupo: Primer nombre -->
    <div class="formulario__grupo" id="grupo__primer_nombre">
      <label for="primer_nombre" class="formulario__label">Primer nombre</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Anderson" id="primer_nombre" name="primer_nombre">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El nombre no debe contener números, caracteres especiales ni espacios de por medio</p>
    </div>

    <!-- Grupo:Segundo nombre -->
    <div class="formulario__grupo" id="grupo__segundo_nombre">
      <label for="segundo_nombre" class="formulario__label">Segundo nombre</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="David" id="segundo_nombre" name="segundo_nombre">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El nombre no debe contener números, caracteres especiales ni espacios de por medio</p>
    </div>

    <!-- Grupo: Primer apellido -->
    <div class="formulario__grupo" id="grupo__primer_apellido">
      <label for="primer_apellido" class="formulario__label">Primer apellido</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Freitez" id="primer_apellido" name="primer_apellido">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El apellido no debe contener números, caracteres especiales ni espacios de por medio</p>
    </div>

    <!-- Grupo: Segundo apellido -->
    <div class="formulario__grupo" id="grupo__segundo_apellido">
      <label for="segundo_apellido" class="formulario__label">Segundo apellido</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Mendoza" id="segundo_apellido" name="segundo_apellido">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El apllido no debe contener números, caracteres especiales ni espacios de por medio</p>
    </div>

    <!--Grupo: Sexo-->
    <div class="formulario__grupo" id="grupo__sexo">
      <label for="sexo" class="formulario__label">Sexo</label>
      <div class="formulario__grupo-input">
        <select id="sexo" name="sexo">
          <option value="1">Hombre</option>
          <option value="0">Mujer</option>
        </select>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
    </div>

    <!-- Grupo: Fecha de nacimiento -->
    <div class="formulario__grupo" id="grupo__fecha_nacimiento">
      <label for="fecha_nacimiento" class="formulario__label">Fecha de nacimiento</label>
      <div class="formulario__grupo-input">
        <input type="date" class="formulario__input" id="fecha_nacimiento" name="fecha_nacimiento">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La fecha de nacimiento no puede estar vacía</p>
    </div>

    <!--Grupo: Estado_civil-->
    <div class="formulario__grupo" id="grupo__estado_civil">
      <label for="estado_civil" class="formulario__label">Estado civil</label>
      <div class="formulario__grupo-input">
        <select id="estado_civil" name="estado_civil">
          <option value="1">Casado</option>
          <option value="0">Divorciado</option>
          <option value="2">Viudo</option>
          <option value="3">Unión de hecho estable</option>
        </select>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
    </div>

    <!-- Grupo: Dirección -->
    <div class="formulario__grupo" id="grupo__direccion">
      <label for="direccion" class="formulario__label">Dirección</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="Sitio de referencia" id="direccion" name="direccion">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Alcanzó el límite máximo de caracteres</p>
    </div>

    <!--Grupo: Estado-->
    <div class="formulario__grupo" id="grupo__estado">
      <label for="estado" class="formulario__label">Estado</label>
      <div class="formulario__grupo-input">
        <select id="consultar_estados" name="consultar_estados">
        </select>
      </div>
    </div>
    
    <!--Grupo: Ciudad-->
    <div class="formulario__grupo" id="grupo__ciudad">
      <label for="ciudad" class="formulario__label">Ciudad</label>
      <div class="formulario__grupo-input">
        <select class="opc-modal" id="consultar_ciudades" name="consultar_ciudades">
        </select>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
    </div>

    <!--Grupo: Municipio-->
    <div class="formulario__grupo" id="grupo__municipio">
      <label for="municipio" class="formulario__label">Municipio</label>
      <div class="formulario__grupo-input">
        <select  id="municipio" name="municipio">
          <option value="Andres Eloy Blanco">Andres Eloy Blanco</option>
          <option value="Crespo">Crespo</option>
          <option value="Irribarren">Irribarren</option>
          <option value="Jimémez">Jimémez</option>
          <option value="Morán">Morán</option>
          <option value="Palavecino">Palavecino</option>
          <option value="Simón Planas">Simón Planas</option>
          <option value="Torres">Torres</option>
          <option value="Urdaneta">Urdaneta</option>
        </select>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
    </div>

    <!--Grupo: Parroquia-->
    <div class="formulario__grupo" id="grupo__parroquia">
      <label for="parroquia" class="formulario__label">Parroquia</label>
      <div class="formulario__grupo-input">
        <select  id="parroquia" name="parroquia">
          <option value="Aguedo Felipe Alvarado">Aguedo Felipe Alvarado</option>
          <option value="Buena Vista">Buena Vista</option>
          <option value="Catedral">Catedral</option>
          <option value="Concepción">Concepción</option>
          <option value="El Cují">El Cují</option>
          <option value="Juan de Villegas">Juan de Villegas</option>
          <option value="Santa Rosa">Santa Rosa</option>
          <option value="Unión">Unión</option>
        </select>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
    </div>

    <!-- Grupo: Correo electrónico -->
    <div class="formulario__grupo" id="grupo__correo_electronico">
      <label for="correo_electronico" class="formulario__label">Correo electrónico</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="ejemplo@gmail.com" id="correo_electronico" name="correo_electronico">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">Un correo electrónico solo puede contener letras (a-z), números (0-9) y punto (.) pero no dos consecutivos. Los caracteres no permitidos son  (& = _  - + ,<>) y su longitud debe tener entre 6 y 30 caracteres.</p>
    </div>

    <!-- Grupo: Prefijo telefono celular -->
    <div class="formulario__grupo" id="grupo__prefijo_telefono_celular">
      <label for="prefijo_telefono_celular" class="formulario__label">Prefijo telefonico</label>
      <div class="formulario__grupo-input">
      <select  id="prefijo_telefono_celular" name="prefijo_telefono_celular">
          <option value="0">0416</option>
          <option value="1">0426</option>
          <option value="2">0414</option>
          <option value="3">0424</option>
          <option value="4">0412</option>
        </select></div>
      <p class="formulario__input-error">Debe seleccionar un prefijo telefonico</p>
    </div>

    <!-- Grupo: Telefono celular -->
    <div class="formulario__grupo" id="grupo__telefono_celular">
      <label for="telefono_celular" class="formulario__label">Teléfono celular</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="04160000000" id="telefono_celular" name="telefono_celular">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El telélefono celular no debe contener letras ni caracteres especiales y su longitud debe ser de 11 dígitos</p>
    </div>

    <!-- Grupo: Prefijo telefono habitacion -->
    <div class="formulario__grupo" id="grupo__prefijo_telefono_habitacion">
      <label for="prefijo_telefono_habitacion" class="formulario__label">Prefijo telefonico</label>
      <div class="formulario__grupo-input">
        <select  id="prefijo_telefono_habitacion" name="prefijo_telefono_habitacion">
          <option value="0">0253</option>
          <option value="1">0251</option>
        </select>
      </div>
      <p class="formulario__input-error">Debe seleccionar un prefijo telefonico</p>
    </div>


    <!-- Grupo: Telefono habitación -->
    <div class="formulario__grupo" id="grupo__telefono_habitacion">
      <label for="telefono_habitacion" class="formulario__label">Teléfono de habitación</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="02530000000" id="telefono_habitacion" name="telefono_habitacion">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El telélefono de habitación no debe contener letras ni caracteres especiales y su longitud debe ser de 11 dígitos</p>
    </div>

    <!-- Grupo: Prefijo telefono trabajo -->
    <div class="formulario__grupo" id="grupo__prefijo_telefono_trabajo">
      <label for="prefijo_telefono_trabajo" class="formulario__label">Prefijo telefonico</label>
      <div class="formulario__grupo-input">
        <select  id="prefijo_telefono_trabajo" name="prefijo_telefono_trabajo">
          <option value="0">0253</option>
          <option value="1">0251</option>
        </select>
      </div>
      <p class="formulario__input-error">Debe seleccionar un prefijo telefonico</p>
    </div>

    <!-- Grupo: Telefono trabajo -->
    <div class="formulario__grupo" id="grupo__telefono_trabajo">
      <label for="telefono_trabajo" class="formulario__label">Teléfono trabajo</label>
      <div class="formulario__grupo-input">
        <input type="text" class="formulario__input" placeholder="04260000000" id="telefono_trabajo" name="telefono_trabajo">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">El telélefono del trabajo no debe contener letras ni caracteres especiales y su longitud debe ser de 11 dígitos</p>
    </div>

    <!-- Grupo: Fecha de ingreso -->
    <div class="formulario__grupo" id="grupo__fecha_ingreso">
      <label for="fecha_ingreso" class="formulario__label">Fecha de ingreso</label>
      <div class="formulario__grupo-input">
        <input type="date" class="formulario__input" id="fecha_ingreso" name="fecha_ingreso">
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
      <p class="formulario__input-error">La fecha de ingreso no puede estar vacía</p>
    </div>

    <!--Grupo: Tipo de cargo -->
    <div class="formulario__grupo" id="grupo__cargo">
      <label for="cargo" class="formulario__label">Tipo de cargo</label>
      <div class="formulario__grupo-input">
        <select id="cargo" name="cargo">
          <option value="1">Docente</option>
          <option value="0">Administrativo</option>
          <option value="2">Obrero</option>
          <option value="3">Otros</option>
        </select>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
    </div>

    <!--Grupo: Situación laboral-->
    <div class="formulario__grupo" id="grupo__situacion_laboral">
      <label for="situacion_laboral" class="formulario__label">Estado civil</label>
      <div class="formulario__grupo-input">
        <select id="situacion_laboral" name="situacion_laboral">
          <option value="1">Activo</option>
          <option value="0">Jubilado</option>
          <option value="2">Pensionado</option>
        </select>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
      </div>
    </div>


  <!-- Mensaje de error del formulario -->
  <div class="formulario__mensaje" id="formulario__mensaje">
    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
  </div>

  <div class="formulario__grupo formulario__grupo-btn-enviar">
    <button type="submit" class="formulario__btn">Incluir</button>
    <button type="reset" value="reiniciar" class="formulario__btn">Limpiar</button>
    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
  </div>
</form>
</main>


</body>