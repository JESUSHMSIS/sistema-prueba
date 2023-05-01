<?php
require_once 'conexion.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para buscar el usuario y la contraseña en la tabla de usuarios
    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);

        // Guardamos el nivel de acceso del usuario en la sesión
        $_SESSION['nivel'] = $fila['nivel'];

        // Redireccionamos al usuario a la página correspondiente según su nivel de acceso
        switch ($_SESSION['nivel']) {
            case 'administrador':
                header('Location: ./pages/home_admin.php');
                break;
            case 'especialista psiquiátrico':
                header('Location: ./pages/home_especialista.php');
                break;
            case 'paciente':
                header('Location: ./pages/home_paciente.php');
                break;
            default:
                echo 'Error: nivel de acceso no válido';
        }
    } else {
        echo 'Error: usuario o contraseña inválidos';
    }
}