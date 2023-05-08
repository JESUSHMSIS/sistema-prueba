

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<style>
    body {
      background: linear-gradient(to bottom, #f2f2f2, #ffffff);
      font-family: Arial, sans-serif;
  }
  
  h1 {
      text-align: center;
      margin-top: 50px;
  }
  
  form {
      width: 400px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0px 0px 10px #d9d9d9;
  }
  
  label {
      display: block;
      margin-bottom: 10px;
  }
  
  input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      margin-bottom: 20px;
  }
  
  input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
  }
  
  input[type="submit"]:hover {
      background-color: #0062cc;
  }
  
  input[type="checkbox"] {
      margin-left: 10px;
  }
  
  a {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #007bff;
  }
  </style>
<body>
    <h1>Login</h1>
    <form method="post" action="autenticar.php">
    
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario">
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <input type="checkbox" onclick="showPassword()">Mostrar contraseña
        <br>
        <input type="submit" value="Ingresar">
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