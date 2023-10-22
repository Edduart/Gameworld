<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href=".../Resources/stylePrincipal.css" />
    <title>Pagina principal</title>
  </head>
  <body>
    <header>
      <div class="navbar">
        <div class="logo"><a href="?resp=index">GAMEWORLD</a></div>
        <form class="search_container">
          <input class="search_bar" type="text" placeholder="Search..">
          <ul>
            <li><a href="#">Buscar</a></li>
          </ul>
        </form>
        <div class="navbar_login">
          <a href="?resp=Registro" class="action_btn">Registrate</a>
          <a href="?resp=sesion" class="action_btn">Login</a>
        </div>
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

      toggleBtn.onclick = function() {
        dropDownMenu.classList.toggle("open");
        const isOpen = dropDownMenu.classList.contains("open");
      };
    </script>
  </body>
</html>