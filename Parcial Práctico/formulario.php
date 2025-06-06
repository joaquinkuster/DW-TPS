<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre  = isset($_POST['nombre'])  ? trim($_POST['nombre'])  : '';
  $email   = isset($_POST['email'])   ? trim($_POST['email'])   : '';
  $asunto  = isset($_POST['asunto'])  ? trim($_POST['asunto'])  : '';
  $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

  $errores = [];

  if ($nombre === '') {
    $errores[] = 'Nombre obligatorio.';
  }
  if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = 'Email inválido.';
  }
  if ($asunto === '') {
    $errores[] = 'Asunto obligatorio.';
  }
  if (strlen($mensaje) < 10) {
    $errores[] = 'Mensaje mínimo 10 caracteres.';
  }

  if (!empty($errores)) {
    echo '<div style="color:red;">';
    foreach ($errores as $e) {
      echo "<p>$e</p>";
    }
    echo '</div>';
    exit;
  }

  echo '<div style="color:green;">';
  echo "¡Gracias, $nombre! Recibimos tu mensaje sobre \"$asunto\".";
  echo '</div>';
  exit;
}

echo '<div style="color:red;">Acceso inválido.</div>';
?>
