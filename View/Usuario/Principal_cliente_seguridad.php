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
    <link rel="stylesheet" type="text/css" href="Resources/stylePrincipal.css"/>

    <title>Document</title>
  </head>
  <body>
    <header>
      <div class="navbar">
        <div class="logo"><a href="#">GAMEWORLD</a></div>
        <ul class="links">
          <li><a href="hero">template</a></li>
          <li><a href="?resp=seguridad">Seguridad</a></li>
          <li><a href="#">Carrito (0)</a></li>
          <li><a href="?resp=obtenerInfo">Mi cuenta</a></li>
        </ul>
        <a href="#" class="action_btn"> <?php echo $_SESSION['nombre'] ?> </a>
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
          <div class="wrapper">
            <form method="POST" action="?resp=seguridadCheck">
                <h1>Cambiar Contraseña</h1>
                <div class="input-box">
                <input type="hidden" name="txtId" value="<?php echo $_SESSION['id']; ?>">
                    <p1>Ingrese contraseña actual</p1>
                    <input type="Contraseña_actual" placeholder="Contraseña actual" name="TxtContraseña" id="TxtContraseña" required>
                    <box-icon name='user' type='solid' ></box-icon>
                </div>

                <div class="input-box">
                    <p1>Ingrese contraseña nueva</p1>
                    <input type="Contraseña_nueva" placeholder="Contraseña nueva" name="TxtContraseñaNueva" id="TxtContraseñaNueva" required>
                    <box-icon name='user' type='solid' ></box-icon>
                </div>

                <!--<div class="input-box">
                    <p1>Repita la contraseña nueva</p1>
                    <input type="Nombre" placeholder="Nombre" name="TxtNombre" id="TxtNombre" value="<?php echo $alm->Nombre; ?>" required>
                    <box-icon name='user' type='solid' ></box-icon>
                </div>-->
                
                <button type="submit" class="btn" id="GuardarBtn"> Guardar </button>

                <button type="submit" class="btn" id="GuardarBtn" disabled> Eliminar cuenta </button>

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

        // Obtener referencias a los elementos del formulario
        const TxtUsername = document.getElementById('TxtUsername');
        const TxtEmail = document.getElementById('TxtEmail');
        const TxtNombre = document.getElementById('TxtNombre');
        const TxtTelefono = document.getElementById('TxtTelefono');
        const TxtDir = document.getElementById('TxtDir');
        // Agregar eventos oninput a los campos de entrada
        TxtUsername.addEventListener('input', habilitarGuardar);
        TxtEmail.addEventListener('input', habilitarGuardar);
        TxtNombre.addEventListener('input', habilitarGuardar);
        TxtTelefono.addEventListener('input', habilitarGuardar);
        TxtDir.addEventListener('input', habilitarGuardar);

        // Agregar funciones para habilitar el botón "Guardar"
        function habilitarGuardar() {
            const GuardarBtn = document.getElementById('GuardarBtn');
            // Verificar si algún campo de entrada tiene un valor diferente al valor inicial
            if (
                TxtUsername.value !== "<?php echo $alm->Username; ?>" ||
                TxtEmail.value !== "<?php echo $alm->Email; ?>" ||
                TxtNombre.value !== "<?php echo $alm->Nombre; ?>" ||
                TxtTelefono.value !== "<?php echo $alm->Telefono; ?>" ||
                TxtDir.value !== null
               ) 
            {
                GuardarBtn.disabled = false; // Habilitar el botón
            } else {
                GuardarBtn.disabled = true; // Deshabilitar el botón
            }
        }
    </script>
  </body>
</html>
