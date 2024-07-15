    // Selecciona todos los enlaces del sidebar
    const menuItems = document.querySelectorAll('.sidebar a');

    menuItems.forEach(item => {
      item.addEventListener('click', function(event) {
        // Remueve la clase 'active' de todos los enlaces
        menuItems.forEach(i => i.classList.remove('active'));
        // Añade la clase 'active' al enlace clicado
        this.classList.add('active');
        // Almacena el id del enlace clicado en localStorage
        localStorage.setItem('activeMenuItem', this.id);
      });
    });

    // Recupera el id del enlace activo desde localStorage
    const activeMenuItemId = localStorage.getItem('activeMenuItem');
    if (activeMenuItemId) {
      // Añade la clase 'active' al enlace correspondiente
      document.getElementById(activeMenuItemId).classList.add('active');
    }
