// Función para agregar un nuevo campo de ingrediente al formulario
function agregarIngrediente() {
    var ingredienteDiv = document.createElement('div');
    ingredienteDiv.classList.add('ingrediente');

    var nombreInput = document.createElement('input');
    nombreInput.type = 'text';
    nombreInput.name = 'ingrediente_nombre[]';
    nombreInput.required = true;
    var nombreLabel = document.createElement('label');
    nombreLabel.textContent = 'Nombre del Ingrediente:';
    nombreLabel.appendChild(nombreInput);

    var cantidadInput = document.createElement('input');
    cantidadInput.type = 'number';
    cantidadInput.name = 'cantidad_ingrediente[]';
    cantidadInput.required = true;
    var cantidadLabel = document.createElement('label');
    cantidadLabel.textContent = 'Cantidad:';
    cantidadLabel.appendChild(cantidadInput);

    var medidaInput = document.createElement('input');
    medidaInput.type = 'text';
    medidaInput.name = 'medida_ingrediente[]';
    medidaInput.required = true;
    var medidaLabel = document.createElement('label');
    medidaLabel.textContent = 'Medida:';
    medidaLabel.appendChild(medidaInput);

    var button = document.createElement('button');
    button.type = 'button';
    button.textContent = 'Eliminar ingrediente';
    button.onclick = function() {
        ingredienteDiv.parentNode.removeChild(ingredienteDiv);
    };

    ingredienteDiv.appendChild(nombreLabel);
    ingredienteDiv.appendChild(cantidadLabel);
    ingredienteDiv.appendChild(medidaLabel);
    ingredienteDiv.appendChild(button);

    document.getElementById('ingredientes').appendChild(ingredienteDiv);
}

// Función para agregar un nuevo paso en el formulario
function agregarPaso() {
    var pasoDiv = document.createElement('div');
    pasoDiv.classList.add('paso');

    var descripcionTextarea = document.createElement('textarea');
    descripcionTextarea.name = 'paso_descripcion[]';
    descripcionTextarea.required = true;
    var descripcionLabel = document.createElement('label');
    descripcionLabel.textContent = 'Descripción de los pasos a seguir:';
    descripcionLabel.appendChild(descripcionTextarea);

    var button = document.createElement('button');
    button.type = 'button';
    button.textContent = 'Eliminar paso';
    button.onclick = function() {
        pasoDiv.parentNode.removeChild(pasoDiv);
    };

    pasoDiv.appendChild(descripcionLabel);
    pasoDiv.appendChild(button);

    document.getElementById('pasos').appendChild(pasoDiv);
}
