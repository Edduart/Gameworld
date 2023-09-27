<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="Resources/styleRegistro.css" />
    <title>Edit_Product</title>
</head>
<body>

<header>
<div class="logo"><a href="?resp=PrincipalAdmin">GAMEWORLD</a></div>
<nav class="naigation">
            <a href="?resp=Product">Registrar Producto</a>
            <a href="?resp=Lista_Client">Lista de Clientes</a>
            <a href="?resp=CerrarSesion">Cerrar sesion</a>
        </nav>
        <a href="?resp=sesion" class="action_btn"><?php echo $_SESSION['nombre'] ?></a>
        <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>
</header>



    <div class="wrapper">
        <form method="POST" action="?resp=regist_product">
            <h1>Editar Producto</h1>
            <div class="input-box">
                <input type="Nombre de producto" placeholder="Nombre de producto" name="TxtNproducto" value="<?php echo $alm->Nombre_Producto; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Descripción" placeholder="Descripción" name="TxtDescripcion" value="<?php echo $alm->Descripcion; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Precio" placeholder="Precio" name="TxtPrecio" value="<?php echo $alm->Precio; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Imagen" placeholder="Imagen" name="TxtImagen" value="<?php echo $alm->Image_URL; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>
            <button type="submit" class="btn"> Editar </button>
        </form>
    </div>
 </body>
</html>