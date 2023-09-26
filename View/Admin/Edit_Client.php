<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="Resources/styleRegistro.css" />
    <title>Edit_Client</title>
</head>
<body>

<header>
<div class="logo"><a href="?resp=PrincipalAdmin">GAMEWORLD</a></div>
    <nav class="naigation">
        <a href="?resp=Product">Registrar Producto</a>
        <a href="?resp=Lista_Product">Lista de Productos</a>
        <a href="?resp=CerrarSesion">Cerrar sesion</a>
    </nav>
        <a href="?resp=sesion" class="action_btn"><?php echo $_SESSION['nombre'] ?></a>
        <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>
</header>


<div class="wrapper">
        <form method="POST" action="?resp=registrar">
            <h1>Editar Cliente</h1>
            <input type="hidden" name="txtId">
            <div class="input-box">
                <input type="Usuario" placeholder="Username" name="TxtUsername" value="<?php echo $alm->usuario; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Correo" placeholder="Email" name="TxtEmail" value="<?php echo $alm->correo; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Nombre" placeholder="Nombre" name="TxtNombre" value="<?php echo $alm->nombre; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Telefono" placeholder="Telefono" name="TxtTelefono" value="<?php echo $alm->telefono; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <button type="submit" class="btn"> Editar </button>

        </form>
    </div>
</body>
</html>