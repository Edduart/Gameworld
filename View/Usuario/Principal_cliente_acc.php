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
    <link rel="stylesheet" type="text/css" href="Resources/styleRegistro.css"/>

    <title>Document</title>
  </head>
  <body>
  <header>
        <div class="navbar">
          <div class="logo"><a href="?resp=PrincipalUser">GAMEWORLD</a></div>
            <div class="navbar_login">
            <a href="#" class="action_btn"><?php echo $_SESSION['nombre'] ?></a>
            </div>
          <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>
        </div>

      <!--<div class="dropdown_menu">
        <li><a href="hero">Home</a></li>
        <li><a href="Borrame.html">About</a></li>
        <li><a href="Borrame.html">Service</a></li>
        <li><a href="Borrame.html">Contactanos</a></li>
        <li><a href="#" class="action_btn">Login</a></li>
      </div>-->
    </header>
    <main>
        <section id="hero">
          <div class="wrapper">
            <form method="POST" action="?resp=registrar">
                <h1>Datos del usuario</h1>
                <input type="hidden" name="txtId" value="<?php echo $alm->Id; ?>">
                <div class="input-box">
                    <p1>Usuario</p1>
                    <input type="Usuario" placeholder="Username" name="TxtUsername" id="TxtUsername" value="<?php echo $alm->Username; ?>" required>
                    <box-icon name='user' type='solid' ></box-icon>
                </div>

                <div class="input-box">
                    <p1>Correo</p1>
                    <input type="Correo" placeholder="Email" name="TxtEmail" id="TxtEmail" value="<?php echo $alm->Email; ?>" required>
                    <box-icon name='user' type='solid' ></box-icon>
                </div>

                <div class="input-box">
                    <p1>Nombre</p1>
                    <input type="Nombre" placeholder="Nombre" name="TxtNombre" id="TxtNombre" value="<?php echo $alm->Nombre; ?>" required>
                    <box-icon name='user' type='solid' ></box-icon>
                </div>

                <div class="input-box">
                    <p1>Telefono</p1>
                    <input type="Telefono" placeholder="Telefono" name="TxtTelefono" id="TxtTelefono" value="<?php echo $alm->Telefono; ?>" required>
                    <box-icon name='user' type='solid' ></box-icon>
                </div>

                <div class="input-box">
                    <p1>Direccion de facturacion</p1>
                    <input type="Dir_facturacion" placeholder="Direccion de facturacion" id="TxtDir" name="TxtDir">
                    <box-icon name='user' type='solid' ></box-icon>
                </div>
                
                <button type="submit" class="btn" id="GuardarBtn" disabled> Guardar </button>

                <div>
                  <?php echo $_SESSION['error_message']; ?>
                </div>

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
