<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="Resources/styleRegistro.css" />
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