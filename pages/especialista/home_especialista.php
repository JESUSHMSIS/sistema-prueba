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
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #F2F2F2;
}

h1 {
    color: #333;
    font-size: 36px;
}

p {
    color: #666;
    font-size: 18px;
    line-height: 1.5;
}

form {
    margin-top: 20px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s ease-in-out;
}

input[type="submit"]:hover {
    background-color: #0062cc;
}
a {
    display: inline-block;
    background-color: #fff;
    color: #007bff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 4px;
    border: 1px solid #007bff;
    transition: background-color 0.3s ease-in-out;
    margin-left: 10px;
}

a:hover {
    background-color: #007bff;
    color: #fff;
}
</style>
<body>
    <h1>Bienvenido, especialista psiquiátrico</h1>
    <p>Esta es la página principal para los usuarios con nivel de acceso de especialista psiquiátrico.</p>
    <form method="post" action="../../cerra_sesion.php">
    <input type="submit" value="Cerrar sesión">
    <a href="./funciones/historial_paciente.php">Pacientes</a>
    <a href="./funciones/nueva_cita.php">agregar cita</a>
</form>
</body>
</html>