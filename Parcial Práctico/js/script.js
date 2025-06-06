document.addEventListener('DOMContentLoaded', () => {
  // Menú móvil
  const btnMenu = document.getElementById('btn-menu');
  const menu = document.getElementById('menu');
  btnMenu.addEventListener('click', () => {
    menu.classList.toggle('show');
  });

  // Validación de formulario
  const form = document.getElementById('form-contacto');
  const nombre = document.getElementById('nombre');
  const email = document.getElementById('email');
  const asunto = document.getElementById('asunto');
  const mensaje = document.getElementById('mensaje');

  const errNombre = document.getElementById('error-nombre');
  const errEmail = document.getElementById('error-email');
  const errAsunto = document.getElementById('error-asunto');
  const errMensaje = document.getElementById('error-mensaje');

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    let errores = 0;

    errNombre.textContent = '';
    errEmail.textContent = '';
    errAsunto.textContent = '';
    errMensaje.textContent = '';

    if (nombre.value.trim() === '') {
      errNombre.textContent = 'Nombre obligatorio';
      errores++;
    }
    if (
      email.value.trim() === '' ||
      !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)
    ) {
      errEmail.textContent = 'Email inválido';
      errores++;
    }
    if (asunto.value.trim() === '') {
      errAsunto.textContent = 'Asunto obligatorio';
      errores++;
    }
    if (mensaje.value.trim().length < 10) {
      errMensaje.textContent = 'Mínimo 10 caracteres';
      errores++;
    }

    if (errores === 0) {
      const msg = `Gracias ${nombre.value.trim()} por contactarte por "${asunto.value.trim()}". Te responderemos pronto.`;
      console.log(msg);
      alert(msg);
      //document.getElementById('respuesta-php').textContent = msg;

      const datos = new FormData(form);
      fetch('formulario.php', {
        method: 'POST',
        body: datos
      })
        .then((r) => r.text())
        .then((texto) => {
          document.getElementById('respuesta-php').innerHTML = texto;
          form.reset();
        });
    }
  });

  // Descuento dinámico
  const btnCalc = document.getElementById('calcular');
  const inputDesc = document.getElementById('input-desc');
  const btnsDesc = document.querySelectorAll('.btn-desc');

  btnCalc.addEventListener('click', () => {
    const pct = parseFloat(inputDesc.value);
    if (isNaN(pct) || pct < 0 || pct > 100) return;
    btnsDesc.forEach((btn) => {
      const base = parseFloat(btn.getAttribute('data-precio'));
      const nuevo = base - (base * pct) / 100;
      const card = btn.closest('.precio-card');
      card.querySelector('.final').textContent = `$${nuevo.toLocaleString(
        'es-AR',
        { maximumFractionDigits: 0 }
      )}`;
    });
  });
});
