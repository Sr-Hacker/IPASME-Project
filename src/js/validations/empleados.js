const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const cerrarModal = () => {document.getElementById('modal').style.display="none";}/*para darle la funcion al boton de cancelar para cerrar el formulario*/

/*expresiones regulares dentro de un objeto*/
const expresiones = {
	cedula : /^(E|V)?(\d{7,9})$/,
	dos_nombres : /^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)?$/,
	telefono : /^(0416|0426|0251|0252|0424|0414|0412)(\s|-)?(\d{7})$/,
	contraseña: /[a-zA-Z\d\*\.\$\&\%\+]{8,15}/
}

/*este objeto lo creo para que de esa manera poder determinar si el formulario se envia al
rellenar cada uno de los inputs y si estos reultan correctos cada campo cambiará de false a true
dejando que entonces este sea enviado*/
const campos = {
    ced_empleado: false,
	nombres: false,
	apellidos: false,
	telefono_celular: false,
	password: false,
	password2: false
}

/*Esta funcion es la que se va a encargar de validar cada uno de los imput dependiendo
del name que estos tengan*/
const validarFormulario = (e) => {
	switch (e.target.name) {
		case "ced_empleado":
			validarCampo(expresiones.cedula, e.target, 'ced_empleado');
		break;
		case "nombres":
			validarCampo(expresiones.dos_nombres, e.target, 'nombres');
		break;
		case "apellidos":
			validarCampo(expresiones.dos_nombres, e.target, 'apellidos');
		break;
		case "telefono_celular":
			validarCampo(expresiones.telefono, e.target, 'telefono_celular');
		break;
		case "password":
			validarCampo(expresiones.contraseña, e.target, 'password');
			validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;
	}
}


/*Con esta funcion quitamos y removemos las clases de error y correcto de nuestros imput dandoloes asi
el color rojo o verde depndiendo de si los datos coinciden con las expresiones regulares o no*/
const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value) ){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto'); /*Quita el color rojo del imput*/
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto'); /*le agg el color azul*/
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle'); /*Le agg el icono de check verde*/
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');/*le remueve el icono de cruz rojo*/
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo'); /*oculta el parrafo de indicaciones del error*/
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');/*Agg el color rojo al borde del input*/
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto'); /*quita el color verde del borde*/
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle'); /*Agg el icono rojo de cruz*/
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle'); /*y quita el verde de check*/
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo'); /*muestra el parrafo de indicaciones del error*/
		campos[campo] = false;
	}
}

/*Esta funcion es para cambiar los estilos del imput de la constraseña 2 para validar
si es igual a la primera, para que si no marque un error y cambie de colores el imput*/
const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password2'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password2'] = true;
	}
}

inputs.forEach((input) => { /*Esta función me ejecuta el código cada vez que hago un clic en algún input */
	input.addEventListener('keyup', validarFormulario); /*el "keyup" me ejecuta la funcion que le presede cada vez que preioso y suelto una tecla*/
	input.addEventListener('blur', validarFormulario); /*el blur es casi igual que el keyup solo que el ejecuta la función cuando se presiona fuera del input*/
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault(); //para prevenir el envio de datos por default

	if(campos.ced_empleado && campos.nombres && campos.apellidos && campos.telefono_celular && campos.password && campos.password2){
		formulario.reset(); /*Esto lo que hace es reiniciarmen todos los elementos del formulario si todos los campos están bien */

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo'); /*para mostrar el msj de exito luego de enviar el formulario*/
		setTimeout(() => { /*esto me quita el mensaje de exito luego de 5 segundos*/
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo'); 
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
		alert("Formulario enviado exitosamente!!!"); /*Mensaje de exito para el usuario*/
		location.reload();/*reinicia la pagina despues de enviar el formulario correctamente*/
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		setTimeout(() => { /*esto me quita el mensaje de error del formulario luego de 2 segundos*/
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo'); 
		}, 2000);
	}
	
});
