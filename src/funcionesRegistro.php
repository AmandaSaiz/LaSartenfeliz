<?php
require '../vendor/autoload.php'; 

use Clases\Usuario;

/** Función para la obtención de los datos de usuario del formulario y la realización del registro */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['userName']);
    $email = trim($_POST['userEmail']);
    $contrasena = trim($_POST['userPassword']);
    $usuario = new Usuario();

    $registroExitoso = $usuario->registrarUsuario($nombre, $email, $contrasena);
    
    if ($registroExitoso) {
        echo "<script>
                alert('Te registraste correctamente, inicia sesión para aprovechar las ventajas.');
                window.location.href = '../public/login.html';
              </script>";
    } else {
        echo "<script>
                alert('El usuario o correo electrónico ya están registrados. Por favor, intenta con otros datos.');
                window.location.href = '../public/login.html';
              </script>";
    }
}
?>

