<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.6.4.slim.js" defer></script>
    <script src="js/bootstrap/bootstrap.min.js" defer></script>
    <script src="app/proceDatosFactura.js" defer></script>
    <title>Mostrar datos de la factura</title>
</head>
<body>

    <header id="encabezado">
        <h1 class="text-center">+++ FACTURA DE VENTA +++</h1>
    </header>

    <nav></nav>

    <main>

        <?php 
            session_start();
            require_once('model/customer.php');
            require_once('model/product.php');

            //datos del cliente
            $datosCliente = $_SESSION['cliente'];
            //objeto con los datos del cliente
            $objetoCliente = new Customer($datosCliente[0], $datosCliente[1], $datosCliente[2], $datosCliente[3]);

            //objetos con los datos del producto
            $datosProductos = $_SESSION['producto'];
            $totalPrecio = 0.0;
        ?>

        <!--Mostrar datos de la factura-->
        <div class="container mt-3" id="resumenFactura">
            <div class="card card-contenedor">
                <div class="card-body">
                    <h3 class="text-center">*******RESUMEN TOTAL FACTURA DE COMPRA*******</h3>
                    <!--ver los datos del cliente-->
                    <div class="container mt-3">
                        <h4 class="text-center">Datos del CLIENTE</h4>
                        <table class="table table-success table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nro de la Factura</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Nro de la C.C</th>
                                    <th scope="col">Fecha de Creación</th>
                                </tr>
                            </thead>
                            <tbody id="cuerpoTablaCliente">
                                <tr>
                                    <td><?php echo $objetoCliente -> getNumFactura(); ?></td>
                                    <td><?php echo $objetoCliente -> getNombre(); ?></td>
                                    <td><?php echo $objetoCliente -> getNumCedula(); ?></td>
                                    <td><?php echo $objetoCliente -> getFecha(); ?></td>
                                </tr>    
                            </tbody>
                        </table>
                    </div>

                    <!--ver los datos del producto-->
                    <div class="container mt-3">
                        <h4 class="text-center">Datos del PRODUCTO</h4>
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre Producto</th>
                                    <th scope="col">Valor Unitario</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody id="cuerpoTablaProducto">
                                <?php foreach($datosProductos as $producto) {
                                    $objetoProducto = new Product($producto[0], $producto[1], $producto[2], $producto[3]);
                                    $totalPrecio += $objetoProducto -> getTotal();
                                ?>
                                    <tr>
                                        <td><?php echo $objetoProducto -> getNombreProducto(); ?></td>
                                        <td><?php echo $objetoProducto -> getValorUnitario(); ?></td>
                                        <td><?php echo $objetoProducto -> getCantidad(); ?></td>
                                        <td><?php echo $objetoProducto -> getTotal(); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="container mt-2 grupoBotoInf">
                        <a  href="index.php" type="button" class="btn btn-primary REGRESAR">NUEVA FACTURA</a>
                        <button type="button" class="btn btn-danger guardarFactura">GUARDAR FACTURA</button>

                        <!--Mostrar resulatdos de la compra-->
                        <div class="container resultado">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="colun">Subtotal</td>
                                        <td class="colun" id="subtotal"><?php echo $totalPrecio; ?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="colun">Iva: 19%</td>
                                        <td class="colun" id="iva"><?php echo ($totalPrecio * 0.19); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="colun">Valor Total</td>
                                        <td class="colun" id="valorTotal"><?php echo ($totalPrecio * 1.19); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--mensaje de guardar los datos-->
                    <div class="container mensaje mt-3">
                        <h5 id="mensaje1"></h5>
                    </div>
                    
                </div>
            </div>
        </div>

    </main>


    <footer></footer>

</body>
</html>