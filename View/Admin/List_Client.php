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
        <div class="reporte">
        <a href="Reporte_C.php" target="_blank" class="action_btn">Generar Reporte</a>
        </div>
        <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>
      </div>


      <div class="navbar_login">
            <div class="dropdown"><i class='bx bx-menu' ></i>
                <div class="items">
                <li><a href="?resp=Product">Registrar Producto</a></li>
                <li><a href="?resp=Lista_Product">Lista de Productos</a></li>
                <li><a href="?resp=CerrarSesion">Cerrar sesion</a></li>
                </div>
            </div>
      </div>  

      <div class="dropdown_menu">
        <li><a href="hero">Home</a></li>
        <li><a href="Borrame.html">About</a></li>
        <li><a href="Borrame.html">Service</a></li>
        <li><a href="Borrame.html">Contactanos</a></li>
        <li><a href="#" class="action_btn"></a></li>
      </div>
    </header>


      <div class="table-container">
          <table class="table-responsive">
              <thead>
                    <tr> 
                      <th>Id Cliente</th>
                      <th>Nombre del Cliente</th>
                      <th>Usuario</th>
                      <th>Correo</th>
                      <th>Contraseña</th>
                      <th>Telefono</th>
                      <th class="white-text center-align">Eliminar</th>
                      <th class="white-text center-align">Actualizar</th>
                      </tr>
                    <?php foreach ($this->Usuario->listar() as $k) : ?>
                      <tr>
                        <td><?php echo $k->id_cliente; ?></td>
                        <td><?php echo $k->nombre; ?></td>
                        <td><?php echo $k->usuario; ?></td>
                        <td><?php echo $k->correo; ?></td>
                        <td><?php echo $k->contraseña; ?></td>
                        <td><?php echo $k->telefono; ?></td>
                        <td class = "Eliminar">
                          <a href="?resp=dCliente&id_cliente=<?php echo $k->id_cliente; ?>" class="btn red z-depth-4">Eliminar</a>
                        </td>
                        <td>
                          <a href="?resp=ActCliente&id_cliente=<?php echo $k->id_cliente; ?>" class="btn green z-depth-4">Actualizar</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    </thead>
                  </table>
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