document.getElementById('mostrarFormulario').addEventListener('click', function() {
    var formulario = document.getElementById('formularioAgregar');
    var boton = document.getElementById('mostrarFormulario');

    if (formulario.style.display === 'none') {
      formulario.style.display = 'block';
      boton.innerText = 'Cerrar formulario';
    } else {
      formulario.style.display = 'none';
      boton.innerText = 'Agregar nuevo cantante';
    }
});