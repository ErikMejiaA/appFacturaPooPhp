//----variable globales--------------
// para almacenar los datos del cliente y del producto registrados en el formulario
let datosCliente = [];
let datosProducto = [];
//----------------------------------

document.addEventListener('DOMContentLoaded', () => {
    //van las funciones a ejecutar
    guardarDatos();

});

//--------guardar datos de la factura------------
const guardarDatos = () => {
    document.querySelector(".guardarFactura").addEventListener('click', (e) => {
        //enviarDatosForm();
        document.querySelector('#mensaje1').innerHTML = "Los datos fueron guardados correctamente";
    });
} 

//+++++++++Esto ya no es necesario para objetos con  PHP, ya debe ser de otra forma diferente++++++++++++++

//----cabecera del metodo------------------------ 
let config = {
    headers : new Headers({
        "Content-Type" : "application/json"
    }),
}

//-----metodo (POST) para enviar datos a PHP
async function postFactura(datos) {
    config.method = "POST";
    config.body = JSON.stringify(datos);
    let res = await ( await fetch("scripts/save-datos.php", config)).json();
    //console.log(res);
    return res;
}

function enviarDatosForm() {
    let data = {
        cliente : datosCliente,
        producto : datosProducto
    };

    postFactura(data)
        .then((res) => {
            console.log(res)
            mostarDatosFactura(JSON.stringify(res));
        })
}

//mostrar los datos que vienen de php
const mostarDatosFactura = (respuesta) => {
    //document.querySelector('#result').innerHTML = respuesta;
    //reiniciamos los valores de los array despues de envia los datos a php
    datosCliente = [];
    datosProducto = [];
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++