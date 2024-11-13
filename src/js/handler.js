let action_modal = document.getElementById("action_modal")
action_modal.addEventListener('click', function(e){
  e.preventDefault();
  let action = action_modal.textContent;

  let object = {
    'incluir': function() {
      _include();
    },
    'eliminar': function() {
      _delete();
    },
    'modificar': function() {
      _edit();
    },
  };
  if (object[action] && typeof object[action] === 'function') {
    object[action]();
  } else {
    console.log('Opción no válida');
  }
});
