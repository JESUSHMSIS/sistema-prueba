<?php
session_start();
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "prueba");

// Consulta para obtener los pacientes
$query_pacientes = "SELECT * FROM usuarios WHERE nivel = 'paciente'";
$resultado_pacientes = mysqli_query($conexion, $query_pacientes);

// Si se envió el formulario
if(isset($_POST['enviar_cita'])) {
  // Obtener los datos del formulario
  $id_paciente = $_POST['paciente'];
  $fecha = $_POST['fecha'];
  $hora = $_POST['hora'];
  $descripcion = $_POST['descripcion'];

  // Insertar la cita en la base de datos
  $query_insertar_cita = "INSERT INTO citas (id_paciente, id_especialista, fecha, hora, descripcion) VALUES ('$id_paciente', '$_SESSION[id]', '$fecha', '$hora', '$descripcion')";
  $resultado_insertar_cita = mysqli_query($conexion, $query_insertar_cita);

  // Si se insertó la cita correctamente
  if($resultado_insertar_cita) {
    $mensaje = "Cita programada correctamente";
  } else {
    $error = "Error al programar la cita";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Programar cita</title>
</head>
<body>
  <h1>Programar cita</h1>
  <?php
  // Mostrar mensaje o error
  if(isset($mensaje)) {
    echo "<p>$mensaje</p>";
  } elseif(isset($error)) {
    echo "<p>$error</p>";
  }
  ?>
  <form method="post">
    <label for="paciente">Paciente:</label>
    <select name="paciente" id="paciente">
      <?php while($paciente = mysqli_fetch_assoc($resultado_pacientes)) { ?>
        <option value="<?php echo $paciente['id']; ?>"><?php echo $paciente['usuario']; ?></option>
      <?php } ?>
    </select><br>
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" id="fecha" required><br>
    <label for="hora">Hora:</label>
    <input type="time" name="hora" id="hora"><br>
    <label for="descripcion">Descripción:</label><br>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea><br>
    <input type="submit" name="enviar_cita" value="Programar cita">
  </form>
</body>
</html>
