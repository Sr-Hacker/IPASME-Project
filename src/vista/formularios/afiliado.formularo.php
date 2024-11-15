<link rel="stylesheet" href="css/error.css">
<link rel="stylesheet" href="css/estilos_formularios.css">

<div class="container_beneficiarios">

    <label for="ced_afiliado">ced_afiliado</label>
    <input type="text" name="ced_afiliado" id="ced_afiliado">
    <span id="m_ced_afiliado"></span>

    <label for="primer_nombre">primer_nombre</label>
    <input type="text" name="primer_nombre" id="primer_nombre">
    <span id="m_primer_nombre"></span>

    <label for="segundo_nombre">segundo_nombre</label>
    <input type="text" name="segundo_nombre" id="segundo_nombre">
    <span id="m_segundo_nombre"></span>

    <label for="primer_apellido">primer_apellido</label>
    <input type="text" name="primer_apellido" id="primer_apellido">
    <span id="m_primer_apellido"></span>

    <label for="segundo_apellido">segundo_apellido</label>
    <input type="text" name="segundo_apellido" id="segundo_apellido">
    <span id="m_segundo_apellido"></span>

    <label for="direccion_habitacion">direccion_habitacion</label>
    <input type="text" name="direccion_habitacion" id="direccion_habitacion">
    <span id="m_direccion_habitacion"></span>

    <label for="municipio">municipio</label>
    <input type="text" name="municipio" id="municipio">
    <span id="m_municipio"></span>

    <label for="parroquia">parroquia</label>
    <input type="text" name="parroquia" id="parroquia">
    <span id="m_parroquia"></span>

    <label for="correo_electronico">correo_electronico</label>
    <input type="text" name="correo_electronico" id="correo_electronico">
    <span id="m_correo_electronico"></span>

    <label for="telefono_celular">telefono_celular</label>
    <input type="number" name="telefono_celular" id="telefono_celular">
    <span id="m_telefono_celular"></span>

    <label for="telefono_habitacion">telefono_habitacion</label>
    <input type="number" name="telefono_habitacion" id="telefono_habitacion">
    <span id="m_telefono_habitacion"></span>

    <label for="telefono_trabajo">telefono_trabajo</label>
    <input type="number" name="telefono_trabajo" id="telefono_trabajo">
    <span id="m_telefono_trabajo"></span>

    <label for="fecha_ingreso">fecha_ingreso</label>
    <input type="date" name="fecha_ingreso" id="fecha_ingreso">
    <span id="m_fecha_ingreso"></span>

    <label for="fecha_nacimiento">fecha nacimiento</label>
    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
    <span id="m_fecha_nacimiento"></span>

    <label for="cargo">cargo</label>
    <select class="opc-modal" name="cargo" id="cargo">
      <option value="">Selected</option>
      <option value="docente">docente</option>
      <option value="adminoistrativo">adminoistrativo</option>
      <option value="obrero">obrero</option>
      <option value="otros">otros</option>
    </select>
    <span id="m_cargo"></span>

    <label for="situacion_laboral">situacion_laboral</label>
    <select class="opc-modal" name="situacion_laboral" id="situacion_laboral">
      <option value="">Selected</option>
      <option value="jubilado">Jubilado</option>
      <option value="pensionado">Pensionado</option>
      <option value="contratado">Contratado</option>
    </select>
    <span id="m_situacion_laboral"></span>

    <label for="estado_civil">estado_civil</label>
    <select class="opc-modal" name="estado_civil" id="estado_civil">
      <option value="">Selected</option>
      <option value="soltero">Soltero</option>
      <option value="casado">Casado</option>
      <option value="divorciado">Divorciado</option>
      <option value="viudo">Viudo</option>
    </select>
    <span id="m_estado_civil"></span>

    <label for="sexo">sexo</label>
    <select class="opc-modal" id="sexo" name="sexo">
      <option value="">Selected</option>
      <option value="M">Hombre</option>
      <option value="F">Mujer</option>
    </select>
    <span id="m_sexo"></span>

    <label for="consultar_instituciones">Institucion</label>
    <select class="opc-modal" id="consultar_instituciones" name="rif_institucion">
    </select>

    <label for="estado">estado</label>
    <select class="opc-modal" name="estado" id="consultar_estados">
    </select>
    <span id="m_estado"></span>

    <label for="ciudad">ciudad</label>
    <select class="opc-modal" name="ciudad" id="consultar_ciudades">
    </select>
    <span id="m_ciudad"></span>

    <div>
      <button class="btn-modal" id="action_modal">incluir</button>
      <button class="btn-modal" id="closeModal">cancelar</button>
    </div>
  </div>
</div>
