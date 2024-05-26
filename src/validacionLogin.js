import { validarCampo, nameRegExp, passRegExp, estadoValidacionCampos, enviarFormulario } from "./validacionRegistro.js";

document.addEventListener("DOMContentLoaded", () => {
  const formLogin = document.querySelector(".form-login");
  const inputPass = document.querySelector('.form-login input[type="password"]');
  const inputUser = document.querySelector('.form-login input[type="text"]');
  const alertaErrorLogin = document.querySelector(".form-login .alerta-error");
  const alertaExitoLogin = document.querySelector(".form-login .alerta-exito");
  
  formLogin.addEventListener("submit", (e) => {
    estadoValidacionCampos.userEmail = true;
    e.preventDefault();
    enviarFormulario(formLogin, alertaErrorLogin, alertaExitoLogin);
  });

  inputEmail.addEventListener("input", () => {
    validarCampo(nameRegExp, inputUser, "El usuario tiene que tener de 4 a 16 dígitos y solo puede contener, letras y guión bajo.");
  });

  inputPass.addEventListener("input", () => {
    validarCampo(passRegExp, inputPass, "La contraseña tiene que tener de 4 a 12 dígitos");
  });
});