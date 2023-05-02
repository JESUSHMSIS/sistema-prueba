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

// Obtener el ID del historial a editar
$id_historial = $_GET['id'];


// Si se envió el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $diagnostico = $_POST["diagnostico"];
  $tratamiento = $_POST["tratamiento"];
  $medicamentos = $_POST["medicamentos"];
  $notas_progreso = $_POST["notas_progreso"];

  // Actualizar los datos en la base de datos
  $sql = "UPDATE historial SET diagnostico='$diagnostico', tratamiento='$tratamiento', medicamentos='$medicamentos', notas_progreso='$notas_progreso' WHERE id_historial='$id_historial'";

  if ($conn->query($sql) === TRUE) {
    echo "Historial actualizado correctamente.";
  } else {
    echo "Error al actualizar el historial: " . $conn->error;
  }
}

// Obtener los datos del historial a editar
$sql = "SELECT * FROM historial WHERE id_historial='$id_historial'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Mostrar los datos en un formulario HTML
  while($row = $result->fetch_assoc()) {
    echo "<form method='POST'>";
    echo "<input type='hidden' name='id' value='".$row["id_historial"]."'>";
    echo "Diagnóstico: <input type='text' name='diagnostico' value='".$row["diagnostico"]."'><br>";
    echo "Tratamiento: <input type='text' name='tratamiento' value='".$row["tratamiento"]."'><br>";
    echo "Medicamentos: <input type='text' name='medicamentos' value='".$row["medicamentos"]."'><br>";
    echo "Notas de progreso: <input type='text' name='notas_progreso' value='".$row["notas_progreso"]."'><br>";
    echo "<input type='submit' value='Actualizar'>";
    echo "<button class='botonsito'</button><a href='./historial_paciente.php'>volver</a>
    </button>";
    echo "</form>";
  }
} else {
  echo "No se encontró el historial.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<style>
  form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  }

  input[type="text"], textarea {
    display: block;
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: none;
    background-color: #e6e6e6;
    box-shadow: inset 0px 0px 5px rgba(0, 0, 0, 0.1);
    color: #333;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #3e8e41;
  }

  .botonsito {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    margin:10px;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
  }

  .botonsito:hover {
    background-color: #3e8e41;
  }

  .botonsito a{
    text-decoration:none;
    color:white;
  }
</style>