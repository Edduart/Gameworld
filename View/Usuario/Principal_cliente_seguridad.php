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
    <link rel="stylesheet" type="text/css" href="Resources/style.css"/>

    <title>Document</title>
  </head>
  <body>
    <header>
      <div class="navbar">
          <div class="logo"><a href="?resp=PrincipalUser">GAMEWORLD</a></div>
            <ul class="links">
              <li><a href="?resp=seguridad">Seguridad</a></li>
              <li><a href="?resp=obtenerInfo">Mi cuenta</a></li>
            </ul>
            <div class="navbar_login">
            <a href="?resp=PrincipalUser" class="action_btn"><?php echo $_SESSION['nombre'] ?></a>
            </div>
          <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>
        </div>

      <!--<div class="dropdown_menu">
        <li><a href="hero">Home</a></li>
        <li><a href="Borrame.html">About</a></li>
        <li><a href="Borrame.html">Service</a></li>
        <li><a href="Borrame.html">Contactanos</a></li>
        <li><a href="#" class="action_btn">Login</a></li>
      </div> -->
    </header>
    <main>
        <section id="hero">
          <div class="wrapper">
            <form method="POST" id="seguridadForm">
                <h1>Cambiar Contraseña</h1>
                <div class="input-box">
                <input type="hidden" name="txtId" value="<?php echo $_SESSION['nombre']; ?>">
                    <p1>Ingrese contraseña actual</p1>
                    <input type="Contraseña_actual" placeholder="Contraseña actual" name="TxtContraseña" id="TxtContraseña" required>
                    <box-icon name='user' type='solid' ></box-icon>
                </div>

                <div class="input-box">
                    <p1>Ingrese contraseña nueva</p1>
                    <input type="Contraseña_nueva" placeholder="Contraseña nueva" name="TxtContraseñaNueva" id="TxtContraseñaNueva" required>
                    <box-icon name='user' type='solid' ></box-icon>
                </div>
                
                <button type="submit" class="btn" id="GuardarBtn"> Guardar </button>

                <p1>Ingrese contraseña para eliminar cuenta</p1>

                <button type="submit" class="btn_warning" id="EliminarBtn"> Eliminar cuenta </button>

                <?php 
                  echo $_SESSION['error_message'];
                ?>
            </form>
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

        document.addEventListener('DOMContentLoaded', function () {
        const seguridadForm = document.getElementById('seguridadForm');
        const guardarBtn = document.getElementById('GuardarBtn');
        const eliminarBtn = document.getElementById('EliminarBtn');

        guardarBtn.addEventListener('click', function () {
            seguridadForm.action = '?resp=seguridadCheck&check=true';
        });

        eliminarBtn.addEventListener('click', function () {
            seguridadForm.action = '?resp=seguridadCheck';
        });
    });
    </script>
  </body>
</html>
