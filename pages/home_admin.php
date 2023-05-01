<?php
session_start();

if ($_SESSION['nivel'] != 'administrador') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrador</title>
</head>
<body>
    <h1>Bienvenido, administrador</h1>
    <p>Esta es la página principal para los usuarios con nivel de acceso de administrador.</p>
    <form method="post" action="../cerra_sesion.php">
    <input type="submit" value="Cerrar sesión">
</form>
</body>
</html>