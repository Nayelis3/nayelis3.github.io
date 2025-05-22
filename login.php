<?php
require_once("clases/Usuario.php");
require_once("usuarios_dummy.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"] ?? '';
    $contra = $_POST["contra"] ?? '';

    $usuarioValido = preg_match('/^[a-zA-Z0-9_]{4,20}$/', $usuario);
    $contraValida = preg_match('/^[a-zA-Z0-9_]{6,18}$/', $contra);

    if (!$usuarioValido || !$contraValida) {
        echo "<h2>Formato inválido en usuario o contraseña.</h2>";
        echo "<p>El usuario debe tener entre 4 y 20 caracteres alfanuméricos o guión bajo.</p>";
        echo "<p>La contraseña debe tener entre 6 y 18 caracteres alfanuméricos o guión bajo.</p>";
        echo '<a href="login.html">Volver al inicio de sesión</a>';
        exit;
    }

    $usuarioEncontrado = false;

    foreach ($usuarios as $u) {
        if ($u->usuario === $usuario && $u->contra === $contra) {
            $usuarioEncontrado = true;
            break;
        }
    }

    if ($usuarioEncontrado) {
        header("Location: index.html");
        exit;
    } else {
        echo "<h2>Usuario o contraseña incorrectos</h2>";
        echo '<a href="login.html">Volver al inicio de sesión</a>';
    }
} else {
    header("Location: login.html");
    exit;
}
?>
