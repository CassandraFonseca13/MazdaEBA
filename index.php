<?php include 'informacion.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/login.css" />
  <title>Control Mazda</title>
</head>

<body>
  <div class="header"></div>
  <div class="content">
    <!-- IMAGEN FONDO -->
    <img alt="Large logo in the background" height="400" src="img/fondo.png" width="600" />
    <div class="login-form">
    <?php 
          if (isset($_SESSION['error_message'])){
            echo "<p style=' text-align: center; color:red;'>". $_SESSION['error_message']. "</p>";
            unset($_SESSION['error_message']);
          }
          ?>
      <!-- CAMPOS DE LOGIN -->
      <form action="login.php" method="POST">
        <input placeholder="Usuario" type="text" name="username" required name="usuario" />
        <input placeholder="Contraseña" type="password" name="password" required name="password" />
        <input type="submit" value="Ingresar" />
      </form>
    </div>
  </div>
  <!-- TODO RELLENAR INFORMACION CORRECTA CON FUNCIONES CORRESPONDIENTES  -->
  <footer class="footer">
            <p class="footer__server">Server name: <span style="color:red;"> <?php echo $server_name; ?></span></p>
            <p class="footer__estatus">Estatus De la Conexión:<span style="color:red;"> <?php echo $connection_status; ?></span></p>
            <p class="footer__ip">Ip:<span style="color:red;"> <?php echo $local_ip; ?></span></p>
        </footer>
        </body>

</html>