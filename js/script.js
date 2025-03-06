// Seleccionamos el área de usuario y el menú de usuario
const usuarioConectado = document.querySelector('.usuario-conectado');
const menuUsuario = document.getElementById('menu-usuario');

// Añadimos un evento de clic al área de usuario
usuarioConectado.addEventListener('click', function() {
    // Alternamos la visibilidad del menú de usuario
    menuUsuario.style.display = menuUsuario.style.display === 'block' ? 'none' : 'block';
});
