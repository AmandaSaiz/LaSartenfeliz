/** Funciones de cambio de formulario de Login a formulario de Registro */
const btnSignIn = document.getElementById("sign-in"),
    btnSignUp = document.getElementById("sign-up"),
    containerFormRegister = document.querySelector(".register"),
    containerFormLogin = document.querySelector(".login");

// Evento de click que esconde el formulario de Registro y muestra el de Login
btnSignIn.addEventListener("click", e => {
    containerFormRegister.classList.add("hide");
    containerFormLogin.classList.remove("hide")
})

// Evento de click que esconde el formulario de Login y muestra el de Registro
btnSignUp.addEventListener("click", e => {
    containerFormLogin.classList.add("hide");
    containerFormRegister.classList.remove("hide")
})