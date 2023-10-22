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

    <main>
        <section id="hero">
          <div class="wrapper">
            <form method="POST" id="seguridadForm">
                <h1>Cambiar Contraseña</h1>
                <div class="input-box">
                <input type="hidden" name="txtId" value="<?php echo $_SESSION['nombre']; ?>">

                    <input type="Contraseña_actual" placeholder="" name="TxtContraseña" id="TxtContraseña" required>
                    <label for="Usuario" class="label_group">Contraseña actual</label>
                    <box-icon name='user' type='solid' ></box-icon>
                </div>

                <div class="input-box">

                    <input type="Contraseña_nueva" placeholder="" name="TxtContraseñaNueva" id="TxtContraseñaNueva" required>
                    <label for="Usuario" class="label_group">Contraseña nueva </label>
                    <box-icon name='user' type='solid' ></box-icon>
                </div>
                
                <button type="submit" class="btn" id="GuardarBtn"> Guardar </button>
                <br><br>

                <p1>Ingrese contraseña para eliminar cuenta</p1>
                <br><br>

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
