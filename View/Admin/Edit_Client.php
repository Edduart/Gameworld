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
        <h2 class="logo">GAMEWORLD</h2>
        <nav class="naigation">
            <a href="Principal.php">UNO</a>
            <a href="#">UNO</a>
            <a href="#">UNO</a>
        </nav>
    </header>




<div class="wrapper">
        <form method="POST" action="?resp=registrar">
            <h1>Registro</h1>
            <input type="hidden" name="txtId">
            <div class="input-box">
                <input type="Usuario" placeholder="Username" name="TxtUsername" value="<?php echo $alm->Username; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Correo" placeholder="Email" name="TxtEmail" value="<?php echo $alm->Email; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Nombre" placeholder="Nombre" name="TxtNombre" value="<?php echo $alm->Nombre; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Telefono" placeholder="Telefono" name="TxtTelefono" value="<?php echo $alm->Telefono; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>
            
            <button type="submit" class="btn"> Registrarse </button>

            <div class="register-link">
                <p>¿Ya posees una cuenta? <a href="?resp=sesion">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>