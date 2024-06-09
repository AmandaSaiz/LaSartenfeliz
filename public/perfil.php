<!DOCTYPE html>
<html lang="en">
<?php
require '../vendor/autoload.php';
include '../src/breadcrumbs.php';
include '../src/header.php';

if (!isset($_SESSION['userName'])) {
    echo "<script>
            alert('No has iniciado sesión. Por favor, inicie sesión si desea acceder a su perfil de usuario.');
            window.location.href = 'login.html';
          </script>";
    exit();
}
//Obtención de los datos del usuario
$userName = htmlspecialchars($_SESSION['userName']);
$userEmail = htmlspecialchars($_SESSION['userEmail']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../views/perfil.css?v=1.3">
    <title>La Sartén Feliz</title>
    
    <script src="../validaciones/validacionCierreSesion.js"></script>
</head>

<body>
    <main>
        <!-- Información del usuario que ha iniciado sesión -->
        <div class="profile-container">
            <form class="profile-form" action="../src/cambioContrasena.php" method="post">
                <h1>Perfil de Usuario</h1>
                <div>
                    <label>Nombre de Usuario:</label>
                    <input type="text" name="userName" value="<?php echo $userName; ?>" readonly>
                </div>

                <div>
                    <label>Correo Electrónico:</label>
                    <input type="email" name="userEmail" value="<?php echo $userEmail; ?>" readonly>
                </div>

                <div>
                    <label>Contraseña:</label>
                    <input type="password" name="userPassword" value="********" readonly>
                </div>

                <div>
                    <label>Nueva Contraseña:</label>
                    <input type="password" name="newPassword" placeholder="Nueva Contraseña" required>
                </div>

                <div>
                    <label>Confirmar Nueva Contraseña:</label>
                    <input type="password" name="confirmPassword" placeholder="Confirmar Nueva Contraseña" required>
                </div>

                <button type="submit" value="Cambiar Contraseña">Cambiar Contraseña</button>
            </form>

            <form class="exit-form" action="../src/cerrarSesion.php" method="post" onsubmit="return confirmarCierreSesion()">
                <button type="submit" value="Cerrar Sesión">Cerrar Sesión</button>
            </form>
        </div>
    </main>
</body>

<?php
include '../src/footer.php';
?>

</html>