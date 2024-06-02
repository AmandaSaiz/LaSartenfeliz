<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import de Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <!-- Import de iconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../views/header.css?v=1.5">
    <title>La Sartén Feliz</title>

    <script src="../validaciones/validacionCierreSesion.js"></script>
</head>

<body>
    <header>
        <!-- Parte superior del encabezado -->
        <div class="top-header-container">
            <div class="menu-icon">
                <i class='bx bx-menu'></i>
                <nav class="dropdown-menu">
                    <ul>
                        <li><a href="construccion.php"></a>Entrantes</li>
                        <li><a href="construccion.php"></a>Platos principales</li>
                        <li><a href="construccion.php"></a>Postres</li>
                        <li><a href="construccion.php"></a>Cócteles</li>
                    </ul>
                </nav>
            </div>

            <div class="logo">
                <a href="index.php"><img src="../recursos/logo.png" alt="Logo de la Sartén Feliz"></a>
            </div>

            <div class="search-bar">
                <input type="text" placeholder="Buscar...">
                <button><i class='bx bx-search'></i></button>
            </div>

            <div class="login-icon">
                <?php
                if (isset($_SESSION['userName'])) {
                    echo '<div class="user-info">';
                    echo '<div class="user-name">';
                    echo '<span>' . htmlspecialchars($_SESSION['userName']) . '</span>';
                    echo '</div>';
                    echo '<div class="user-login">';
                    echo '<a href="perfil.php"><i class="bx bx-user"></i></a>';
                    echo '</div>';
                    echo '<div class="user-exit">';
                    echo '<a href="../src/cerrarSesion.php" onclick="return confirmarCierreSesion()"><i class="bx bx-log-out"></i></a>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<a href="login.html"><i class="bx bx-user"></i></a>';
                }
                ?>
            </div>
        </div>

        <!-- Parte inferior del encabezado -->
        <div class="bottom-header-container">
            <div class="page-title">
                <h1>La Sartén Feliz</h1>
            </div>
        </div>

        <!-- Ruta -->
        <div class="breadcrumbs">
            <?php
            require_once('../src/breadcrumbs.php');
            generateBreadcrumbs();
            ?>
        </div>
        <br><br>
    </header>
</body>

</html>