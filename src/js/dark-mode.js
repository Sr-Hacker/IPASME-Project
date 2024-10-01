const btnmode = document.querySelector('.dark-mode');

btnmode.addEventListener('click', () =>{
  document.body.classList.toggle('dark-mode-variables');
  btnmode.querySelector('span:nth-child(1)').classList.toggle('active');
  btnmode.querySelector('span:nth-child(2)').classList.toggle('active');
})
