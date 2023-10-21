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

    <?php 
      if(isset($_SESSION['carrito'])){
        $carrito_mio = $_SESSION['carrito'];
      }

      //Contamos nuestro carrito
      if(isset($_SESSION['carrito'])){
        for($i=0;$i<=count($carrito_mio)-1;$i++){
          if(isset($carrito_mio[$i])){
            if($carrito_mio[$i] != NULL){
              if(!isset($carrito_mio['cantidad'])){$carrito_mio['cantidad'] = '0';}else{$carrito_mio['cantidad'] = $carrito_mio['cantidad'];}
              $total_cantidad = $carrito_mio['cantidad'];
              $total_cantidad ++;  
              if(!isset($total_cantidad)){$total_cantidad = '0';}else{$total_cantidad = $total_cantidad;}
              $total_cantidad += $total_cantidad;
            }}}
      }

        //Declaramos variables
        if(!isset($total_cantidad)){$total_cantidad = '';}else{$total_cantidad = $total_cantidad;}
      ?>

      <div class="navbar">
          <div class="logo"><a href="?resp=PrincipalUser">GAMEWORLD</a></div>
          <form class="search_container">
            <input class="search_bar" type="text" placeholder="Search..">
            <ul>
            <li><a href="#">Buscar</a></li>
            </ul>
            <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>
          </form>
            <li><a href="#">Carrito <?php echo $total_cantidad; ?> </a></li>
            <a href="?resp=PrincipalUser" class="action_btn"><?php echo $_SESSION['nombre'] ?></a>
      </div>

          <div class="navbar_login">
            <div class="dropdown"><i class='bx bx-menu' ></i>
                <div class="items">
                    <a href="?resp=CerrarSesion">Cerrar sesion</a>
                    <a href="?resp=seguridad">Seguridad</a>
                    <a href="?resp=obtenerInfo">Mi cuenta</a>
                </div>
            </div>

          <!--<ul class="links">
          <li><a href="?resp=seguridad">Seguridad</a></li>
          <li><a href="?resp=obtenerInfo">Mi cuenta</a></li>
          </ul>-->

      <div class="dropdown_menu">
        <li><a href="hero">Home</a></li>
        <li><a href="Borrame.html">About</a></li>
        <li><a href="Borrame.html">Service</a></li>
        <li><a href="Borrame.html">Contactanos</a></li>
        <li><a href="#" class="action_btn">Login</a></li>
      </div>
    </header>

    <main>
       <div class="top-tittle">
        <h1>Tarjetas regalo electrónicas más vendidas</h1>    
       </div> 
       <section id="hero">
        <div class="product-container">
        <?php// Obtener los productos desde la base de datos (supongamos que la función obtenerProductos existe)?>
          <?php $Listproduct = $this->Product->obtenerProductos();?>

          <?php 
if(!empty($Listproduct)){ 
  foreach($Listproduct as $productos){ 
    echo '<div class="prod_box">';
    echo '<img class="image" src="' . $productos->Image_URL . '" alt="' . $productos->Nombre_Producto . '">';
    echo '<h3>' . $productos->Nombre_Producto . '</h3>';
    echo '<p>' . $productos->Descripcion . '</p>';
    echo '<span class="price">$' . $productos->Precio . '</span>';
    echo '<form method="post" action="View/Usuario/cart.php">';
    echo '<input name="img" type="hidden" id="img" value="' . $productos->Image_URL . '">';
    echo '<input name="nombre_product" type="hidden" id="nombre_product" value="' . $productos->Nombre_Producto . '">';
    echo '<input name="descripcion" type="hidden" id="descripcion" value="' . $productos->Descripcion . '">';
    echo '<input name="precio" type="hidden" id="precio" value="' . $productos->Precio . '">';
    echo '<input name="cantidad" type="hidden" id="cantidad" value="1">';
    echo '<button class="action_btn" type="submit" name="agregar">Añadir al carrito</button>';
    echo '</form>';
    echo '</div>';
  }
} else {
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