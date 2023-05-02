<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresa nuevo registro</title>
    <style>
        form {
            background-color: #F4F4F4;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            font-family: Arial, sans-serif;
        }
        
        label {
            display: inline-block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type=text], input[type=date], textarea {
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
            border: none;
            border-radius: 5px;
            box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.1);
        }
        
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        
        input[type=submit]:hover {
            background-color: #005DA8;
        }
        
        .botonsito {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        
        .botonsito:hover{
            background-color: #005DA8;
        }
        .botonsito a{
            text-decoration:none;
            color: white;
        }
    </style>
</head>
<body>
<form method="POST" action="agregar_historial.php">
  <label for="id_paciente">ID Paciente:</label>
  <input type="text" name="id_paciente" id="id_paciente"><br>
  
  <label for="id_usuario">ID Usuario:</label>
  <input type="text" name="id_usuario" id="id_usuario"><br>
  
  <label for="fecha">Fecha:</label>
  <input type="date" name="fecha" id="fecha"><br>
  
  <label for="diagnostico">Diagnóstico:</label>
  <textarea name="diagnostico" id="diagnostico"></textarea><br>
  
  <label for="tratamiento">Tratamiento:</label>
  <textarea name="tratamiento" id="tratamiento"></textarea><br>
  
  <label for="medicamentos">Medicamentos:</label>
  <textarea name="medicamentos" id="medicamentos"></textarea><br>
  
  <label for="notas_progreso">Notas de Progreso:</label>
  <textarea name="notas_progreso" id="notas_progreso"></textarea><br>
  
  <input type="submit" value="Agregar Registro">
  <button class="botonsito"><a href="./historial_paciente.php">volver</a></button>
</form>

</body>
</html>