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

    <title>Document</title>
  </head>
  <body>
    <header>
      <div class="navbar">
        <div class="logo"><a href="?resp=index">GAMEWORLD</a></div>
        <ul class="links">
          <li><a href="hero">Home</a></li>
          <li><a href="Borrame.html">NOMBRE</a></li>
          <li><a href="Borrame.html">Service</a></li>
          <li><a href="?resp=Registro" class="action_btn">Registrate</a></li>
        </ul>
        <a href="?resp=sesion" class="action_btn">Login</a>
        <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>
      </div>

      <div class="dropdown_menu">
        <li><a href="hero">Home</a></li>
        <li><a href="Borrame.html">About</a></li>
        <li><a href="Borrame.html">Service</a></li>
        <li><a href="Borrame.html">Contactanos</a></li>
        <li><a href="#" class="action_btn">Login</a></li>
      </div>
    </header>
    <main>
        
    <section id="hero">
        <div class="product-container">
              <?php
              // Obtener los productos desde la base de datos (supongamos que la función obtenerProductos existe)
              $productos = $this->Product->obtenerProductos();

              // Verificar si hay productos para mostrar
              if (!empty($productos)) {
                  foreach ($productos as $producto) {
                      // Generar el HTML para mostrar cada producto
                      echo  '<div class="prod_box">';
                      echo '<img class="image" src="' . $producto->Image_URL . '" alt="' . $producto->Nombre_Producto . '">';
                      //echo '<img class="image" src="Resources/Productos/steam.jpeg" alt="">';
                      echo '<h3>' . $producto->Nombre_Producto . '</h3>';
                      echo '<p>' . $producto->Descripcion . '</p>';
                      echo '<span class="price">$' . $producto->Precio . '</span>';
                      //echo '<a href="#" class="btn">Agregar al carrito</a>';
                      echo '</div>';
                  }
              } else {
                  // Si no hay productos disponibles, puedes mostrar un mensaje o contenido alternativo
                  echo '<p>No hay productos disponibles en este momento.</p>';
              }
              ?>
               
          </div>

         

        </section>



    </main>

    




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
