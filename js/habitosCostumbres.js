function mostrarDescripcion(idenf) {
    var descripcionInput = document.getElementById('descripcion_' + idenf);
    var checkbox = document.querySelector('input[value="' + idenf + '"]');
    
    if (checkbox.checked) {
        descripcionInput.style.display = 'block';
    } else {
        descripcionInput.style.display = 'none';
    }
}
