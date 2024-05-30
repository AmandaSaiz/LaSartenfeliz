<?php

use Clases\Usuario;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['userName'];
    $contrasena = $_POST['userPassword'];

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
                window.location.href = 'login.php';
              </script>";
    }
}
?>
