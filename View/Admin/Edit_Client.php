<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="Resources/styleRegistro.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Edit_Client</title>
</head>
<body>


<div class="wrapper">
        <form method="POST" action="?resp=registrar">
            <h1>Editar Cliente</h1>
            <input type="hidden" name="txtId">
            <div class="input-box">
                <input type="Usuario" placeholder="" name="TxtUsername" value="<?php echo $alm->usuario; ?>" required>
                <label for="Usuario" class="label_group">Username</label>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Correo" placeholder="Email" name="TxtEmail" value="<?php echo $alm->correo; ?>" required>
                <label for="Usuario" class="label_group">Email</label>
            </div>

            <div class="input-box">
                <input type="Nombre" placeholder="Nombre" name="TxtNombre" value="<?php echo $alm->nombre; ?>" required>
                <label for="Usuario" class="label_group">Nombre</label>
            </div>

            <div class="input-box">
                <input type="Telefono" placeholder="Telefono" name="TxtTelefono" value="<?php echo $alm->telefono; ?>" required>
                <label for="Usuario" class="label_group">Telefono</label>
            </div>

            <button type="submit" class="btn"> Editar </button>

            <br><br>
        <div class="register-link">
            <p><a href="?resp=Lista_Product"><i class='bx bx-arrow-back' ></i></a></p>
            </div>

        </form>
    </div>
</body>
</html>