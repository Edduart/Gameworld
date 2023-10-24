<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="Resources/styleRegistro.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Registro_Product</title>
    
</head>
<body>

    <div class="wrapper">
        <form method="POST" action="?resp=regist_product" enctype="multipart/form-data">
            <h1>Registro de Producto</h1>
            <div class="input-box">
                <input type="Nombre de producto"name="TxtNproducto" required>
                <label for="Usuario" class="label_group">Nombre de producto</label>
               
            </div>

            <div class="input-box">
                <input type="Descripción"  name="TxtDescripcion" required>
                <label for="Usuario" class="label_group">Descripción</label>
            </div>

            <div class="input-box">
                <input type="number" name="TxtPrecio" step="0.01" required>
                <label for="Usuario" class="label_group">Precio</label>
            </div>

            <div class="input-box">
                <input type="file" name="fileImagen" required>
            </div>
             
            <button type="submit" class="btn"> Registrar </button>
            <br><br>

            <div class="register-link">
            <p><a href="?resp=PrincipalAdmin"><i class='bx bx-arrow-back' ></i></a></p>
            </div>

            <div class="Errores">
                    <?php
                    echo $_SESSION['error_message'];
                    ?>
            </div>
            
      </div>
        </form>
    </div>
 </body>
</html>