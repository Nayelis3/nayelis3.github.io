document.addEventListener('DOMContentLoaded', () => {
    let btn = document.getElementById("btnEnviar");
    let txtUsuario = document.getElementById("usuario");
    let txtPassword = document.getElementById("contra");
    btn.addEventListener("click", (e)=>{
        e.preventDefault();
        txtUsuario.setCustomValidity("");
        txtPassword.setCustomValidity("");

        if(!txtUsuario.value.trim().match(/^[A-Za-z0-9_]{4,20}$/)){
            txtUsuario.setCustomValidity("El usuario es obligatorio debe de contener entre 4 y 20 caracteres(solo letras y numeros)")
        }
        if(!txtPassword.value.trim().match(/^[a-zA-Z0-9_]{6,18}$/)){
            txtPassword.setCustomValidity("La contraseña es obligatoria y debe contener entre 6 y 18 caracteres(solo numeros, letras y guiones bajos)")
        }

        let form = document.querySelector("form");
        if (form.checkValidity()) {
            form.submit(); 
        } else {
            form.reportValidity(); 
        }

    });
    

});