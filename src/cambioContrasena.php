<?php
require '../vendor/autoload.php';

use Clases\Usuario;

session_start();

/* Función para el cambio de contraseña de los usuarios */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_SESSION['userName'];
    $newPassword = trim($_POST['newPassword']);
    $confirmPassword = trim($_POST['confirmPassword']);

    if ($newPassword !== $confirmPassword) {
        echo "<script>
                alert('Las contraseñas no coinciden. Por favor, inténtelo de nuevo.');
                window.location.href = '../public/perfil.php';
              </script>";
    } else {
        $usuario = new Usuario();
        $usuarioId = $usuario->obtenerIdUsuario($userName);

        if ($usuarioId !== false) {
            $cambioExitoso = $usuario->cambiarContrasena($usuarioId, $newPassword);

            if ($cambioExitoso) {
                echo "<script>
                        alert('Contraseña cambiada exitosamente.');
                        window.location.href = '../public/perfil.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Hubo un problema al cambiar la contraseña. Por favor, inténtelo de nuevo.');
                        window.location.href = '../public/perfil.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('No se pudo obtener el ID del usuario. Por favor, inténtelo de nuevo.');
                    window.location.href = '../public/perfil.php';
                  </script>";
        }
    }
}
