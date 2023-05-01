<?php
session_start();

if ($_SESSION['nivel'] != 'especialista psiquiátrico') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Especialista psiquiátrico</title>
</head>
<body>
    <h1>Bienvenido, especialista psiquiátrico</h1>
    <p>Esta es la página principal para los usuarios con nivel de acceso de especialista psiquiátrico.</p>
    <form method="post" action="../cerra_sesion.php">
    <input type="submit" value="Cerrar sesión">
</form>
</body>
</html>