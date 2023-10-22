<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="Resources/stylePrincipal.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


  <title>Document</title>
</head>

<body>
  <header>

    <div class="navbar">
      <div class="logo"><a href="?resp=PrincipalUser">GAMEWORLD</a></div>
      <a href="?resp=PrincipalUser" class="action_btn"><?php echo $_SESSION['nombre'] ?></a>
    </div>

    <div class="navbar_login">
      <div class="dropdown"><i class='bx bx-menu'></i>
        <div class="items">
          <a href="?resp=CerrarSesion">Cerrar sesion</a>
          <a href="?resp=seguridad">Seguridad</a>
          <a href="?resp=obtenerInfo">Mi cuenta</a>
        </div>
      </div>

      <div class="dropdown_menu">
        <li><a href="hero">Home</a></li>
        <li><a href="Borrame.html">About</a></li>
        <li><a href="Borrame.html">Service</a></li>
        <li><a href="Borrame.html">Contactanos</a></li>
        <li><a href="#" class="action_btn">Login</a></li>
      </div>
  </header>

  <div class="top-tittle">
    <h1>Resumen del Carrito</h1>
  </div>

  <section id="list">
    <div class="list-container">
      <?php
        $precioTotal = 0;
        if (isset($_SESSION['carrito'])) {
          $carrito_mio = $_SESSION['carrito'];
          if (!empty($carrito_mio)) {
            echo '<div class="list-wrapper">';
            foreach ($carrito_mio as $pedido) {
              echo '<div class="pedidos-wrapper">';
                echo '<img class="icon" src="' . $pedido["img"] . '" alt="' . $pedido["nombre_product"] . '">';
                echo '<div class="prod_desc">';
                  echo '<h3>' . $pedido["nombre_product"] . '</h3>';
                  echo '<p>' . $pedido["descripcion"] . '</p>';
                  /*echo '<p> ID producto = ' . $pedido->ID_Producto . '</p>';*/
                  echo '<span class="price">$' . $pedido["precio"] . '</span>';
                echo '</div>';
              echo '</div>';
            $cantidad = count($pedido);
            $precioTotal += $pedido["precio"];
            }
            echo '</div>';
            echo '<div class="resumen-container">';
            echo '<h1>Resumen del carrito</h1>';
              echo '<div class="resumen-list">';
              // Generar pedido
              foreach ($carrito_mio as $pedido){
                echo '<form method="post" action="#">';
                  echo '<input name="id_pedido" type="hidden" value="' . $productos->ID_Producto  . '">';
                  echo '<input name="id_producto" type="hidden" value="' . $pedido["id_producto"]  . '">';
                  echo '<input name="descripcion" type="hidden" value="' . $productos->Descripcion . '">';
                  echo '<input name="precio" type="hidden" alue="' . $productos->Precio . '">';
                  echo '<input name="cantidad" type="hidden" value="1">';
                echo '</form>';
              }
              echo '<button class="action_btn" type="submit" name="agregar">Añadir al carrito</button>';
              echo '<h2> Cantidad de productos = ' . $cantidad .'</h2>';
              echo '<h2> Precio total = ' . $precioTotal .'$</h2>';
              echo '<button class="action_btn" type="button" name="agregar"><a href="?resp=MetodoPagos">Pagos</a></button>';
              echo '</div>';
            echo '</div>';
          } else {
            echo '<p>No hay productos disponibles en este momento.</p>';
          }
        }
      ?>
    </div>
  </section>
</body>
</html>