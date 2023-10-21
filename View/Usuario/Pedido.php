<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="Resources/style.css" />
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </head>
    <body>
        <header>
            <div class="navbar">
                <div class="logo"><a href="?resp=PrincipalUser">GAMEWORLD</a></div>
                <a href="?resp=PrincipalUser" class="action_btn"><?php echo $_SESSION['nombre'] ?></a>
                <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>
            </div>

            <div class="navbar_login">
            <div class="dropdown"><i class='bx bx-menu' ></i>
                <div class="items">
                    <a href="?resp=CerrarSesion">Cerrar sesion</a>
                    <a href="?resp=seguridad">Seguridad</a>
                    <a href="?resp=obtenerInfo">Mi cuenta</a>
                </div>
            </div>
            
        </header>
        <div class="wrapper">

        </div>
    </body>
</html>