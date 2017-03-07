function validador_access_login() {
    var rut_login, password_login;
    rut_login = document.getElementById("rut_login").value;
    password_login = document.getElementById("password_login").value;
    
    if (rut_login === "" || password_login === "") {
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if (isNaN(rut_login)){
        alert("El Rut ingresado no es válido, ingrese su rut sin puntos ni guión");
        return false;
    }
    else if (rut_login.length>9 || rut_login.length<8){
        alert("Rut incorrecto");
        return false;
    }
    else if (password_login.length < 8){
        alert("Contraseña demasiado corta");
        return false;
    }
}