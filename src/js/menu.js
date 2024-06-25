let toggle = document.getElementById('menu_active')
toggle.addEventListener('click', ()=>{
  let display = document.getElementById("display")
  if(display.style.display !== "flex"){
    display.style.display = "flex";
  }else{
    display.style.display = "none";
  }
})
