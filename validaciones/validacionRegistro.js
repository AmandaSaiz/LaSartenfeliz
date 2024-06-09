/** Funciones para la validación de los datos del registro de nuevo usuario */
document.querySelector('.form-register').addEventListener('submit', function(event) {
  event.preventDefault();

  const nameRegExp = /^[a-zA-Z0-9\_\-]{4,16}$/;
  const emailRegExp = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
  const passRegExp = /^.{4,12}$/;

  const userName = document.querySelector('input[name="userName"]');
  const userEmail = document.querySelector('input[name="userEmail"]');
  const userPassword = document.querySelector('input[name="userPassword"]');

  let valid = true;
  clearErrors();

  if (!nameRegExp.test(userName.value.trim())) {
      showError(userName, 'El nombre de usuario debe tener entre 4 y 16 caracteres y solo puede contener letras, números, guiones y guiones bajos.');
      valid = false;
  }

  if (!emailRegExp.test(userEmail.value.trim())) {
      showError(userEmail, 'El correo electrónico no tiene un formato válido.');
      valid = false;
  }

  if (!passRegExp.test(userPassword.value.trim())) {
      showError(userPassword, 'La contraseña debe tener entre 4 y 12 caracteres.');
      valid = false;
  }

  if (valid) {
      this.submit();
  }
});

// Esta función muestra los mensajes de error por pantalla
function showError(input, message) {
  const errorElement = document.createElement('div');
  errorElement.classList.add('alertaError');
  errorElement.textContent = message;

  input.classList.add('error');
  input.parentNode.appendChild(errorElement);
}

// Esta función elimina los mensajes de error cuando el usuario introduce bien los datos
function clearErrors() {
  const errorElements = document.querySelectorAll('.alertaError');
  errorElements.forEach(element => element.remove());

  const inputs = document.querySelectorAll('.form-register input');
  inputs.forEach(input => input.classList.remove('error'));
}
