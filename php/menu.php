<?php include '../informacion.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/menu.css" />
  <link rel="stylesheet" href="../css/base.css">
  <title>Menu</title>
</head>

<body>
  <!-- BARRA LOCALIZADA EN LA PARTE SUPERIOR -->
  <div class="header">
    <!-- IMAGEN DE USUARIO -->
    <div class="user-info">
      <img alt="User profile picture" src="..//img/usuarioCirculo.png" class="imagenUsuario" />
      <div>
        <!-- TODO PONER EL NOMBRE DEL USUARIO -->
        <div id="TextoUsuario">Usuario : <span style="color:red;"><?php echo htmlspecialchars($username); ?></span></div> 
        <!-- LOGO DE LA EMPRESA  -->
        <img alt="Mazda logo" src="..//img/nombre2.png" class="logo" />
      </div>
    </div>
    <!-- TODO ACTUALIZAR LA FECHA USANDO LA FUNCION NATIVA DE HTML  -->
    <div class="date" id="fecha">
      <?php echo date("l jS F Y"); ?>
    </div>
  </div>
  <div class="content">
    <!-- IMAGEN DEL MENU LATERAL -->
    <div class="news">
      <img src="../img/mensajes.png" alt="menuLateral" />
    </div>
    <!-- CAMPO DE BOTONES  -->
    <div class="actions">
      <!-- BOTON FUNCIONAL DE CARGAR REGISTRO -->
      <a href="resgistro.php" class="action">
        <img src="..//img/prestamo.png" alt="nota" />
      </a>
      <!-- BOTONES EXTRAS NO FUNCIONALES  -->
      <img src="..//img/sku.png" alt="sku" class="action" />
      <img src="..//img/inventario.png" alt="inventario" class="action" />
      <img src="..//img/devoluciones.png" alt="devoluciones" class="action" />
      <img src="..//img/herramientasBajo.png" alt="herramientas" class="action" />
      <img src="..//img/busqueda.png" alt="busqueda" class="action" />
      <img src="..//img/codigo.png" alt="codigo" class="action" />
    </div>
    <!-- IMAGEN DE CORREOS -->
    <img src="../img/correo.png" alt="mensajes" class="correo">
    <!-- IMAGEN DE FONDO -->
    <img alt="Large logo in the background" height="400" src="../img/fondo.png" width="600" class="fondo" />
  </div>
  <!-- TODO RELLENAR INFORMACION CORRECTA CON FUNCIONES CORRESPONDIENTES  -->
  <footer class="footer">
            <p class="footer__server">Server name: <span style="color:red;"> <?php echo $server_name; ?></span></p>
            <p class="footer__estatus">Estatus De la Conexión:<span style="color:red;"> <?php echo $connection_status; ?></span></p>
            <p class="footer__ip">Ip:<span style="color:red;"> <?php echo $local_ip; ?></span></p>
        </footer>
 

</body>

</html>