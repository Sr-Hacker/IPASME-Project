let include  = document.getElementById("include")
include.addEventListener("click", function () {
  let modal = document.getElementById("modal")
  modal.style.display = "block";
  let action_modal = document.getElementById("action_modal")
  action_modal.textContent = "incluir";
});

function editModal(e, callback){
  callback(e);
  let modal = document.getElementById("modal")
  modal.style.display = "block";
  let action_modal = document.getElementById("action_modal")
  action_modal.textContent = "modificar";
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
  limpia()
  modal.style.display = "none";
});
