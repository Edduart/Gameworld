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
        <form method="POST" action="?resp=regist_product">
            <h1>Registro de Producto</h1>
            <div class="input-box">
                <input type="Nombre de producto" placeholder="Nombre de producto" name="TxtNproducto" required>
               
            </div>

            <div class="input-box">
                <input type="Descripción" placeholder="Descripción" name="TxtDescripcion" required>
               
            </div>

            <div class="input-box">
                <input type="Precio" placeholder="Precio" name="TxtPrecio" required>
              
            </div>

            <div class="input-box">
                <input type="Imagen" placeholder="Imagen" name="TxtImagen" value="Resources/Productos/steam.jpeg" required>
            
            </div>
             
            <button type="submit" class="btn"> Registrar </button>
            <br><br>

            <div class="register-link">
            <p><a href="?resp=PrincipalAdmin"><i class='bx bx-arrow-back' ></i></a></p>
            </div>
            
      </div>
        </form>
    </div>
 </body>
</html>