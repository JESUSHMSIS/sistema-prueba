<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: login.php');
}

$usuario = $_SESSION['usuario'];

// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'prueba');

// Consulta para obtener las citas programadas para el paciente actual
$query = "SELECT * FROM citas WHERE id_paciente = (SELECT id FROM usuarios WHERE usuario = '$usuario')";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Citas programadas</title>
</head>
<body>
  <h1>Citas programadas</h1>
  <table>
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Descripción</th>
        <th>Especialista</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
          <td><?php echo $fila['fecha']; ?></td>
          <td><?php echo $fila['hora']; ?></td>
          <td><?php echo $fila['descripcion']; ?></td>
          <td><?php echo $fila['id_especialista']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>