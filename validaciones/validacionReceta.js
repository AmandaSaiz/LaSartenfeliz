document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        clearErrors();

        const titulo = document.getElementById('titulo').value;
        const duracionPreparacion = document.getElementById('duracion_preparacion').value;
        const categoria = document.getElementById('categoria').value;
        const ingredientesNombres = document.querySelectorAll('input[name="ingrediente_nombre[]"]');
        const cantidades = document.querySelectorAll('input[name="cantidad_ingrediente[]"]');
        const medidas = document.querySelectorAll('input[name="medida_ingrediente[]"]');
        const pasosDescripcion = document.querySelectorAll('textarea[name="paso_descripcion[]"]');

        let isValid = true;

        function showError(input, message) {
            const errorElement = document.createElement('div');
            errorElement.classList.add('alertaError');
            errorElement.textContent = message;

            input.classList.add('error');
            input.parentNode.appendChild(errorElement);
        }

        function clearErrors() {
            const errorElements = document.querySelectorAll('.alertaError');
            errorElements.forEach(element => element.remove());

            const inputs = document.querySelectorAll('form input, form textarea, form select');
            inputs.forEach(input => input.classList.remove('error'));
        }

        if (titulo === '') {
            isValid = false;
            showError(document.getElementById('titulo'), 'El título es obligatorio.');
        }

        if (duracionPreparacion === '' || isNaN(duracionPreparacion) || duracionPreparacion <= 0) {
            isValid = false;
            showError(document.getElementById('duracion_preparacion'), 'La duración de la preparación debe ser un número positivo.');
        }

        if (categoria === '') {
            isValid = false;
            showError(document.getElementById('categoria'), 'La categoría es obligatoria.');
        }

        ingredientesNombres.forEach((input, index) => {
            if (input.value.trim() === '') {
                isValid = false;
                showError(input, `El nombre del ingrediente ${index + 1} es obligatorio.`);
            }
        });

        cantidades.forEach((input, index) => {
            if (input.value.trim() === '' || isNaN(input.value) || input.value <= 0) {
                isValid = false;
                showError(input, `La cantidad del ingrediente ${index + 1} debe ser un número positivo.`);
            }
        });

        medidas.forEach((input, index) => {
            if (input.value.trim() === '') {
                isValid = false;
                showError(input, `La medida del ingrediente ${index + 1} es obligatoria.`);
            }
        });

        pasosDescripcion.forEach((textarea, index) => {
            if (textarea.value.trim() === '') {
                isValid = false;
                showError(textarea, `La descripción del paso ${index + 1} es obligatoria.`);
            }
        });

        if (!isValid) {
            event.preventDefault();
        }
    });
});
