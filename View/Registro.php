<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Resources/styleRegistro.css" />
        <title>Registro</title>
    </head>
    <body>
        <header>
            <div class="navbar">
                <div class="logo"><a href="?resp=index">GAMEWORLD</a></div>
                <div class="navbar_login">
                    <a href="?resp=Registro" class="action_btn">Registrate</a>
                    <a href="?resp=sesion" class="action_btn">Login</a>
                </div>
            </div>
        </header>
        <div class="wrapper">
            <form method="POST" action="?resp=registrar">
                <h1>Registro</h1>
                <input type="hidden" name="txtId">
                <div class="input-box">
                    <input type="Usuario" name="TxtUsername" required>
                    <label for="Usuario" class="label_group">Usuario</label>
                    <box-icon name='user' type='solid'></box-icon>
                </div>
                <div class="input-box">
                    <input type="Correo"  name="TxtEmail" required>
                    <label for="Clave" class="label_group">Contraseña</label>
                    
                    <box-icon name='user' type='solid'></box-icon>
                </div>
                <div class="input-box">
                    <input type="Clave" name="TxtContraseña" required>
                    <label for="Clave" class="label_group">Clave</label>
                    <box-icon name='lock-alt'></box-icon>
                </div>
                <div class="input-box">
                    <input type="Nombre" name="TxtNombre" required>
                    <label for="Clave" class="label_group">Nombre</label>
                    <box-icon name='user' type='solid'></box-icon>
                </div>
                <div class="input-box">
                    <input type="Telefono" name="TxtTelefono" required>
                    <label for="Clave" class="label_group">Telefono</label>
                    <box-icon name='user' type='solid'></box-icon>
                </div>
                <button type="submit" class="btn"> Registrarse </button>
                <div class="">
                    <?php
                    echo $_SESSION['error_message'];
                    ?>
                </div>
                <div class="register-link">
                    <p>¿Ya posees una cuenta? <a href="?resp=sesion">Login</a></p>
                </div>
            </form>
        </div>
    </body>
</html>