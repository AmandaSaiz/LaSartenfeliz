<!DOCTYPE html>
<html lang="en">

<?php
require '../vendor/autoload.php';
include '../src/breadcrumbs.php';
include '../src/header.php';

use Clases\Receta;

$receta = new Receta();

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = $_GET['query'];
    $resultados = $receta->buscarRecetas($query);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../views/listasCategoria.css?v=1.2">
    <title>La Sartén Feliz</title>
</head>

<body>
    <!-- Lista de resultados de la barra de búsqueda -->
    <main class="search-results">
    <?php
        if (isset($resultados) && $resultados) {
            echo '<h1 class="category-title">Resultados de la búsqueda:</h1>';
            echo '<ul>';
            foreach ($resultados as $receta) {
                echo '<li class="recipe-item">';
                echo '<a class="recipe-title" href="receta.php?id=' . $receta['id'] . '">' . htmlspecialchars($receta['titulo']) . '</a>';
                echo '<p class="recipe-description">' . htmlspecialchars($receta['descripcion']) . '</p>';
                echo '<p class="recipe-time">Tiempo de preparación: ' . $receta['duracion_preparacion'] . ' minutos</p>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No se encontraron resultados.</p>';
        }
        ?>
    </main>

</body>

<?php
include '../src/footer.php';
?>

</html>