<?php
session_start();
require '../vendor/autoload.php';

use Clases\Receta;

$usuario_id = $_SESSION['usuario_id'];
$receta = new Receta();

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$duracion_preparacion = $_POST['duracion_preparacion'];
$categoria = $_POST['categoria'];

$receta_id = $receta->insertReceta($titulo, $descripcion, $duracion_preparacion, $categoria, $usuario_id);

if ($receta_id <= 0) {
    echo "<script>
            alert('Error al insertar la receta');
            window.location.href = '../public/nuevaReceta.php';
          </script>";
    exit();
}

if (isset($_POST['ingrediente_nombre']) && is_array($_POST['ingrediente_nombre'])) {
    $ingredientes_nombres = $_POST['ingrediente_nombre'];
    $cantidades = $_POST['cantidad_ingrediente'];
    $medidas = $_POST['medida_ingrediente'];

    foreach ($ingredientes_nombres as $index => $nombre_ingrediente) {
        $cantidad = $cantidades[$index];
        $medida = $medidas[$index];
        $receta->insertIngredienteReceta($receta_id, $nombre_ingrediente, $cantidad, $medida);
    }
}

if (isset($_POST['paso_descripcion']) && is_array($_POST['paso_descripcion'])) {
    $pasos_descripcion = $_POST['paso_descripcion'];

    foreach ($pasos_descripcion as $orden => $descripcion) {
        $receta->insertPasoReceta($receta_id, $descripcion, $orden + 1);
    }
}

echo "<script>
        alert('Receta creada con éxito');
        window.location.href = '../public/index.php';
      </script>";
exit();
?>
