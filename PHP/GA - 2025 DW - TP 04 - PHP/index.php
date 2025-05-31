<?php
// Validar que el formulario se envió por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Recoger y sanitizar datos
  $nombre  = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
  $email   = isset($_POST['email'])  ? trim($_POST['email'])  : '';
  $asunto  = isset($_POST['asunto']) ? trim($_POST['asunto']) : '';
  $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

  $errors = [];

  // Validaciones
  if ($nombre === '') {
    $errors[] = "El nombre es obligatorio.";
  }
  if ($email === '') {
    $errors[] = "El correo electrónico es obligatorio.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "El correo electrónico no es válido.";
  }
  if ($mensaje === '') {
    $errors[] = "El mensaje es obligatorio.";
  }

  if (count($errors) > 0) {
    // Mostrar errores simples (puedes adaptar esto a tu UI)
    foreach ($errors as $error) {
      echo "<p style='color:red;'>$error</p>";
    }
  } else {
    // Todo validado correctamente: crear mensaje y mostrar alerta en JS
    $alertMsg = "Gracias {$nombre} por contactarnos sobre {$asunto}. Te responderemos pronto.";
    echo "<script type='text/javascript'>
                alert(" . json_encode($alertMsg, JSON_UNESCAPED_UNICODE) . ");
              </script>";
    // Aquí podrías continuar con el envío de correo, guardado en BBDD, etc.
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Metadatos básicos -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta
    name="description"
    content="Café Aromas - El mejor café artesanal del pueblo" />
  <title>Café Aromas - Cafetería Artesanal</title>

  <!-- Vincular hoja de estilos externa -->
  <link rel="stylesheet" href="css/estilos.css" />
</head>

<body>
  <!-- Header con logo y título principal -->
  <header>
    <img src="img/logo.png" alt="Logo Café Aromas" />
    <div>
      <h1>Café Aromas</h1>
      <p>Café artesanal con alma</p>
    </div>
  </header>

  <!-- Barra de navegación con enlaces internos -->
  <nav>
    <a href="#inicio">Inicio</a>
    <a href="#menu">Menú</a>
    <a href="#blog">Blog</a>
    <a href="#contacto">Contacto</a>
    <a href="https://es.wikipedia.org/wiki/Caf%C3%A9" target="_blank">Sobre el café</a>
  </nav>

  <!-- Contenedor principal -->
  <div class="contenedor-principal">
    <!-- Contenido principal -->
    <main class="contenido-principal">
      <!-- Artículo destacado sobre nosotros -->
      <section id="nosotros" class="seccion">
        <article>
          <h2>Bienvenidos a Café Aromas</h2>
          <p>
            En Café Aromas, creemos que preparar café es una forma de arte.
            Desde la selección de los granos hasta el servicio final, cada
            paso es crucial para crear la taza perfecta.
          </p>
          <p>
            Nuestros baristas están entrenados en las técnicas más modernas,
            pero también respetamos las tradiciones centenarias de preparación
            de café. Cada bebida que servimos es una expresión de nuestro
            compromiso con la calidad.
          </p>
          <p>
            ¿Sabías que la temperatura del agua afecta significativamente la
            extracción de sabores? Utilizamos termómetros digitales para
            asegurar que cada taza esté perfectamente preparada.
          </p>
          <div class="mt-20 mb-20">
            <img
              src="https://cdn.pixabay.com/photo/2016/08/07/16/23/coffee-1576537_1280.jpg"
              alt="Café artesanal"
              class="img-responsive" />
          </div>
        </article>
      </section>

      <!-- Sección del menú -->
      <section id="menu" class="seccion">
        <h2>Nuestro Menú</h2>
        <table>
          <thead>
            <tr>
              <th>Producto</th>
              <th>Descripción</th>
              <th>Precio</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Espresso</td>
              <td>Café concentrado con crema dorada</td>
              <td>$120</td>
            </tr>
            <tr>
              <td>Cappuccino</td>
              <td>Espresso con leche vaporizada y espuma</td>
              <td>$150</td>
            </tr>
            <tr>
              <td>Latte</td>
              <td>Espresso con más leche y poca espuma</td>
              <td>$160</td>
            </tr>
          </tbody>
        </table>

        <!-- Lista de especialidades -->
        <h3>Nuestras especialidades</h3>
        <ul class="especialidades">
          <li>Café de origen único (selección rotativa)</li>
          <li>Cold brew artesanal</li>
          <li>Matcha latte premium</li>
          <li>Chai latte especiado</li>
          <li>Postres caseros diarios</li>
        </ul>
      </section>

      <!-- Sección sobre el café -->
      <section id="arte-del-cafe" class="seccion">
        <h2>El Arte del Café: Nuestra Pasión</h2>
        <p>
          Somos una cafetería artesanal dedicada a ofrecer la mejor
          experiencia de café en la ciudad. Nuestros granos son seleccionados
          cuidadosamente y tostados localmente para garantizar frescura y
          calidad.
        </p>
        <div class="mt-20 mb-20">
          <img
            src="https://cdn.pixabay.com/photo/2021/01/08/06/32/cafe-5899078_1280.jpg"
            alt="Sucursal Café Aromas"
            class="img-responsive" />
        </div>
      </section>

      <!-- Formulario de contacto -->
      <section id="formulario" class="seccion">
        <h2>Formulario de contacto</h2>
        <form id="contactoForm" action="index.php" method="post">
          <div class="mb-20">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required />
          </div>
          <div class="mb-20">
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required />
          </div>
          <div class="mb-20">
            <label for="asunto">Asunto:</label>
            <select id="asunto" name="asunto">
              <option value="soporte">Soporte</option>
              <option value="ventas">Ventas</option>
              <option value="otros">Otros</option>
            </select>
          </div>
          <div class="mb-20">
            <label for="mensaje">Mensaje:</label>
            <textarea
              id="mensaje"
              name="mensaje"
              rows="4"
              required></textarea>
            <p id="contador">0 caracteres</p>
          </div>
          <button type="submit" class="btn-submit">Enviar</button>
        </form>
      </section>

      <!-- Caja interactiva -->
      <section id="caja-interactiva" class="seccion">
        <h2>Desliza el cursor sobre la caja!</h2>
        <div class="caja" id="miCaja"></div>
      </section>
    </main>

    <!-- Barra lateral -->
    <aside id="horarios">
      <h3>Horario de atención</h3>
      <p><strong>Lunes a Viernes:</strong> 7:00 - 20:00</p>
      <p><strong>Sábados:</strong> 8:00 - 22:00</p>
      <p><strong>Domingos:</strong> 9:00 - 18:00</p>
    </aside>
  </div>

  <!-- Pie de página -->
  <footer id="pie">
    <h3>Contacto</h3>
    <p>Dirección: Calle Uquiza 123, Centro</p>
    <p>Teléfono: (555) 123-4567</p>
    <p>Email: info@cafearomas.com</p>
    <p>&copy; 2023 Café Aromas - Todos los derechos reservados</p>
    <p class="mt-20">
      <a href="#inicio" title="Volver al inicio">Volver al inicio ↑</a>
    </p>
  </footer>

  <!-- Vincular script externo -->
  <script src="js/main.js"></script>
</body>

</html>