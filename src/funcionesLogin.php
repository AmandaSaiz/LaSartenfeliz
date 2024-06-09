<?php
session_start();
require '../vendor/autoload.php'; 

use Clases\Usuario;

/** Funcion para la obtención de los datos del usuario de login y el inicio de sesión */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['userName']);
    $contrasena = trim($_POST['userPassword']);

    $usuario = new Usuario();
    $inicioSesionExitoso = $usuario->iniciarSesion($nombre, $contrasena);

    if ($inicioSesionExitoso) {
        echo "<script>
                alert('Inicio de sesión exitoso');
                window.location.href = '../public/index.php';
              </script>";
    } else {
        echo "<script>
                alert('El nombre de usuario o la contraseña son incorrectos. Por favor, inténtelo de nuevo.');
                window.location.href = '../public/login.html';
              </script>";
    }
}
?>
