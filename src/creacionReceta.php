<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    $_SESSION['message'] = ['type' => 'warning', 'text' => 'Debes iniciar sesión para crear una receta'];
}

require '../vendor/autoload.php';

use Clases\Receta;

$usuario_id = $_SESSION['usuario_id'];
$receta = new Receta();

try {
    // Obtención de los datos del formulario para la tabla Recetas
    if (!isset($_POST['titulo']) || !isset($_POST['duracion_preparacion']) || !isset($_POST['categoria'])) {
        throw new Exception('Faltan datos requeridos del formulario');
    }

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $duracion_preparacion = $_POST['duracion_preparacion'];
    $categoria = $_POST['categoria'];

    $receta_id = $receta->insertReceta($titulo, $descripcion, $duracion_preparacion, $categoria, $usuario_id);
    // Validación en la obtención de la id de la nueva receta
    if ($receta_id <= 0) {
        throw new Exception('Error al insertar la receta');
    }

    // Obtención de los datos del formulario de ingredientes
    if (isset($_POST['ingrediente_nombre']) && is_array($_POST['ingrediente_nombre'])) {
        $ingredientes_nombres = $_POST['ingrediente_nombre'];
        $cantidades = $_POST['cantidad_ingrediente'];
        $medidas = $_POST['medida_ingrediente'];

        foreach ($ingredientes_nombres as $index => $nombre_ingrediente) {
            if (empty($nombre_ingrediente) || empty($cantidades[$index]) || empty($medidas[$index])) {
                throw new Exception('Faltan datos de ingredientes');
            }

            $cantidad = $cantidades[$index];
            $medida = $medidas[$index];
            $receta->insertIngredienteReceta($receta_id, $nombre_ingrediente, $cantidad, $medida);

            // Validación de la insertción de la receta
            if ($result <= 0) {
                throw new Exception('Error al insertar ingrediente: ' . $nombre_ingrediente);
            }
        }
    }

    // Obtención de los datos del formulario de los pasos a seguir
    if (isset($_POST['paso_descripcion']) && is_array($_POST['paso_descripcion'])) {
        $pasos_descripcion = $_POST['paso_descripcion'];

        foreach ($pasos_descripcion as $orden => $descripcion) {
            if (empty($descripcion)) {
                throw new Exception('Falta la descripción de un paso');
            }

            $receta->insertPasoReceta($receta_id, $descripcion, $orden + 1);

            if ($result <= 0) {
                throw new Exception('Error al insertar paso en orden: ' . ($orden + 1));
            }
        }
    }

    $_SESSION['message'] = ['type' => 'success', 'text' => 'Receta creada con éxito'];
    header("Location: ../views/recetaCreada.php");
    exit();
} catch (Exception $e) {
    $_SESSION['message'] = ['type' => 'error', 'text' => 'Error al crear la receta: ' . $e->getMessage()];
    echo 'Error: ' . $e->getMessage();
    exit();
}
