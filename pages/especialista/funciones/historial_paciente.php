<!DOCTYPE html>
<html>
<head>
	<title>Ver historial médico</title>
	<style>
		.card {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 80%;
  margin: 20px auto;
  padding: 20px;
  background-color: #f2f2f2;
  box-shadow: 0px 0px 5px #ccc;
}

.card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  margin-bottom: 10px;
}

.card-header h2 {
  font-size: 24px;
  font-weight: bold;
}

.card-body {
  width: 100%;
}

.card-body p {
  margin: 10px 0;
}

.card-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  margin-top: 10px;
}

.card-footer button {
  padding: 10px;
  border: none;
  background-color: #007bff;
  color: white;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
}

.card-footer button:hover {
  background-color: #0062cc;
}

.card-footer button a{
  text-decoration: none;
  color: white;
}

.botonsito2{
  padding: 10px;
  border: none;
  background-color: #007bff;
  color: white;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
}
.botonsito2{
  background-color: #0062cc;
}
.botonsito2 a{
	text-decoration: none;
	color: white;
}

	</style>
</head>
<body>

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

// Consulta SQL para obtener los datos del historial con el nombre del paciente
$sql = "SELECT historial.*, pacientes.nombre, pacientes.apellido FROM historial INNER JOIN pacientes ON historial.id_paciente = pacientes.id_paciente";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Mostrar los datos en tarjetas
  while($row = $result->fetch_assoc()) {
    echo "<div class='card'>";
    echo "<div class='card-header'>";
    echo "<h2>".$row["nombre"]." ".$row["apellido"]."</h2>";
    echo "<span>Fecha: ".$row["fecha"]."</span>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<p><strong>Diagnóstico:</strong> ".$row["diagnostico"]."</p>";
    echo "<p><strong>Tratamiento:</strong> ".$row["tratamiento"]."</p>";
    echo "<p><strong>Medicamentos:</strong> ".$row["medicamentos"]."</p>";
    echo "<p><strong>Notas de progreso:</strong> ".$row["notas_progreso"]."</p>";
    echo "</div>";
    echo "<div class='card-footer'>";
    echo '<a href="editar_historial.php?id=' . $row['id_historial']. '"><button>Editar</button></a>';
    echo '<button><a href="./eliminar_historial.php?id=' . $row['id_historial'] . '">Eliminar</a></button>';
	;

    echo "</div>";
    echo "</div>";
  }
} else {
  echo "No se encontraron resultados.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
<button class="botonsito2"><a href="./nuevo_registro.php">nuevo registro</a></button>
<button class="botonsito2"><a href="../home_especialista.php">volver</a></button>
</body>
</html>