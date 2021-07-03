<?php
include_once '../public/header.php';
?>
<script>
    $(document).ready(function() {
        //console.log("ejecutando");
        function mostrarArticulos() {
            //console.log("mostrar");
            $.ajax({
                data: null,
                url: '../?controlador=Usuario&accion=obtenerIDUsuario',
                type: 'POST',
                success: function(data) {
                    idUsuarioSesion = parseInt(data, 10)
                    var parametros = {
                        idUsuario: idUsuarioSesion
                    };
                    //console.log("parametros " + idUsuarioSesion)
                    $.ajax({
                        type: "GET",
                        data: parametros,
                        url: "https://lenguajesproyecto2.000webhostapp.com/API/carritoAPI.php",
                    }).then(function(data) {
                        //console.log("Entrada: " + data);
                        var producto = JSON.parse(data)
                        let res = document.querySelector('#tbodyCarrito');
                        res.innerHTML = '';
                        var total = 0;
                        producto.forEach(function(element) {
                            total += parseInt(element.total)
                        }); 
                        //console.log(total);
                        producto.forEach(function(element) {
                            res.innerHTML += `
                            <tr>
                                <td id="tdNombre">${element.nombre}</td>
                                <td id="tdTotal">$${element.total}</td>
                            </tr>
                            `
                        });
                        $("#totalPagar").html('Total: $'+total);
                    });
                }
            });
        }
        mostrarArticulos();
    })
</script>
<div class="container">
    <div class="row pt-5 pb-5">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Tu carrito</span>
                <span class="" id="totalArticulos"></span>
            </h4>
            <table class="table table-bordered">
                <tbody id="tbodyCarrito">
                </tbody>
            </table>
            <div class="container row">
            <div class="col-6">
                    <button class="btn btn-danger btn-block " type="button" onclick="finalizarPago();" id="pagar" name="pagar" disabled>Pagar</button>
                </div>
                <div class="col-6">
                    <span id="totalPagar"></span>
                </div>                
            </div>
        </div>
        <div class="col-md-8 order-md-1">
            <div>
                <div class="row">
                    <div class="col-md-6 md-3">
                        <label for="nombre">Nombre del dueño de la tarjeta:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder>
                    </div>
                    <div class="col-md-6 md-3">
                        <label for="numeroTajeta">Número de Tarjeta de Crédito</label>
                        <input type="text" class="form-control" id="numeroTajeta" name="numeroTajeta">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="vencimiento">Vencimiento</label>
                        <input type="text" class="form-control" id="vencimiento" name="vencimiento">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cvv">CVV</label>
                        <input type="password" class="form-control" id="cvv" name="cvv">
                    </div>
                    <div class="col-md-3 mb-3">
                    <span id="validar"></span>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-danger btn-lg btn-block" type="button" onclick="realizarPago($(nombre).val(), $(numeroTajeta).val(), $(vencimiento).val(), $(cvv).val());" id="verificar" name="verificar">Realizar la comprobación</button>
            </div>
        </div>
    </div>
    <!--<div class="row pt-5 pb-5">
        <div class="col-12">
            <form class="needs-validation" novalidate>
                <div>
                    <div class="row">
                        <div class="col-md-6 md-3">
                            <label for="nombre">Nombre del dueño de la tarjeta:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder>
                        </div>
                        <div class="col-md-6 md-3">
                            <label for="numeroTajeta">Número de Tarjeta de Crédito</label>
                            <input type="text" class="form-control" id="numeroTajeta" name="numeroTajeta">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="vencimiento">Vencimiento</label>
                            <input type="text" class="form-control" id="vencimiento" name="vencimiento">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cvv">CVV</label>
                            <input type="password" class="form-control" id="cvv" name="cvv">
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-danger btn-lg btn-block" type="button" onclick="realizarPago();">Realizar la comprobación</button>
                </div>
            </form>
        </div>
    </div>-->
</div>
<?php
include_once '../public/footer.php'
?>
