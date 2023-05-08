<?php
session_start();

if ($_SESSION['nivel'] != 'paciente') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Paciente</title>
</head>
<body>
    <h1>Bienvenido, paciente</h1>
    <p>Esta es la página principal para los usuarios con nivel de acceso de paciente.</p>
    <form method="post" action="../../cerra_sesion.php">
    <input type="submit" value="Cerrar sesión">
    <?php if ($_SESSION['nivel'] == 'paciente') { ?>
  <li><a href="./funciones/citas.php">Citas</a></li>
<?php } ?>
</form>




</body>
</html>