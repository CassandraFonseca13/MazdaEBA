document.addEventListener("DOMContentLoaded", function () {
  // Selecciona el icono con el id 'iconoModificar'
  const iconoModificar = document.getElementById("iconoModificar");

  // Verifica que el icono exista antes de asignarle el evento
  if (iconoModificar) {
    // Añade el evento de clic
    iconoModificar.addEventListener("click", function () {
      console.log("Icono de modificar clicado."); // Esto es para verificar en la consola del navegador

      // Abre el modal (Bootstrap lo maneja con el data-bs-toggle)
      // Recarga la página después de un tiempo si es necesario
      setTimeout(function () {
        location.reload(); // Recarga la página actual
      }, 50); // Recarga en 500 ms (medio segundo)
    });
  } else {
    console.error("No se encontró el elemento con id 'iconoModificar'.");
  }


  

});
