<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="Resources/styleRegistro.css" />
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    
    <title>Registro_Product</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>



    <div class="wrapper">
        <form method="POST" action="?resp=regist_product">
            <h1>Registro de Producto</h1>
            <div class="input-box">
                <input type="Nombre de producto" placeholder="Nombre de producto" name="TxtNproducto" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Descripción" placeholder="Descripción" name="TxtDescripcion" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Precio" placeholder="Precio" name="TxtPrecio" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Imagen" placeholder="Imagen" name="TxtImagen" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>
             
            <button type="submit" class="btn"> Registrar </button>
            <br><br>

            <div class="buttonRegresaar"><a href="?resp=PrincipalAdmin">Regresar</a> <i class='bx bx-arrow-back'></i> </div>    
           
        </form>
    </div>
 </body>
</html>