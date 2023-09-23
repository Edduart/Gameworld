<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="Resources/styleRegistro.css" />
    <title>Registro</title>
</head>
<body>



<div class="wrapper">
        <form method="POST" action="?resp=registrar">
            <h1>Registro</h1>
            <input type="hidden" name="txtId">
            <div class="input-box">
                <input type="Usuario" placeholder="Username" name="TxtUsername" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Correo" placeholder="Email" name="TxtEmail" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Clave" placeholder="Clave"  name="TxtContraseña" required>
                <box-icon name='lock-alt'></box-icon>
            </div>

            <div class="input-box">
                <input type="Nombre" placeholder="Nombre" name="TxtNombre" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Telefono" placeholder="Telefono" name="TxtTelefono" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>
            
            <button type="submit" class="btn"> Registrarse </button>

            <div class="register-link">
                <p>¿Ya posees una cuenta? <a href="?resp=sesion">Login</a></p>
            </div>
        </form>
    </div>












    <!--  <form method="post"action="">
        <label for="name">Nombre:</label>
        <input type="text" name="nombretxt" placeholder="Ingrese su nombre">
        <br><br>
        <label for="user">Ususuario:</label>
        <input type="text" name="usuariotxt" placeholder="Ingrese su usuario">
        <br><br>
        <label for="email">Correo:</label>
        <input type="text" name="correotxt" placeholder="Ingrese su correo">
        <br><br>
        <label for="password">Contraseña:</label>
        <input type="text" name="contraseñatxt" placeholder="Ingrese su contraseña">
        <br><br>
        <label for="telf">Telefono:</label>
        <input type="text" name="telefonotxt" placeholder="Ingrese su telefono">
        <br><br>
        <input type="submit" value="Guardar">
        <a href="" >Regresar</a>
    </form>
     -->
</body>
</html>