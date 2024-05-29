<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../views/contacto.css?v=1.2">
    <title>La Sarten Feliz</title>
</head>

<body>
    <?php
    require '../vendor/autoload.php';
    include '../src/breadcrumbs.php';
    include '../src/header.php';
    ?>

<main>
        <h1>Añadir Nueva Receta</h1>
        <form action="creacionReceta.php" method="POST">
            <div>
                <label for="titulo">Título de la Receta:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"></textarea>
            </div>
            <div>
                <label for="duracion_preparacion">Duración de la Preparación (en minutos):</label>
                <input type="number" id="duracion_preparacion" name="duracion_preparacion" required>
            </div>
            <div>
                <label for="categoria">Categoría:</label>
                <input type="text" id="categoria" name="categoria" required>
            </div>
            <div>
                <label for="cantidad_ingrediente">Cantidad del Ingrediente Principal:</label>
                <input type="number" id="cantidad_ingrediente" name="cantidad_ingrediente" required>
            </div>
            <div>
                <label for="medida_ingrediente">Medida del Ingrediente Principal:</label>
                <input type="text" id="medida_ingrediente" name="medida_ingrediente" required>
            </div>
            <div id="ingredientes">
                <h2>Ingredientes</h2>
                <div class="ingrediente">
                    <label for="ingrediente_nombre[]">Nombre del Ingrediente:</label>
                    <input type="text" name="ingrediente_nombre[]" required>
                    <button type="button" onclick="agregarIngrediente()">Añadir otro ingrediente</button>
                </div>
            </div>
            <div id="pasos">
                <h2>Pasos</h2>
                <div class="paso">
                    <label for="paso_descripcion[]">Descripción del Paso:</label>
                    <textarea name="paso_descripcion[]" required></textarea>
                    <button type="button" onclick="agregarPaso()">Añadir otro paso</button>
                </div>
            </div>
            <button type="submit">Guardar Receta</button>
        </form>
    </main>

    <?php
    include '../src/footer.php';
    ?>
</body>

</html>