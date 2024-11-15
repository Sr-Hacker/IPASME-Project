let include  = document.getElementById("include")
include.addEventListener("click", function (e) {
  let modal = document.getElementById("modal")
  modal.style.display = "block";
  modal.style.visibility = 'visible';
  modal.style.opacity = '1';
  let action_modal = document.getElementById("action_modal")
  action_modal.textContent = "incluir";
});

function editModal(e, callback){
  callback(e);
  let modal = document.getElementById("modal")
  modal.style.display = "block";
  modal.style.visibility = 'visible';
  modal.style.opacity = '1';
  let action_modal = document.getElementById("action_modal")
  action_modal.textContent = "modificar";
}

function deleteModal(e, callback){
  callback(e);
  let modal = document.getElementById("modal")
  modal.style.display = "block";
  modal.style.visibility = 'visible';
  modal.style.opacity = '1';
  let action_modal = document.getElementById("action_modal")
  action_modal.textContent = "eliminar";
}

let closeModal = document.getElementById("closeModal")
closeModal.addEventListener("click", function (e) {
  e.preventDefault();
  let modal =  document.getElementById("modal")
  limpia()
  modal.style.visibility = "hidden";
  modal.style.opacity = "0"
});
