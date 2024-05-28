<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../views/contruccion.css?v=1.1">
    <title>La Sarten Feliz</title>
</head>

<body>
    <?php
    require '../vendor/autoload.php';
    include '../include/breadcrumbs.php';
    include '../include/header.php';
    ?>

    <main>
        <!-- Esta página se va a usar para todas aquellas que aun no tengan funcionalidad -->
        <div class="construction-container">
            <img src="../recursos/pagina_construccion.png" alt="Página en construcción">
            <div class="construction-message">
                <h1><i class="fas fa-exclamation-triangle"></i> Página en Construcción <i class="fas fa-exclamation-triangle"></i></h1>
                <p>¡Gracias por visitar La Sarten Feliz! Estamos trabajando arduamente para traerte nuevas y emocionantes funcionalidades.
                    Vuelve pronto para descubrir todas las novedades que estamos preparando.</p>
                <br>
                <p>Mientras tanto, si tienes alguna pregunta o necesitas asistencia, no dudes en <a href="contacto.php">contactarnos</a>, 
                o tambíen puedes volver a la <a href="../public/index.php">página de inicio</a>.</p>
            </div>
        </div>
    </main>

    <?php
    include '../include/footer.php';
    ?>
</body>

</html>
