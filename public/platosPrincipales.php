<!DOCTYPE html>
<html lang="en">
<?php
require '../vendor/autoload.php';
include '../src/breadcrumbs.php';
include '../src/header.php';

use Clases\Receta;

$receta = new Receta();
$platosPrincipales = $receta->getRecetasByCategoria('plato principal');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../views/listasCategoria.css?v=1.0">
    <title>La Sartén Feliz</title>
</head>

<body>

    <main class="category-list">
        <h1 class="category-title">Platos principales</h1>
        <ul class="recipes">
            <?php foreach ($platosPrincipales as $platoPrincipal) : ?>
                <li class="recipe-item">
                    <a class="recipe-title" href="receta.php?id=<?= $platoPrincipal['id'] ?>"><?= htmlspecialchars($platoPrincipal['titulo']) ?></a>
                    <p class="recipe-description"><?= htmlspecialchars($platoPrincipal['descripcion']) ?></p>
                    <p class="recipe-time">Tiempo de preparación: <?= $platoPrincipal['duracion_preparacion'] ?> minutos</p>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>

</body>

<?php
include '../src/footer.php';
?>

</html>