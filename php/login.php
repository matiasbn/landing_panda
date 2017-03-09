<?php
// Conectando, seleccionando la base de datos
include 'cn.php';
$rut_login = $_POST["rut_login"];
$password_login = $_POST["password_login"];
session_start();
$_SESSION += $_POST;

//Query registro
//$register = "insert into usuarios values (16940663-4,'Matias','Barrios','asdasdasd','86698242','hola');";

$verificar_usuario = mysqli_query($link, "SELECT * FROM usuarios WHERE rut = '$rut_login'");

//Verificar si el usuario existe
if(mysqli_num_rows($verificar_usuario)==0){
    echo '<script>
            alert("Rut incorrecto o no registrado");
            window.history.go(-1);
        </script>';
}

//Si existe, verificar su contraseña
else{
    $login = mysqli_query($link,"SELECT * FROM usuarios WHERE rut='$rut_login' AND password='$password_login'");
    if(mysqli_num_rows($login)==0){
        echo  '<script>
                alert("Contraseña incorrecta");
                window.history.go(-1);
               </script>';
    }
    else{
        //Verificar si hay login previo
        $verificar_login_previo = mysqli_query($link, "SELECT * FROM plazas WHERE rut = '$rut_login'");
        //Si no hay login, se le asigna una plaza
        if(mysqli_num_rows($verificar_login_previo)==0){
            $seleccionar_plaza=mysqli_query($link,"SELECT numero_plaza FROM plazas WHERE estado_plaza = 0");
            $plaza = mysqli_fetch_row($seleccionar_plaza);
            mysqli_query($link,"UPDATE plazas SET rut=$rut_login, estado_plaza = 1 WHERE numero_plaza = $plaza[0]") ;
            $_SESSION['plaza'] = $plaza[0];
            }
        //Si hay login previo, recupera la plaza
        else{
            $seleccionar_plaza=mysqli_query($link,"SELECT numero_plaza FROM plazas WHERE rut = $rut_login");
            $plaza = mysqli_fetch_row($seleccionar_plaza);
            $_SESSION['plaza'] = $plaza[0];
        }
        $query_datos = mysqli_query($link,"SELECT * FROM usuarios WHERE rut = $rut_login");
        $datos = mysqli_fetch_row($query_datos);
        $_SESSION['rut'] = $datos[0];
        $_SESSION['nombre'] = $datos[1]; 
        $_SESSION['apellido'] = $datos[2]; 
        $_SESSION['email'] = $datos[3];
        $_SESSION['telefono'] = $datos[4];
        $_SESSION['fecha_inscripcion'] = $datos[8];
        
        
        echo  '<script>
                window.location.assign("../user/index.html") ;
                //window.location.assign("print_php.php") ;
               </script>';  
    }
}
//Si es la contraseña correcta, verificar si ya tiene plaza
//Cerrar conexión
mysqli_close($link);
?>