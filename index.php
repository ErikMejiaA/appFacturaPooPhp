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
    <script src="app/app.js" defer></script>
    <title>Datos del la factura</title>
</head>
<body>

    <header id="encabezado">
        <h1 class="text-center">+++ FACTURA DE VENTA +++</h1>
    </header>

    <nav></nav>

    <main>
        <!--Primera parte de la factura-->
        <div class="container mt-3" id="facturaCompra">
            <div class="card card-contenedor">
                <h5 class="card-header text-center">REGISTRO DE LA FACTURA</h5>
                <div class="card-body">
                    <form action="scripts/save-encabezado.php" method="post">
                        <div class="container mt-3">
                            <div class="card cuerpoCarta1">
                                <div class="card-body">
                                    <div id="headerCliente" method="post" action="">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="numFactura" class="form-label">Nro de la Factura:</label>
                                                    <input type="number" class="form-control" id="numFactura" name="cliente[]" min="0"/>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="nombre" class="form-label">Nombre Cliente:</label>
                                                    <input type="text" class="form-control" id="nombre" name="cliente[]"/>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="numCedula" class="form-label">Nro de la CC:</label>
                                                    <input type="number" class="form-control" id="numCedula" name="cliente[]" min="0"/>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="fecha" class="form-label">Fecha:</label>
                                                    <input type="date" class="form-control fecha" id="fecha" name="cliente[]" readonly/> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container mt-4">
                            <div class="card cuerpoCarta">
                                <div class="card-body sumarProducto">
                                        

                                </div>
                            </div>
                        </div>

                        <div class="container d-grid gap-2 mt-3">
                            <button type="button" class="btn btn-dark agregarProducto">+</button>
                        </div>

                        <div class="container mt-2">
                            <button type="submit" class="btn btn-success GUARDAR">GUARDAR DATOS</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </main>


    <footer></footer>

</body>
</html>