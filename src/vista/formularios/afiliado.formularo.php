<link rel="stylesheet" href="css/error.css">
<link rel="stylesheet" href="css/estilos_formularios.css">

<div class="container_beneficiarios">
  <form action="" class="formulario" id="formulario">

    <div class="formulario__grupo" id="grupo__apellidos">
      <label for="ced_afiliado" class="formulario__label">Cedula</label>
      <input class="formulario__input" type="text" name="ced_afiliado" id="ced_afiliado">
      <span id="m_ced_afiliado"></span>
    </div>

    <div class="formulario__grupo">
      <label for="primer_nombre" class="formulario__label">Nombre</label>
      <input class="formulario__input" type="text" name="primer_nombre" id="primer_nombre">
      <span id="m_primer_nombre"></span>
    </div>

    <div class="formulario__grupo">
      <label for="segundo_nombre" class="formulario__label">Segundo Nombre</label>
      <input class="formulario__input" type="text" name="segundo_nombre" id="segundo_nombre">
      <span id="m_segundo_nombre"></span>
    </div>

    <div class="formulario__grupo">
      <label for="primer_apellido" class="formulario__label">Apellido</label>
      <input class="formulario__input" type="text" name="primer_apellido" id="primer_apellido">
      <span id="m_primer_apellido"></span>
    </div>

    <div class="formulario__grupo">
      <label for="segundo_apellido" class="formulario__label">segundo_apellido</label>
      <input class="formulario__input" type="text" name="segundo_apellido" id="segundo_apellido">
      <span id="m_segundo_apellido"></span>
    </div>

    <div class="formulario__grupo">
      <label for="direccion_habitacion" class="formulario__label">direccion_habitacion</label>
      <input class="formulario__input" type="text" name="direccion_habitacion" id="direccion_habitacion">
      <span id="m_direccion_habitacion"></span>
    </div>

    <div class="formulario__grupo">
      <label for="correo_electronico" class="formulario__label">correo_electronico</label>
      <input class="formulario__input" type="text" name="correo_electronico" id="correo_electronico">
      <span id="m_correo_electronico"></span>
    </div>

    <div class="formulario__grupo">
      <label for="telefono_celular" class="formulario__label">telefono_celular</label>
      <input class="formulario__input" type="number" name="telefono_celular" id="telefono_celular">
      <span id="m_telefono_celular"></span>
    </div>

   <div class="formulario__grupo">
     <label for="telefono_habitacion" class="formulario__label">telefono_habitacion</label>
     <input class="formulario__input" type="number" name="telefono_habitacion" id="telefono_habitacion">
     <span id="m_telefono_habitacion"></span>
   </div>

   <div class="formulario__grupo">
     <label for="telefono_trabajo" class="formulario__label">telefono_trabajo</label>
     <input class="formulario__input" type="number" name="telefono_trabajo" id="telefono_trabajo">
     <span id="m_telefono_trabajo"></span>
   </div>

   <div class="formulario__grupo">
     <label for="fecha_ingreso" class="formulario__label">fecha_ingreso</label>
     <input class="formulario__input" type="date" name="fecha_ingreso" id="fecha_ingreso">
     <span id="m_fecha_ingreso"></span>
   </div>

   <div class="formulario__grupo">
     <label for="fecha_nacimiento" class="formulario__label">fecha nacimiento</label>
     <input class="formulario__input" type="date" name="fecha_nacimiento" id="fecha_nacimiento">
     <span id="m_fecha_nacimiento"></span>
  </div>

  <div class="formulario__grupo">
    <label for="cargo" class="formulario__label">cargo</label>
    <select class="opc-modal" name="cargo" id="cargo">
      <option value="">Selected</option>
      <option value="docente">docente</option>
      <option value="adminoistrativo">adminoistrativo</option>
      <option value="obrero">obrero</option>
      <option value="otros">otros</option>
    </select>
    <span id="m_cargo"></span>
  </div>

  <div class="formulario__grupo">
    <label for="situacion_laboral" class="formulario__label">situacion_laboral</label>
    <select class="opc-modal" name="situacion_laboral" id="situacion_laboral">
      <option value="">Selected</option>
      <option value="jubilado">Jubilado</option>
      <option value="pensionado">Pensionado</option>
      <option value="contratado">Contratado</option>
    </select>
    <span id="m_situacion_laboral"></span>
  </div>

  <div class="formulario__grupo">
    <label for="estado_civil" class="formulario__label">estado_civil</label>
    <select class="opc-modal" name="estado_civil" id="estado_civil">
      <option value="">Selected</option>
      <option value="soltero">Soltero</option>
      <option value="casado">Casado</option>
      <option value="divorciado">Divorciado</option>
      <option value="viudo">Viudo</option>
    </select>
    <span id="m_estado_civil"></span>
  </div>

  <div class="formulario__grupo">
      <label for="sexo" class="formulario__label">sexo</label>
      <div class="formulario__grupo-input">
        <select class="opc-modal" id="sexo" name="sexo">
          <option value="">Selected</option>
          <option value="M">Hombre</option>
          <option value="F">Mujer</option>
        </select>
      </div>
      <span id="m_sexo"></span>
  </div>

  <div class="formulario__grupo">
    <label for="estado" class="formulario__label">estado</label>
    <select class="opc-modal" name="estado" id="consultar_estados">
      </select>
      <span id="m_estado"></span>
  </div>

  <div class="formulario__grupo">
    <label for="ciudad" class="formulario__label">ciudad</label>
    <select class="opc-modal" name="ciudad" id="consultar_ciudades">
      </select>
      <span id="m_ciudad"></span>
  </div>

  <div class="formulario__grupo">
    <label for="consultar_instituciones" class="formulario__label">ciudad</label>
    <select class="opc-modal" name="consultar_instituciones" id="consultar_instituciones">
      </select>
      <span id="m_ciudad"></span>
  </div>

    <div class="formulario__grupo">
      <label for="n_historia" class="formulario__label">numero historia</label>
      <input class="formulario__input" type="text" name="n_historia" id="n_historia">
      <span id="m_n_historia"></span>
    </div>

    <div class="formulario__grupo formulario__grupo-btn-enviar">
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>
  </form>
</div>
