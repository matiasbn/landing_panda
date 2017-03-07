<?php
// Conectando, seleccionando la base de datos
include 'cn.php';
$rut_login = $_POST["rut_login"];
$password_login = $_POST["password_login"];

//Query registro
//$register = "insert into usuarios values (16940663-4,'Matias','Barrios','asdasdasd','86698242','hola');";

$verificar_usuario = mysqli_query($link, "SELECT * FROM usuarios WHERE rut = '$rut_login'");

if(mysqli_num_rows($verificar_usuario)==0){
    echo '<script>
            alert("Rut incorrecto o no registrado");
            window.history.go(-1);
        </script>';
}
else {
    //Envío de query
    $login = mysqli_query($link,"SELECT * FROM usuarios WHERE rut='$rut_login' AND password='$password_login'");
    if(mysqli_num_rows($login)==0){
        echo  '<script>
                alert("Contraseña incorrecta");
                window.history.go(-1);
               </script>';
    }
    else{   
    echo  '<script>
            alert("¡Bienvenido de nuevo!");
            window.location.assign("../user/index.html") ;
           </script>';
    }

    //Cerrar conexión
    mysqli_close($link);
}

