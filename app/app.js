//--------variables globales-------------------------
let contarProducto = 0;
const formDatoCliente = document.querySelector('#headerCliente'); // form del cliente
//---------------------------------------------------

document.addEventListener('DOMContentLoaded', () => {
    //funciones a ejecutar cunado se cargue el DOM
    agregarProducto();
    obtenerFechaActual();
});

//name="producto${contarProducto}[]"

const agregarProducto = () => {
    document.querySelector(".agregarProducto").addEventListener('click', (e) => {
        contarProducto ++;
        let sumarProducto = document.querySelector(".sumarProducto");
        let productosHTML = document.createElement('div');
        productosHTML.className = "mt-2";
        productosHTML.innerHTML = /* html */ `
            <div class="card crad-borde" id="eliminar">
                <div class="card-body">
                    <div class="detailProducto" id="${contarProducto}">
                        <div class="row">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="nombreProducto${contarProducto}" class="form-label ">Nombre del Producto:</label>
                                    <input type="text" class="form-control nombreProducto" id="nombreProducto${contarProducto}" name="producto${contarProducto}[]"/> 
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="valorUnitario${contarProducto}" class="form-label ">Valor Unitario:</label>
                                    <input type="number" class="form-control valorUnitario" id="valorUnitario${contarProducto}" name="producto${contarProducto}[]" min="0"/>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="cantidad${contarProducto}" class="form-label ">cantidad:</label>
                                    <input type="number" class="form-control cantidad" id="cantidad${contarProducto}" name="producto${contarProducto}[]" min="0" value="0" readonly/>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="mb-3">
                                    <label for="total${contarProducto}" class="form-label t">Total:</label>
                                    <input type="number" class="form-control total" id="total${contarProducto}" name="producto${contarProducto}[]" value="0" readonly/>
                                </div>
                            </div>
                            <div class="col-2 mt-2">
                                <div class="mb-3 mt-4">
                                    <button type="button" class="btn btn-success aumentar" id="${contarProducto}">+</button>
                                    <button type="button" class="btn btn-danger disminuir" id="${contarProducto}">-</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        sumarProducto.appendChild(productosHTML); 
        aumentarCantidadProducto();
        disminuirCantidadProducto();

        e.stopImmediatePropagation();
        e.preventDefault();
    });
}

//----para llenar la fecha dinamicamente con la fecha actual------------
const obtenerFechaActual = () => {
    formDatoCliente.querySelector(".fecha").valueAsDate = new Date();
}

const aumentarCantidadProducto = () => {
    document.querySelectorAll(".aumentar").forEach((itemBoton) => {
        itemBoton.addEventListener('click', (e) => {
            const formDatosProducto = document.querySelectorAll(".detailProducto"); //form del producto
            formDatosProducto.forEach((frmProducto) => {
                if (frmProducto.id == e.target.id) {
                    console.log("hola mundo");
                    frmProducto.querySelector(".cantidad").value ++; // contar productos, ademas selecionamos un elemnto hijo del elemento padre (en este caso el div)
                    frmProducto.querySelector(".total").value = (frmProducto.querySelector(".valorUnitario").value * frmProducto.querySelector(".cantidad").value);
                }
            });
            
            e.preventDefault();
        });
    });
}

const disminuirCantidadProducto = () => {
    document.querySelectorAll(".disminuir").forEach((itemBoton, op) => {
        itemBoton.addEventListener('click', (e) => {
            const formDatosProducto = document.querySelectorAll(".detailProducto"); //form del producto
            const eliminarCarta = document.querySelectorAll('#eliminar'); // carta que contiene el form
            formDatosProducto.forEach((frmProducto) => {
                if (frmProducto.id == e.target.id) {
                    console.log("hola mundo");
                    frmProducto.querySelector(".cantidad").value --; // restar productos, ademas selecionamos un elemnto hijo del elemento padre (en este caso el div)
                    frmProducto.querySelector(".total").value = (frmProducto.querySelector(".valorUnitario").value * frmProducto.querySelector(".cantidad").value);
                    
                    //remover o eliminar el form o el div cuando la cantidad de articulos sea de cero (0)
                    if (frmProducto.querySelector(".cantidad").value <= 0) {
                        eliminarCarta[op].remove();
                    }
                }
                
            });
            e.preventDefault();
        });
    });
}

