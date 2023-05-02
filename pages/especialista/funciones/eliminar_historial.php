<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

$id_historial = $_GET['id'];

// Comprobar que se ha recibido el ID de historial
if (!isset($id_historial)) {
  echo "ID de historial no especificado";
  exit;
}

// Consulta SQL para eliminar el historial
$sql = "DELETE FROM historial WHERE id_historial = " . $id_historial;

// Ejecutar la consulta y mostrar el resultado
if ($conn->query($sql) === TRUE) {
  echo "Historial eliminado exitosamente";
  echo "<button><a href='./historial_paciente.php'>volver</a>
  </button>";
} else {
  echo "Error al eliminar historial: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

