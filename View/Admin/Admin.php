<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" type="text/css" href="Resources/stylePrincipal.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <title>Document</title>
  </head>
  <body>
    <header>
      <div class="navbar">
        <div class="logo"><a href="?resp=PrincipalAdmin">GAMEWORLD</a></div>
        <a href="#" class="action_btn"><?php echo $_SESSION['nombre'] ?></a>
        <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>
      </div>

      <div class="navbar_login">
            <div class="dropdown">Clientes<i class='bx bx-menu' ></i>
                <div class="items">
                <li><a href="?resp=Lista_Client">Lista de Clientes</a></li>
                </div>
            </div>
      </div>

      <div class="navbar_login">
            <div class="dropdown2">Productos<i class='bx bx-menu' ></i>
                <div class="items">
                <li><a href="?resp=Product">Registrar Producto</a></li>
                <li><a href="?resp=Micategoria">Crear Categoria</a></li>
                <li><a href="?resp=Lista_Product">Lista de Productos</a></li>
                </div>
            </div>
      </div>

      <div class="navbar_login">
            <div class="dropdown3">Reportes<i class='bx bx-menu' ></i>
                <div class="items">
                <li><a href="https://docs.google.com/document/d/1e0ooxPFKHbpUV2OyHh06dMRSp4Vklbbs/edit" target="_blank">Producto más vendido por mes</a></li>
                <li><a href="https://docs.google.com/document/d/1o0opA_CJssEmC-BWPI2oggxHMGlx2Kgj/edit#heading=h.gjdgxs" target="_blank">Producto más vendido</a></li>
                <li><a href="https://docs.google.com/document/d/11YOHyqw8rkAwMRQS-AJGkieA8hmDMnmv/edit" target="_blank">Compras por cliente</a></li>
                <li><a href="Reporte_venta.php"  target="_blank">Reporte de Ventas</a></li>
                </div>
            </div>
      </div>

      <div class="navbar_login">
            <div class="dropdown4"><i class='bx bx-menu' ></i>
                <div class="items">
                <li><a href="?resp=Bitacora">Bitacora</a></li>
                <li><a href="?resp=CerrarSesion">Cerrar sesion</a></li>
                </div>
            </div>
      </div>


    </header>
    <main>
       <div class="top-tittle">
        <h1>Tarjetas regalo electrónicas</h1>    
       </div> 
       <section id="hero">
        <div class="product-container">
          <?php
          // Obtener los productos desde la base de datos (supongamos que la función obtenerProductos existe)
          $productos = $this->Product->obtenerProductos();

          // Verificar si hay productos para mostrar
          if (!empty($productos)) {
              echo '<div class="products-wrapper">';
              foreach ($productos as $producto) {
                  // Generar el HTML para mostrar cada producto
                  echo '<div class="prod_box">';
                  echo '<img class="image" src="' . $producto->Image_URL . '" alt="' . $producto->Nombre_Producto . '">';
                  echo '<h3>' . $producto->Nombre_Producto . '</h3>';
                  echo '<p>' . $producto->Descripcion . '</p>';
                  echo '<span class="price">$' . $producto->Precio . '</span>';
                  //echo '<a href="#" class="btn">Agregar al carrito</a>';
                  echo '</div>';
              }
              echo '</div>';
          } else {
              // Si no hay productos disponibles, puedes mostrar un mensaje o contenido alternativo
              echo '<p>No hay productos disponibles en este momento.</p>';
          }
          ?>
          </div>
        </section>
    </main>   

    <div class="top-tittle2">
        <h2>Informacion para realizar la compra</h2>    
    </div> 

        <div class="contenedor-allcard">

        <div class = "container-card">
            <div class="card">
              <img src="./Resources/Paso1.jpeg" alt="#">
              <h4>Primer Paso</h4>
              <p>Selecciona la “Gift Card” que deseas agregar a tu carrito, recuerda verificar su costo y la plataforma de la Gift Card sea la correcta. </p>
            </div>
          </div>

          <div class = "container-card">
            <div class="card">
              <img src="./Resources/Paso2.jpeg" alt="#">
              <h4>Segundo Paso</h4>
              <p>Ingresa a tu carrito y selecciona la opción “Pagar”. Verifica los objetos del carrito antes de proceder con el pago.</p>
            </div>
          </div>

          <div class = "container-card">
            <div class="card">
              <img src="./Resources/Paso3.jpeg" alt="#">
              <h4>Tercer Paso</h4>
              <p>Ingresa los datos solicitados para procesar el pago y por ultimo finaliza con la compra. </p>
            </div>
          </div>

        </div>   
        
    <script>
        const toggleBtn = document.querySelector(".toggle_btn");
        const toggleBtnIcon = document.querySelector(".toggle_btn i");
        const dropDownMenu = document.querySelector(".dropdown_menu");
      
        toggleBtn.onclick = function () {
          dropDownMenu.classList.toggle("open");
          const isOpen = dropDownMenu.classList.contains("open");
        };
      </script>
    </script>
  </body>
</html>

    

</body>
</html>