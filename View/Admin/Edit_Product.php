<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="Resources/styleRegistro.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Edit_Product</title>
</head>
<body>





    <div class="wrapper">
        <form method="POST" action="?resp=regist_product">
            <h1>Editar Producto</h1>
            <div class="input-box">
                <input type="Nombre de producto" name="TxtNproducto" value="<?php echo $alm->Nombre_Producto; ?>" required>
                <label for="Usuario" class="label_group">Nombre de producto</label>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Descripción" placeholder="" name="TxtDescripcion" value="<?php echo $alm->Descripcion; ?>" required>
                <label for="Usuario" class="label_group">Descripción</label>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Precio" placeholder="" name="TxtPrecio" value="<?php echo $alm->Precio; ?>" required>
                <label for="Usuario" class="label_group">Precio</label>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Imagen" placeholder="" name="TxtImagen" value="<?php echo $alm->Image_URL; ?>" required>
                <label for="Usuario" class="label_group">Imagen</label>
                <box-icon name='user' type='solid' ></box-icon>
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