let include  = document.getElementById("include")
include.addEventListener("click", function () {
  let modal = document.getElementById("modal")
  modal.style.visibility = 'visible';
  modal.style.opacity = '1';
  let action_modal = document.getElementById("action_modal")
  action_modal.textContent = "incluir";
});

function editModal(e, callback){
  callback(e);
  let modal = document.getElementById("modal")
  modal.style.display = "block";
  let action_modal = document.getElementById("action_modal")
  action_modal.textContent = "Modificar";
  console.log(
    'modal'
  )
  modal.style.visibility = 'visible';
  modal.style.opacity = '1';
}

function deleteModal(e, callback){
  callback(e);
  let modal = document.getElementById("modal")
  modal.style.display = "block";
  let action_modal = document.getElementById("action_modal")
  action_modal.textContent = "eliminar";
}

let closeModal = document.getElementById("closeModal")
closeModal.addEventListener("click", function () {
  let modal =  document.getElementById("modal")
  console.log("limpiar??")
  limpia()
  modal.style.visibility = "hidden";
  modal.style.opacity = "0"
});
