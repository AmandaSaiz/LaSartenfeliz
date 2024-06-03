<!DOCTYPE html>
<html lang="en">
<?php
require '../vendor/autoload.php';
include '../src/breadcrumbs.php';
include '../src/header.php';

use Clases\Receta;

if (!isset($_GET['id'])) {
    echo "<script>
            alert('Receta no especificada.');
            window.location.href = 'index.php';
          </script>";
    exit();
}

$id = intval($_GET['id']);
$receta = new Receta();
$detallesReceta = $receta->getRecetaById($id);
$ingredientes = $receta->getIngredientesByRecetaId($id);
$pasos = $receta->getPasosByRecetaId($id);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../views/receta.css?v=1.0">
    <title><?= htmlspecialchars($detallesReceta['titulo']) ?> - La Sartén Feliz</title>
</head>

<body>
<main class="recipe-details">
        <h1 class="recipe-title"><?= htmlspecialchars($detallesReceta['titulo']) ?></h1>
        <p class="recipe-description"><?= htmlspecialchars($detallesReceta['descripcion']) ?></p>
        <p class="recipe-time">Tiempo de preparación: <?= htmlspecialchars($detallesReceta['duracion_preparacion']) ?> minutos</p>
        
        <div class="recipe-columns">
            <div class="ingredients-column">
                <h2>Ingredientes</h2>
                <ul class="ingredients-list">
                    <?php foreach ($ingredientes as $ingrediente): ?>
                        <li><?= htmlspecialchars($ingrediente['nombre']) ?>: <?= htmlspecialchars($ingrediente['cantidad']) ?> <?= htmlspecialchars($ingrediente['medida']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="steps-column">
                <h2>Pasos</h2>
                <ol class="steps-list">
                    <?php foreach ($pasos as $paso): ?>
                        <li><?= htmlspecialchars($paso['descripcion']) ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </main>
</body>

<?php
include '../src/footer.php';
?>

</html>
