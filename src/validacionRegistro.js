// Expresiones regulares usadas en las validaciones
export const nameRegExp = /^[a-zA-Z0-9\_\-]{4,16}$/;
const emailRegExp = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
export const passRegExp = /^.{4,12}$/;

// Declaración de estado de las validaciones
export const estadoValidacionCampos = {
  userName: false,
  userEmail: false,
  userPassword: false,
};

/**
 * Declaración de los eventos del formulario
 */
document.addEventListener("DOMContentLoaded", () => {
  // Llamada a los elementos del registro del login.html
  const formRegister = document.querySelector(".form-register");
  const inputUser = document.querySelector('.form-register input[type="text"]');
  const inputEmail = document.querySelector('.form-register input[type="email"]');
  const inputPass = document.querySelector('.form-register input[type="password"]');
  const alertaError = document.querySelector(".form-register .alerta-error");
  const alertaExito = document.querySelector(".form-register .alerta-exito");

  formRegister.addEventListener("submit", (e) => {
    e.preventDefault();
    enviarFormulario(formRegister, alertaError, alertaExito);
  });

  inputUser.addEventListener("input", () => {
    validarCampo(nameRegExp, inputUser, "El usuario tiene que tener de 4 a 16 dígitos y solo puede contener, letras y guión bajo.");
  });

  inputEmail.addEventListener("input", () => {
    validarCampo(emailRegExp, inputEmail, "El correo solo puede contener letras, números, puntos, guiones y guíon bajo.");
  });

  inputPass.addEventListener("input", () => {
    validarCampo(passRegExp, inputPass, "La contraseña tiene que tener de 4 a 12 dígitos");
  });
});

/**
 * Función que realiza la validación de los campos del formulario en función de la expresión regular que le corresponda a cada
 * uno de los campos, enviando su respectivo mensaje de error.
 * 
 * @param {*} regularExpresion 
 * @param {*} campo 
 * @param {*} mensaje 
 * @returns 
 */
export function validarCampo(regularExpresion, campo, mensaje) {
  const validarCampo = regularExpresion.test(campo.value);
  if (validarCampo) {
    eliminarAlerta(campo.parentElement.parentElement);
    estadoValidacionCampos[campo.name] = true;
    campo.parentElement.classList.remove("error");
    return;
  }
  estadoValidacionCampos[campo.name] = false;
  campo.parentElement.classList.add("error");
  mostrarAlerta(campo.parentElement.parentElement, mensaje);
}

/**
 * Función para mostrar las alertas por pantalla de forma dinámica, introduciendolas en un nuevo div del formulario
 * 
 * @param {*} referencia 
 * @param {*} mensaje 
 */
function mostrarAlerta(referencia, mensaje) {
  eliminarAlerta(referencia);
  const alertaDiv = document.createElement("div");
  alertaDiv.classList.add("alerta");
  alertaDiv.textContent = mensaje;
  referencia.appendChild(alertaDiv);
}

/**
 * Esta función evita que los mensajes aparezcan de forma repetida
 * 
 * @param {*} referencia 
 */
function eliminarAlerta(referencia) {
  const alerta = referencia.querySelector(".alerta");

  if (alerta) alerta.remove();
}

/**
 * Función que resetea los estados de validación del formulario y le añade/elimina los mensajes de error o éxito
 * después de que permanezcan un tiempo por pantalla
 * 
 * @returns 
 */
export function enviarFormulario(form, alertaError, alertaExito) {
  if (estadoValidacionCampos.userName && estadoValidacionCampos.userEmail && estadoValidacionCampos.userPassword) {
    estadoValidacionCampos.userName = false;
    estadoValidacionCampos.userEmail = false;
    estadoValidacionCampos.userPassword = false;

    form.reset();
    alertaExito.classList.add("alertaExito");
    alertaError.classList.remove("alertaError");
    setTimeout(() => {
      alertaExito.classList.remove("alertaExito");
    }, 3000);
    return;
  }

  alertaExito.classList.remove("alertaExito");
  alertaError.classList.add("alertaError");
  setTimeout(() => {
    alertaError.classList.remove("alertaError");
  }, 3000);
}
