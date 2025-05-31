document.addEventListener('DOMContentLoaded', () => {
    // Función para validar un correo
    function validarEmail(email) {
        const regex = /.+@.+\..+/;
        return regex.test(email);
    }

    // Función para calcular un descuento
    function calcularDescuento(precio, porcentaje) {
        const descuento = precio * (porcentaje / 100);
        return precio - descuento;
    }

    // Probamos las funciones
    console.log(validarEmail('usuario@example.com')); // true
    console.log(validarEmail('invalido.com')); // false

    console.log(calcularDescuento(100, 10));  // 90
    console.log(calcularDescuento(250, 20));  // 200
    console.log(calcularDescuento(80, 5));    // 76

    // Envio de respuesta de la petición POST
    const respuesta = document.getElementById('respuesta').value;
    if (respuesta != "") {
        alert(respuesta);
    }

    // Contador de caracteres
    const textoContar = document.getElementById('mensaje');
    const contador = document.getElementById('contador');
    function actualizarContador() {
        const longitud = textoContar.value.length;
        contador.textContent = `${longitud} caracteres`;
    }
    textoContar.addEventListener('input', actualizarContador);
    actualizarContador(); // Ejecuta al inicio para mostrar el conteo inicial

    // Cambiar estilo de caja
    const miCaja = document.getElementById('miCaja');
    miCaja.addEventListener('mouseover', () => {
        miCaja.style.backgroundColor = 'blue';
    });
    miCaja.addEventListener('mouseout', () => {
        miCaja.style.backgroundColor = 'lightgray';
    });
});