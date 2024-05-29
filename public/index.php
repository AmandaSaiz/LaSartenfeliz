<!DOCTYPE html>
<html lang="en">
<?php
require '../vendor/autoload.php';
include '../src/breadcrumbs.php';
include '../src/header.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../views/index.css?v=1.3">
    <title>La Sartén Feliz</title>
</head>

<body>
    <main>
        <!-- Mensaje de bienvenida -->
        <div class="welcome-message">
            <div class="message">
                <h2>¡Bienvenidos a La Sartén Feliz!</h2>

                <p>Mi nombre es Amanda y les doy la bienvenida a mi pequeño rincón culinario en la web.</p>
                <br>
                <p>Aquí encontrarás una colección de recetas deliciosas y fáciles de seguir, inspiradas en
                    mi amor por la cocina casera y la exploración de nuevos sabores. Espero que encuentres
                    tanto placer en preparar estas recetas como yo en compartirlas contigo.</p>
                <br>
                <p>¡Así que toma un delantal, precalienta el horno y prepárate para disfrutar de una aventura culinaria
                    llena de sabor y creatividad en La Sartén Feliz!</p>
            </div>
            <img src="../recursos/bienvenido.png" alt="Imagen de bienvenida">
        </div>

        <!-- Categorías de recetas -->
        <div class="recipe-categories-container">
            <h2>A continuación puedes explorar algunas de nuestras categorías de recetas.</h2>
            <div class="recipe-categories">
                <div class="category">
                    <a href="construccion.php"><img src="../recursos/entrantes.png" alt="Entrantes"></a>
                    <a href="construccion.php">Entrantes</a>
                </div>
                <div class="category">
                    <a href="construccion.php"><img src="../recursos/plato-principal.png" alt="Platos Principales"></a>
                    <a href="construccion.php">Platos Principales</a>
                </div>
                <div class="category">
                    <a href="construccion.php"><img src="../recursos/postres.png" alt="Postres"></a>
                    <a href="construccion.php">Postres</a>
                </div>
                <div class="category">
                    <a href="construccion.php"><img src="../recursos/coctel.png" alt="Coctelería"></a>
                    <a href="construccion.php">Coctelería</a>
                </div>
            </div>
        </div>

        <!-- Receta más popular -->
        <div class="popular-recipe">
            <h2>Aquí puedes ver la receta más popular de nuestra página.</h2>
            <p>En construcción...</p>
        </div>
    </main>
</body>

<?php
include '../src/footer.php';
?>

</html>