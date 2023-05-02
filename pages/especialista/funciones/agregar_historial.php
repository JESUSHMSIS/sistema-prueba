<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$id_paciente = $_POST['id_paciente'];
$id_usuario = $_POST['id_usuario'];
$fecha = $_POST['fecha'];
$diagnostico = $_POST['diagnostico'];
$tratamiento = $_POST['tratamiento'];
$medicamentos = $_POST['medicamentos'];
$notas_progreso = $_POST['notas_progreso'];

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO historial (id_paciente, id_usuario, fecha, diagnostico, tratamiento, medicamentos, notas_progreso)
VALUES ('$id_paciente', '$id_usuario', '$fecha', '$diagnostico', '$tratamiento', '$medicamentos', '$notas_progreso')";

if ($conn->query($sql) === TRUE) {
  echo "Registro agregado exitosamente.";
} else {
  echo "Error al agregar el registro: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./historial_paciente.php">volver a los historiales</a>
</body>
</html>