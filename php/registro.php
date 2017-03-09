<?php
// Conectando, seleccionando la base de datos
include 'cn.php';
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$rut = $_POST["rut"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$password = $_POST["password"];

//Query registro
$verificar_usuario = mysqli_query($link, "SELECT * FROM usuarios WHERE rut = '$rut'");

if(mysqli_num_rows($verificar_usuario)>0){
    echo '<script>
            alert("El rut ya esta registrado");
            window.history.go(-1);
        </script>';
}
else {
    $register = "INSERT INTO usuarios (nombre,apellido,rut,email,telefono,password,fecha_inscripcion) values ('$nombre','$apellido','$rut','$email','$telefono','$password', CURRENT_TIMESTAMP());";
    //Envío de query
    $result = mysqli_query($link,$register);
    if(!$result){
        echo 'Error al registrarse';
    }
    else{
    echo  '<script>
            alert("¡Registrado!, ya puedes iniciar sesión");
            window.location.assign("../access.html") ;
           </script>';
    }

    //Cerrar conexión
    mysqli_close($link);
}

