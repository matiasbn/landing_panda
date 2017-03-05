<?php
// Conectando, seleccionando la base de datos
include '../conexion_php/cn.php';
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$rut = $_POST["rut"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$password = $_POST["password"];

//Query registro
//$register = "insert into usuarios values (16940663-4,'Matias','Barrios','asdasdasd','86698242','hola');";





$verificar_usuario = mysqli_query($link, "SELECT * FROM usuarios WHERE rut = '$rut'");

if(mysqli_num_rows($verificar_usuario)>0){
    echo '<script>
            alert("El rut ya esta registrado");
            window.history.go(-1);
        </script>';
}
else {
    $register = "INSERT INTO usuarios (nombre,apellido,rut,email,telefono,password) values ('$nombre','$apellido','$rut','$email','$telefono','$password');";
    //Envío de query
    $result = mysqli_query($link,$register);
    if(!$result){
        echo 'Error al registrarse';
    }
    else{
    echo  '<script>
            alert("¡Bienvenido!");
            window.history.go(-1);
           </script>';
    }

    //Cerrar conexión
    mysqli_close($link);
}

