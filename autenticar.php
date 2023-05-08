<?php
require_once 'conexion.php';

// Inicializamos la sesión
session_start();

// Comprobamos si el usuario está intentando acceder al sitio por primera vez
if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 0;
    $_SESSION['ultimoIntento'] = time();
}

// Comprobamos si el usuario ha intentado acceder 3 veces en los últimos 30 segundos
if ($_SESSION['intentos'] >= 3 && time() - $_SESSION['ultimoIntento'] < 30) {
    echo 'Demasiados intentos fallidos, espere 30 segundos antes de intentarlo de nuevo.';
    exit;
}

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

        // Reiniciamos los intentos fallidos
        $_SESSION['intentos'] = 0;

        // Redireccionamos al usuario a la página correspondiente según su nivel de acceso
        switch ($_SESSION['nivel']) {
            case 'administrador':
                header('Location: ./pages/admin/home_admin.php');
                break;
            case 'especialista psiquiátrico':
                header('Location: ./pages/especialista/home_especialista.php');
                break;
            case 'paciente':
                header('Location: ./pages/paciente/home_paciente.php');
                break;
            default:
                echo 'Error: nivel de acceso no válido';
        }
    } else {
        // Incrementamos el contador de intentos fallidos
        $_SESSION['intentos']++;

        // Actualizamos el último intento fallido
        $_SESSION['ultimoIntento'] = time();

        echo 'Error: usuario o contraseña inválidos';
    }
}
?>
