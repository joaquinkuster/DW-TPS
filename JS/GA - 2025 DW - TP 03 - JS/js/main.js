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

    // Función para generar un mensaje sobre un asunto
    function generarMensaje(nombre, asunto) {
        return `Gracias ${nombre} por contactarnos sobre ${asunto}. Te responderemos pronto.`;
    }

    // Probamos las funciones
    console.log(validarEmail('usuario@example.com')); // true
    console.log(validarEmail('invalido.com')); // false

    console.log(calcularDescuento(100, 10));  // 90
    console.log(calcularDescuento(250, 20));  // 200
    console.log(calcularDescuento(80, 5));    // 76

    console.log(generarMensaje('Ana', 'Soporte'));

    // Manejar envío de formulario
    const contactoForm = document.getElementById('contactoForm');
    contactoForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const nombre = document.getElementById('nombre').value;
        const email = document.getElementById('email').value;
        const asunto = document.getElementById('asunto').options[document.getElementById('asunto').selectedIndex].text;
        if (!validarEmail(email)) {
            alert('Por favor ingresa un correo válido.');
            return;
        }
        alert(generarMensaje(nombre, asunto));
        //contactoForm.reset();
    });

    // Contador de caracteres
    const textoContar = document.getElementById('textoContar');
    const contador = document.getElementById('contador');
    textoContar.addEventListener('input', () => {
        const longitud = textoContar.value.length;
        contador.textContent = `${longitud} caracteres`;
    });

    // Cambiar estilo de caja
    const miCaja = document.getElementById('miCaja');
    miCaja.addEventListener('mouseover', () => {
        miCaja.style.backgroundColor = 'blue';
    });
    miCaja.addEventListener('mouseout', () => {
        miCaja.style.backgroundColor = 'lightgray';
    });
});