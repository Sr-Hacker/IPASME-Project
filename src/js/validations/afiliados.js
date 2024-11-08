document.addEventListener("DOMContentLoaded", function() {
  // Asignar eventos de validación al botón "incluir"
  document.getElementById("action_modal").addEventListener("click", function(event) {
      event.preventDefault(); // Evita el envío del formulario para realizar las validaciones

      if (validarCedula() &&  validarRif() && validarNombre() && validarSegNombre() && validarApellido() && validarSegApellido() && validarTelefono() && validarCorreo() && validarCodigoHistoria() && validarTipoSangre() && validarFechaNacimiento() && validarFechaIngreso() && validarpostal()) {
          alert("Formulario validado correctamente");
      } else {
      }
  });
});

// Función para validar la cédula
function validarCedula() {
  const cedula = document.getElementById("ced_afiliado").value;
  const regex = /^[0-9]{7,8}$/;
  if (!regex.test(cedula)) {
      alert("La cédula debe tener entre 7 y 8 dígitos numéricos");
      return false;
  }
  return true;
}

// Función para validar la rif
function validarRif() {
  const rif = document.getElementById("rif_institucion").value;
  const regex = /^[0-9]{5,10}$/;
  if (!regex.test(rif)) {
      alert("El rif debe tener entre 5 y 10 dígitos numéricos");
      return false;
  }
  return true;
}

// Función para validar el nombre
function validarNombre() {
  const nombre = document.getElementById("nombre").value;
  const regex = /^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]{3,12}$/;
  if (!regex.test(nombre)) {
      alert("El nombre debe contener solo letras y espacios, entre 3 y 12 caracteres");
      return false;
  }
  return true;
}

// Función para validar el segundo nombre
function validarSegNombre() {
  const SegNombre = document.getElementById("segundo_nombre").value;
  const regex = /^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]{3,12}$/;
  if (!regex.test(SegNombre)) {
      alert("El segundo nombre debe contener solo letras y espacios, entre 3 y 12 caracteres");
      return false;
  }
  return true;
}

// Función para validar el apellido
function validarApellido() {
  const apellido = document.getElementById("apellido").value;
  const regex = /^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]{3,12}$/;
  if (!regex.test(apellido)) {
      alert("El apellido debe contener solo letras y espacios, entre 3 y 12 caracteres");
      return false;
  }
  return true;
}

// Función para validar el segundo apellido
function validarSegApellido() {
  const Segapellido = document.getElementById("segundo_apellido").value;
  const regex = /^[A-Za-z\s\u00f1\u00d1\u00E0-\u00FC]{3,12}$/;
  if (!regex.test(Segapellido)) {
      alert("El segundo apellido debe contener solo letras y espacios, entre 3 y 12 caracteres");
      return false;
  }
  return true;
}

// Función para validar el teléfono
function validarTelefono() {
  const telefono = document.getElementById("telefono").value;
  const regex = /^[0-9]{11}$/; // Asume que el teléfono tiene entre 10 dígitos
  if (!regex.test(telefono)) {
      alert("El teléfono debe contener solo dígitos y tener 10 caracteres");
      return false;
  }
  return true;
}

// Función para validar postal
function validarpostal() {
  const postal = document.getElementById("postal").value;
  const regex = /^[0-9]{3,7}$/; // Asume que el codigo postal tiene cinco caracteres
  if (!regex.test(postal)) {
      alert("Codigo postal no valido");
      return false;
  }
  return true;
}

// Función para validar el correo electrónico
function validarCorreo() {
  const correo = document.getElementById("correo").value;
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Validación básica de email
  if (!regex.test(correo)) {
      alert("El correo electrónico no es válido");
      return false;
  }
  return true;
}

// Función para validar el código de historia
function validarCodigoHistoria() {
  const codigoHistoria = document.getElementById("n_historia").value;
  const regex = /^[A-Za-z0-9-]{1,20}$/; // Ejemplo de código alfanumérico con guiones
  if (!regex.test(codigoHistoria)) {
      alert("El código de historia debe tener entre 5 y 20 caracteres alfanuméricos");
      return false;
  }
  return true;
}

// Función para validar el tipo de sangre
function validarTipoSangre() {
  const tipoSangre = document.getElementById("tipo_sangre").value;
  const regex = /^(A|B|AB|O)[+-]$/; // Acepta tipos de sangre como A+, O-, etc.
  if (!regex.test(tipoSangre)) {
      alert("El tipo de sangre debe ser A+, A-, B+, B-, AB+, AB-, O+ o O-");
      return false;
  }
  return true;
}

// Función para validar la fecha de nacimiento
function validarFechaNacimiento() {
  const fechaNacimiento = document.getElementById("fecha_nacimiento").value;
  if (!fechaNacimiento) {
      alert("La fecha de nacimiento es obligatoria");
      return false;
  }
  return true;
}

// Función para validar la fecha de ingreso
function validarFechaIngreso() {
  const fechaIng = document.getElementById("fecha_ingreso").value;
  if (!fechaIng) {
      alert("La fecha de ingreso es obligatoria");
      return false;
  }
  return true;
}

function cerrarFormulario() {
  // Si el formulario está en un modal de Bootstrap
  const modal = document.getElementById("modal");
  if (modal) {
    modal.style.display = "none"; // O usa `classList.remove("show")` si tienes una clase de visibilidad
  }
}
