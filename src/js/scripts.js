// Selecciona todas las alertas de Bootstrap
const alertas = document.querySelectorAll('.alert');
alertas.forEach(alerta => {
    setTimeout(() => {
        // Usamos la clase de Bootstrap para cerrar suavemente
        const bsAlert = new bootstrap.Alert(alerta);
        bsAlert.close();
    }, 4000); // 4000ms = 4 segundos
});