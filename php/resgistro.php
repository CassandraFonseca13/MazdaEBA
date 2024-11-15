<?php
include '../informacion.php';



// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // Variables compartidas para todos los casos
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre'] ?? '');
    $folio = mysqli_real_escape_string($conn, $_POST['folio'] ?? '');
    $fechaPrestamo = mysqli_real_escape_string($conn, $_POST['fechaPrestamo'] ?? '');
    $fechaEntrega = mysqli_real_escape_string($conn, $_POST['fechaEntrega'] ?? '');
    $estado = mysqli_real_escape_string($conn, $_POST['estado'] ?? '');
    $sku = mysqli_real_escape_string($conn, $_POST['sku'] ?? '');
    $herramienta = mysqli_real_escape_string($conn, $_POST['herramienta'] ?? '');
    $cantidad = intval($_POST['cantidad'] ?? 1);

    switch ($action) {
        case 'buscarFolio':
            $folioBuscar = mysqli_real_escape_string($conn, $_POST['folioBuscar'] ?? '');
            $stmt = $conn->prepare("SELECT * FROM prestamos_herramientas WHERE numero_folio = ?");
            $stmt->bind_param("s", $folioBuscar);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $prestamo = $result->fetch_assoc(); // Guardar datos del préstamo para prellenar el formulario de edición
            } else {
                $error = "No se encontró el folio.";
            }
            $stmt->close();
            break;

        case 'editar':
            if ($folio && $nombre && $fechaPrestamo && $fechaEntrega && $estado && $sku && $herramienta && $cantidad) {
                $stmt = $conn->prepare("UPDATE prestamos_herramientas SET nombre_empleado = ?, fecha_prestamo = ?, fecha_entrega = ?, estado = ?, sku = ?, herramienta = ?, cantidad = ? WHERE numero_folio = ?");
                $stmt->bind_param("ssssssis", $nombre, $fechaPrestamo, $fechaEntrega, $estado, $sku, $herramienta, $cantidad, $folio);
                $stmt->execute();
                $stmt->close();
                header("Location: resgistro.php");
                exit();
            }
            break;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="../css/registro.css">
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../Boostrap/css/bootstrap.min.css">

  
</head>
<body>
  <div class="header">
    <!-- IMAGEN DE USUARIO -->
    <div class="user-info">
      <img alt="User profile picture" src="../img/usuarioCirculo.png" class="imagenUsuario" />
      <div>
        <div id="TextoUsuario">Usuario : <span style="color:red;"><?php echo htmlspecialchars($username); ?></span></div>
        <img alt="Mazda logo" src="../img/nombre2.png" class="logo" />
      </div>
    </div>
    <div class="date" id="fecha">
      <?php echo date("l jS F Y"); ?>
    </div>
    <div class="icons">
      <img src="../img/eliminar.png" alt="eliminar" data-bs-toggle="modal" data-bs-target="#modalEliminar" />
      <img src="../img/ver.png" alt="crear" data-bs-toggle="modal" data-bs-target="#modalAgregar" />
      <img src="../img/editar.png" alt="editar" data-bs-toggle="modal" data-bs-target="#modalBuscarFolio" />
      <img id="iconoModificar" src="../img/regreso.png" alt="modificar" /> 
    </div>
  </div>

  <!-- MENU LATERAL -->
  <div class="sidebar">
    <a href="menu.html"><img src="../img/vale.png" alt="nuevo" /></a>
    <div class="search-box">
      <input placeholder="Search" type="text" />
    </div>
    <a href=""> <img src="../img/guardar.png" alt="guardar" /></a>
    <a href=""> <img src="../img/imprimir.png" id="table" onclick="printTable()"></a>       
  </div>

  <!-- CONTENIDO PRINCIPAL -->
  <div class="content">
    <?php if (isset($error)): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <form action="agregar_prestamo.php" method="post" class="form">
      <input type="hidden" name="action" value="agregar">
      <div class="linea1">
        <input placeholder="Nombre de Empleado" type="text" class="empleado" name="nombre" required />
      </div>
      <div class="linea2">
        <input placeholder="Numero de folio" type="text" class="numero" name="folio" required />
        <input placeholder="Fecha de Prestamo" type="date" class="fechaPrestamo" name="fechaPrestamo" required />
        <input placeholder="Fecha de Entrega" type="date" class="fechaEntrega" name="fechaEntrega" required />
        <select name="estado" required>
          <option value="Entregado">Entregado</option>
          <option value="Pendiente">Pendiente</option>
        </select>
      </div>
      <div class="linea3">
        <input placeholder="SKU" type="text" class="sku" name="sku" required />
        <input placeholder="Herramienta" type="text" class="herramienta" name="herramienta" required />
        <input placeholder="Cantidad" type="number" class="cantidad" name="cantidad" min="1" required />
      </div>
      <button type="submit" class="clickeable">Agregar</button>
    </form>

    <!-- TABLA DE RESULTADOS -->
    <div class="table-container">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nombre de Empleado</th>
            <th>Numero de Folio</th>
            <th>Fecha de Prestado</th>
            <th>Fecha de Entrega</th>
            <th>Estado</th>
            <th>SKU</th>
            <th>Herramienta</th>
            <th>Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($conn) {
              $result = mysqli_query($conn, "SELECT * FROM prestamos_herramientas");
              if ($result && mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>" . htmlspecialchars($row['nombre_empleado']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['numero_folio']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['fecha_prestamo']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['fecha_entrega']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['estado']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['sku']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['herramienta']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['cantidad']) . "</td>";
                      echo "</tr>";
                  }
              } else {
                  echo "<tr><td colspan='8'>No hay registros disponibles.</td></tr>";
              }
          } else {
              echo "<tr><td colspan='8'>Conexión cerrada o inválida</td></tr>";
          }
          ?>
        </tbody>
      </table>
      <script>
function printTable() {
    // Selecciona la tabla que deseas imprimir
    const table = document.querySelector('.table-container').innerHTML;
    
    // Abre una nueva ventana de impresión
    const printWindow = window.open('', '', 'height=500,width=800');
    printWindow.document.write('<html><head><title>Imprimir Tabla</title>');
    printWindow.document.write('<style>');
    printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
    printWindow.document.write('th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }');
    printWindow.document.write('th { background-color: #f2f2f2; }');
    printWindow.document.write('</style></head><body>');
    printWindow.document.write(table);
    printWindow.document.write('</body></html>');
    
    // Cierra el documento y activa la ventana de impresión
    printWindow.document.close();
    printWindow.print();
}
</script>

    </div>
  </div>

  <img alt="Large logo in the background" height="400" src="../img/fondo.png" width="600" class="fondo" />

  <footer class="footer">
    <p class="footer__server">Server name: <span style="color:red;"> <?php echo htmlspecialchars($server_name); ?></span></p>
    <p class="footer__estatus">Estatus De la Conexión: <span style="color:red;"> <?php echo htmlspecialchars($connection_status); ?></span></p>
    <p class="footer__ip">Ip:<span style="color:red;"> <?php echo htmlspecialchars($local_ip); ?></span></p>
  </footer>
  
  <?php  include "modales.php" ?>
  
  <script src="../Js/Script.js"></script>
  <script src="../Boostrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
