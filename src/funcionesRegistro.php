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
                setTimeout(() => {
                    window.location.href = '../public/index.php';
                }, 5000);
              </script>";
    } else {
        echo "<script>
                alert('Hubo un error en el registro. Por favor, intenta nuevamente.');
                setTimeout(() => {
                    window.location.href = 'registro.php';
                }, 5000);
              </script>";
    }
}
?>

