<!DOCTYPE html>
<html lang="en">
<?php
require '../vendor/autoload.php';
include '../src/breadcrumbs.php';
include '../src/header.php';

use Clases\Receta;

$receta = new Receta();
$postres = $receta->getRecetasByCategoria('postre');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../views/listasCategoria.css?v=1.0">
    <title>La Sartén Feliz</title>
</head>

<body>
    <!-- Lista de recetas de Postres -->
    <main class="category-list">
        <h1 class="category-title">Postres</h1>
        <ul class="recipes">
            <?php foreach ($postres as $postre) : ?>
                <li class="recipe-item">
                    <a class="recipe-title" href="receta.php?id=<?= $postre['id'] ?>"><?= htmlspecialchars($postre['titulo']) ?></a>
                    <p class="recipe-description"><?= htmlspecialchars($postre['descripcion']) ?></p>
                    <p class="recipe-time">Tiempo de preparación: <?= $postre['duracion_preparacion'] ?> minutos</p>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>

</body>

<?php
include '../src/footer.php';
?>

</html>