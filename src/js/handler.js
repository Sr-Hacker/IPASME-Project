let action_modal = document.getElementById("action_modal")
action_modal.addEventListener('click', function(e){
  e.preventDefault()
  console.log("??", e)
  let action = action_modal.textContent;
  console.log("🚀 ~ action_modal.addEventListener ~ action:", action)

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
