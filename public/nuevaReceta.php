<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../views/nuevaReceta.css?v=1.0">
    <title>La Sartén Feliz</title>
</head>

<body>
    <?php
    require '../vendor/autoload.php';
    include '../src/breadcrumbs.php';
    include '../src/header.php';
    ?>
    <main>
        <form action="creacionReceta.php" method="POST">
            <h1>Nueva Receta</h1>
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
                <select id="categoria" name="categoria" required>
                    <option value="entrantes">Entrantes</option>
                    <option value="plato principal">Plato Principal</option>
                    <option value="postre">Postre</option>
                    <option value="coctel">Coctel</option>
                </select>
            </div>
            <div id="ingredientes">
                <h2>Ingredientes</h2>
                <div class="ingrediente">
                    <label for="ingrediente_nombre[]">Nombre del Ingrediente:</label>
                    <input type="text" name="ingrediente_nombre[]" required>
                    <label for="cantidad_ingrediente[]">Cantidad:</label>
                    <input type="number" name="cantidad_ingrediente[]" required>
                    <label for="medida_ingrediente[]">Medida:</label>
                    <input type="text" name="medida_ingrediente[]" required>
                    <button type="button" onclick="agregarIngrediente()">Añadir ingrediente</button>
                </div>
            </div>
            <div id="pasos">
                <h2>Pasos</h2>
                <div class="paso">
                    <label for="paso_descripcion[]">Descripción de los pasos a seguir:</label>
                    <textarea name="paso_descripcion[]" required></textarea>
                    <button type="button" onclick="agregarPaso()">Añadir paso</button>
                </div>
            </div>
            <button type="submit">Guardar</button>
            <button type="reset">Limpiar</button>
        </form>
    </main>


    <?php
    include '../src/footer.php';
    ?>
</body>

</html>