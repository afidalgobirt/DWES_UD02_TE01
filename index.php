<?php
  include('datos.php');

  session_start();

  if (isset($_POST['enviar'])) {
    $idProducto = $_POST['idProducto'];
    $cantidadTemp = $_POST['cantidad'];

    if (isset($_SESSION[$idProducto])) {
      $_SESSION[$idProducto] = ($cantidadTemp == 0) ? 0 : $_SESSION[$idProducto] + $cantidadTemp;
    } else {
      $_SESSION[$idProducto] = $cantidadTemp;
    }
  }
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/estilo.css" />
    </head>
    <body>
      <main class="contenedor">
        <header>
          <h1>Informaci&oacute;n productos</h1>
        </header>
        <section class="cont2">
            <p class= "p">PRODUCTOS</p>
            <p class= "p">CESTA</p>
            <table>
              <thead>
                <tr>
                  <th>ID de Producto</th>
                  <th>Nombre</th>
                  <th>Unidad</th>
                  <th>Descripci&oacute;n</th>
                  <th>Versi&oacute;n</th>
                  <th>Proveedor</th>
                  <th>PVP</th>
                  <th>Descuento</th>
                  <th>Precio con desc.</th>
                  <th>Cantidad</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($productos as $producto) {?>
                  <form method="POST" action=<?php echo $_SERVER['PHP_SELF'];?>>
                    <tr>
                      <td><?php echo $producto->getId(); ?></td>
                      <td><?php echo $producto->getNombre(); ?></td>
                      <td><?php echo $producto->getUnidad(); ?></td>
                      <td><?php echo $producto->getDescripcion(); ?></td>
                      <!-- 
                        Mostrar version / proveedor usando instanceof
                        <td><?php // echo ($producto instanceof SW) ? $producto->getVersion() : ""; ?></td>
                        <td><?php // echo ($producto instanceof HW) ? $producto->getProveedor() : ""; ?></td>
                      -->
                      <td><?php echo (method_exists($producto, "getVersion")) ? $producto->getVersion() : ""; ?></td>
                      <td><?php echo (method_exists($producto, "getProveedor")) ? $producto->getProveedor() : ""; ?></td>
                      <td><?php echo $producto->getPVPUnidad(); ?></td>
                      <td><?php echo $producto->getDescuento(); ?></td>
                      <td><?php echo $producto->aplicarDescuento(); ?></td>
                      <td><?php echo (isset($_SESSION[$producto->getId()])) ? $_SESSION[$producto->getId()] : 0; ?></td>
                      <td><input type="text" name="cantidad" size=2 value="0"></td>
                      <td><input type="submit" name="enviar"></td>
                      <input type="hidden" name="idProducto" value=<?php echo $producto->getId();?>>
                    </tr>
                    </form>
                  <?php }?>
                </tbody>
            </table>

            <table>
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>PVP</th>
                  <th>Descuento</th>
                  <th>Cantidad</th>
                  <th>Importe</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($productos as $producto) {
                      if (isset($_SESSION[$producto->getId()]) && $_SESSION[$producto->getId()] > 0) {
                  ?>
                    <tr>
                      <td><?php echo $producto->getNombre(); ?></td>
                      <td><?php echo $producto->getPVPUnidad(); ?></td>
                      <td><?php echo $producto->getDescuento(); ?></td>
                      <td><?php echo $_SESSION[$producto->getId()]; ?></td>
                      <td><?php echo $producto->aplicarDescuento() * $_SESSION[$producto->getId()]; ?></td>
                    </tr>
                  <?php }}?>
                </tbody>
            </table>  
        </section> 
        <footer>
          <p>BIRT LH</p>
        </footer>
      </main>
    </body>
</html>