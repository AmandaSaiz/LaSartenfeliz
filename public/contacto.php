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
        <section class="contact-form-container">
            <h2>Contacto</h2>
            <form action="#" method="post">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <div class="form-buttons">
                    <button type="submit">Enviar</button>
                    <button type="reset">Limpiar</button>
                </div>
            </form>
        </section>
    </main>

    <?php
    include '../src/footer.php';
    ?>
</body>

</html>