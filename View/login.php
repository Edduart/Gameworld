<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"  href="Resources/style.css"/>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>

    <header>
    <div class="navbar">
        <div class="logo"><a href="?resp=index">GAMEWORLD</a></div>
          <div class="navbar_login">
          <a href="?resp=Registro" class="action_btn">Registrate</a>
          <a href="?resp=sesion" class="action_btn">Login</a>
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

    <div class="wrapper">
        <form method="POST" action="?resp=login">
            <h1>Login</h1>
            <div class="input-box">
                <input type="Usuario" placeholder="Usuario" name="TxtUsuario" required>
                <box-icon name='user' type='solid' ></box-icon>
            </div>

            <div class="input-box">
                <input type="Clave" placeholder="Contraseña" name="TxtClave" required>
                <box-icon name='lock-alt'></box-icon>
            </div>

            <div class="remember-forgot">
                <label> <input type="checkbox"> Recuerda mis datos</label>
                <a href="#">Olvidaste tu clave?</a>
            </div>

            <button type="submit" class="btn"> Login </button>

            <div class="register-link">
                <p>Aun no tienes una cuenta? <a href="?resp=Registro">Registrate</a></p>
            </div>

            <div>
                <?php 
                    echo $_SESSION['error_message'];
                ?>
            </div>
        </form>
    </div>

</body>
</html>