<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form method="post" action="autenticar.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        <input type="checkbox" onclick="showPassword()">Mostrar contraseña
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>

    <script>
        function showPassword() {
        var passwordField = document.getElementById("contrasena");
        if (passwordField.type === "password") {
      passwordField.type = "text";
        } else {
      passwordField.type = "password";
        }
  }
    </script>
</body>
</html>