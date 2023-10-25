<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="Resources/StylePagos.css" />
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body>
  <header>
    <div class="navbar">
      <div class="logo"><a href="?resp=PrincipalUser">GAMEWORLD</a></div>

      <div class="toggle_btn"><i class="fa-solid fa-bars"></i></div>
    </div>

  </header>


  <div class="Container-Tabla">
    <div class="Tabla">
      <img src="./Resources/Pago.jpg" alt="#">
      <h2>Tarjeta</h2>
      <p>Datos:</p>
      <form method="post" action="?resp=PagoTDD">
        <div class="input-box">
          <input type="text" name="TxtNumero" minlength="16" maxlength="16" placeholder="1234 5678 9012 3456" required>
          <label for="Clave" class="label_group">Numero</label>
        </div>
        <div class="input-box">
          <input type="month" name="TxtFecha" min="2020-01" value="2030-12" required>
          <label for="Clave" class="label_group">Fecha</label>
        </div>
        <div class="input-box">
          <input type="text" name="TxtCcv" minlength="3" maxlength="4" placeholder="123" required>
          <label for="Clave" class="label_group">CCV</label>
        </div>
        <input type="hidden" name="TxtTipo" value="TDD">
        <input type="hidden" name="TxtDescripcion" value="Pago por tarjeta">
        <input type="hidden" name="TxtDescripcionEnvio" value="Envio de la compra">
        <button class="action_btn" type="submit" name="pagar">Pagar</button>
      </form>
    </div>
  </div>
  </div>
</body>

</html>