<?php
    header("Location:../listaFactura.php");
    session_start();

    $datosFactura = $_POST;
    $nuevoDatosFactura = [];

    foreach($datosFactura as $clienteProducto) {

        array_push($nuevoDatosFactura, $clienteProducto);

    }

    //obtengo solo los datos del cliente
    $datosCliente = $nuevoDatosFactura[0];
    
    //obtengo solo los datos del productos
    $datosProductos = $nuevoDatosFactura;
    unset($datosProductos[0]); //Borrar el objeto que esta en la prmimera posicion

    $_SESSION['cliente'] = $datosCliente;
    $_SESSION['producto'] = $datosProductos;
    
?>