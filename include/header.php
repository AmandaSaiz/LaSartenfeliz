<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Sartén Feliz</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
    <!-- Import de iconos -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../views/header.css">
</head>

<body>
    <!-- Encabezado -->
    <header>
        <!-- Parte superior del encabezado -->
        <div class="top-header-container">
            <!-- Menú desplegable -->
            <div class="menu-icon">
                <i class='bx bx-menu'></i>
                <nav class="dropdown-menu">
                    <ul>
                        <li><a href=""></a>Entrantes</li>
                        <li><a href=""></a>Platos principales</li>
                        <li><a href=""></a>Postres</li>
                        <li><a href=""></a>Cócteles</li>
                    </ul>
                </nav>
            </div>

            <!-- Barra de búsqueda -->
            <div class="search-bar">
                <input type="text" placeholder="Buscar...">
                <button><i class='bx bx-search'></i></button>
            </div>

            <!-- Icono de inicio de sesión -->
            <div class="login-icon">
                <a href="../public/login.html"><i class='bx bx-user'></i></a>
            </div>
        </div>

        <!-- Parte inferior del encabezado -->
        <div class="bottom-header-container">
            <div class="logo">
                <img src="../recursos/logo.png" alt="Logo de la Sartén Feliz">
            </div>
            <div class="page-title">
                <h1>La Sartén Feliz</h1>
            </div>
        </div>

        <!-- Ruta -->
        <div class="breadcrumbs">
            <?php if (function_exists('display_breadcrumbs')) display_breadcrumbs(); ?>
        </div>
        <br><br>
    </header>
</body>

</html>