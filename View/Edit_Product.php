<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="Resources/styleRegistro.css" />
    <title>Registro_Product</title>
</head>
<body>



    <div class="wrapper">
        <form method="POST" action="?resp=regist_product">
            <h1>Registro de Producto</h1>
            <div class="input-box">
                <input type="Nombre de producto" placeholder="Nombre de producto" name="TxtNproducto" value="<?php echo $alm->Nombre_p; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Descripción" placeholder="Descripción" name="TxtDescripcion" value="<?php echo $alm->Descripcion; ?>" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>
            
            <button type="submit" class="btn"> Registrar </button>
        </form>
    </div>
 </body>
</html>