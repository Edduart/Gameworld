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
        <div class="logo"><a href="#">GAMEWORLD</a></div>
        <ul class="links">
          <li><a href="hero">template</a></li>
          <li><a href="Borrame.html">template</a></li>
          <li><a href="#">Carrito (0)</a></li>
          <li><a href="#">Mi cuenta</a></li>
        </ul>
        <a href="#" class="action_btn"><?php echo $_SESSION['nombre'] ?></a>
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
            <h1>Welcome</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia quasi fugiat quaerat debitis aspernatur sit pariatur corrupti delectus non eius.</p>
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
