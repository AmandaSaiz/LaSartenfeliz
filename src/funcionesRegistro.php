<?php

use Clases\Usuario;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['userName'];
    $email = $_POST['userEmail'];
    $contrasena = $_POST['userPassword'];
    $usuario = new Usuario();

    $registroExitoso = $usuario->registrarUsuario($nombre, $email, $contrasena);
    
    if ($registroExitoso) {
        echo "<script>
                alert('Te registraste correctamente');
                window.location.href = '../public/index.php';
              </script>";
    } else {
        echo "<script>
                alert('El usuario o correo electrónico ya están registrados. Por favor, intenta con otros datos.');
                window.location.href = 'registro.php';
              </script>";
    }
}
?>

