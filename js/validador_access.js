function validador_access() {
    var nombre, apellido, rut, email, telefono, password, confirmpass,  expresion_correo, expresion_rut, expresion_telefono;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    rut = document.getElementById("rut").value;
    email = document.getElementById("email").value;
    telefono = document.getElementById("telefono").value;
    password = document.getElementById("password").value;
    confirmpass = document.getElementById("confirmpass").value;
    
    expresion_email = /\w+@+\w+\.+[a-z]/;
    if (nombre === "" || apellido === "" || rut === "" || email === "" || telefono === "" || password === "" || confirmpass === "") {
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if (nombre.length>45) {
        alert("Nombre demasiado largo");
        return false;
    }
    else if (isNaN(rut)){
        alert("El Rut ingresado no es válido, ingrese su rut sin puntos ni guión");
        return false;
    }
    else if (rut.length>9 || rut.length<8){
        alert("Rut incorrecto");
        return false;
    }
    else if (!expresion_email.test(email)) {
        alert("El correo ingresado no es válido");
        return false;
    }
    else if (isNaN(telefono)) {
        alert("El teléfono ingresado no es un numero");
        return false;
    }
    else if (telefono.length !== 8){
        alert("Debe ingresar los últimos 8 números de su teléfono celular");
        return false;
    }
    else if (password.length < 8){
        alert("Contraseña demasiado corta");
        return false;
    }
    else if (password !== confirmpass){
        alert("Las contraseñas ingresadas no coinciden");
        return false;
    }
}