let include  = document.getElementById("include")
include.addEventListener("click", function () {
  let modal = document.getElementById("modal")
  modal.style.display = "block";
  let action_modal = document.getElementById("action_modal")
  action_modal.textContent = "incluir";
});

function editModal(){
  let modal = document.getElementById("modal")
  modal.style.display = "block";
  let action_modal = document.getElementById("action_modal")
  action_modal.textContent = "modificar";
}

function deleteModal(){
  let modal = document.getElementById("modal")
  modal.style.display = "block";
  let action_modal = document.getElementById("action_modal")
  action_modal.textContent = "eliminar";
}

let closeModal = document.getElementById("closeModal")
closeModal.addEventListener("click", function () {
  let modal =  document.getElementById("modal")
  modal.style.display = "none";
});
