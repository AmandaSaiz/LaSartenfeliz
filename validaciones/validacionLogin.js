document.querySelector('.form-login').addEventListener('submit', function(event) {
  event.preventDefault();

  const nameRegExp = /^[a-zA-Z0-9\_\-]{4,16}$/;
  const passRegExp = /^.{4,12}$/;

  const userName = document.querySelector('input[name="userName"]');
  const userPassword = document.querySelector('input[name="userPassword"]');

  let valid = true;
  clearErrors();

  if (!nameRegExp.test(userName.value.trim())) {
      showError(userName, 'El nombre de usuario debe tener entre 4 y 16 caracteres y solo puede contener letras, números, guiones y guiones bajos.');
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

  const inputs = document.querySelectorAll('.form-login input');
  inputs.forEach(input => input.classList.remove('error'));
}
