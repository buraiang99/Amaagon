function buscarAdministrador(usuario, contrasenna) {
  var parametros = { usuario: usuario, contrasenna: contrasenna };
  //console.log(parametros);
  $.ajax({
    data: parametros,
    url: "../?controlador=Administrador&accion=buscarAdmministrador",
    type: "POST",
    success: function (data) {
      comprobacion = parseInt(data, 10);
      //console.log(comprobacion);
      if (comprobacion == 1) {
        $("#resultado").html("Usuario encontrado");
        location.href = "../view/homeAdminView.php";
      } else {
        $("#resultado").html("Usuario no encontrado");
      }

      //console.log("buscando: " + data);
      //window.open('http://127.0.0.1:80/Proyecto2BryanSotoSemestre1Ciclo2021/view/homeAdminView.php', '_blank');
      //location.href = "../view/homeAdminView.php";
    },
  });
} //buscarAdministrador

function registrarAdministrador(usuario, contrasenna) {
  var parametros = { usuario: usuario, contrasenna: contrasenna };
  //console.log(parametros);
  $.ajax({
    data: parametros,
    url: "../?controlador=Administrador&accion=registrarAdmin",
    type: "POST",
    success: function (data) {
      //$("#resultado").html(data);
      //console.log(data);
      comprobacion = parseInt(data, 10);
      if (comprobacion == 1) {
        $("#resultado").html("Administrador nuevo registrado");
        document.getElementById("usuario").value = "";
        document.getElementById("contrasenna").value = "";
      } else {
      }
    },
  });
} //registrarAdministrador

function regitrarUsuario(nombre, contrasenna, direccion, edad) {
  var select = document.getElementById("generoList").value;
  var genero = "";
  if (select == "Masculino") {
    genero = "M";
  } else {
    if (select == "Femenino") {
      genero = "F";
    }
  }
  var parametros = {
    nombre: nombre,
    contrasenna: contrasenna,
    edad: edad,
    genero: genero,
    direccion: direccion,
  };
  $.ajax({
    type: "POST",
    data: parametros,
    url: "http://127.0.0.1:80/APIREST/API/usuarioAPI.php",
  }).then(function (data) {
    $("#resultado").html(data);
  });
} //regitrarUsuario

function iniciarSesionUsuario(nombre, contrasenna) {
  var parametros = { nombre: nombre, contrasenna: contrasenna };
  //console.log(parametros);
  $.ajax({
    type: "GET",
    data: parametros,
    url: "http://127.0.0.1:80/APIREST/API/usuarioAPI.php",
  }).then(function (data) {
    //console.log("Entrada: "+data);
    var producto = JSON.parse(data);
    guardarSesion(producto[0].id_usuario, producto[0].nombre);
    if (data.length > 4) {
      $("#resultado").html("Sesion Iniciada");
      //window.open('http://127.0.0.1:80/Proyecto2BryanSotoSemestre1Ciclo2021/view/homeView.php', '_blank');
      location.href = "../view/homeView.php";
    }
  });
} // iniciarSesionUsuario

function guardarSesion(idUsuario, nombre) {
  var parametros = { idUsuario: idUsuario, nombre: nombre };
  //console.log("datos"+parametros);
  $.ajax({
    data: parametros,
    url: "../?controlador=Usuario&accion=iniciarSesion",
    type: "POST",
    success: function (data) {
      //console.log("Sesion guardada: " + data);
    },
  });
} //guardarSesion

function mostrarProductos(producto) {
  //console.log(document.getElementById("listaCategorias").value);
  //console.log(producto);
  if (
    (producto == null) &
    (document.getElementById("listaCategorias").value ==
      "Seleccione la categoria")
  ) {
    parametros = null;
    //console.log("primer: " + parametros);
  } else {
    if (
      (producto != null) &
      (document.getElementById("listaCategorias").value ==
        "Seleccione la categoria")
    ) {
      var parametros = { nombre: producto };
      //console.log("segundo" + parametros);
    } else {
      if (
        (parametros != null) &
        (document.getElementById("listaCategorias").value !=
          "Seleccione la categoria")
      ) {
        var parametros = {
          nombre: producto,
          categoriaID: document.getElementById("listaCategorias").value,
        };
        //console.log("tercero" + parametros);
      } else {
        var parametros = {
          categoriaID: document.getElementById("listaCategorias").value,
        };
        //console.log("cuarto" + parametros);
      }
    }
  }
  //console.log(parametros);
  $.ajax({
    type: "GET",
    data: parametros,
    url: "http://127.0.0.1:80/APIREST/API/productoAPI.php",
  }).then(function (data) {
    var producto = JSON.parse(data);
    //console.log(producto);
    //console.log(producto[1].nombre);
    let res = document.querySelector("#tbodyProducto");
    res.innerHTML = "";
    producto.forEach(function (element) {
      res.innerHTML += `
      <tr>
        <th id="thID" scope="row">${element.id_producto}</th>
        <td id="tdNombre">${element.nombre}</td>
        <td id="tdPrecio">$${element.precio}</td>
        <td id="tdDescripcion">${element.descripcion}</td>
        <td><input type="number" class="form-control" id="cantidad${element.id_producto}" name="cantidad${element.id_producto}"></td>
        <td><button type="button" class="btn btn-danger" href="javascript:;" onclick="agregarAlCarrito(${element.id_producto},$('#cantidad${element.id_producto}').val());" id="agregar" name="agregar">Agregar</button></td>
      </tr>
      `;
      //console.log(element.nombre);
    });
  });
} //mostrarProductos

function abrirCarrito(id_Usuario) {
  $.ajax({
    data: null,
    url: "../?controlador=Usuario&accion=obtenerIDUsuario",
    type: "POST",
    success: function (data) {
      idUsuarioSesion = parseInt(data, 10);
      var parametros = { idUsuario: idUsuarioSesion };
      $.ajax({
        type: "GET",
        data: parametros,
        url: "http://127.0.0.1:80/APIREST/API/carritoAPI.php",
      }).then(function (data) {
        var producto = JSON.parse(data);
        let res = document.querySelector("#tbodyCarrito");
        res.innerHTML = "";
        producto.forEach(function (element) {
          res.innerHTML += `
          <tr>
            <td id="tdID">${element.id_producto}</td>
            <td id="tdNombre">${element.nombre}</td>
            <td id="tdPrecio">$${element.precio}</td>
            <td id="tdCantidad">${element.cantidad}</td>
            <td><button type="button" class="btn btn-primary" href="javascript:;" onclick="" id="eliminar" name="eliminar">Eliminar</button></td>
          </tr>
          `;
          //console.log(element.nombre);
        });
      });
    },
  });
  
} //abrirCarrito

function agregarAlCarrito(id_producto, total) {
  $.ajax({
    data: null,
    url: "../?controlador=Usuario&accion=obtenerIDUsuario",
    type: "POST",
    success: function (data) {
      //console.log("datos"+data)
      idUsuarioSesion = parseInt(data, 10);
      //console.log("idUsuarioSesion "+idUsuarioSesion)
      var parametros = {
        idproducto: id_producto,
        idUsuario: idUsuarioSesion,
        cantidad: total,
      };
      /*console.log(
        "parametros " + id_producto + ", " + idUsuarioSesion + ", " + total
      );*/
      $.ajax({
        type: "POST",
        url: "http://127.0.0.1:80/APIREST/API/carritoAPI.php",
        data: parametros,
      }).then(function (data) {
        //console.log(data);
        window.alert(data);
      });
    },
  });
} //agregarAlCarrito

function obtenerUsuario() {
  $.ajax({
    data: null,
    url: "../?controlador=Usuario&accion=obtenerIDUsuario",
    type: "POST",
    success: function (data) {
      //console.log("datos" + data);
      idUsuarioSesion = parseInt(data, 10);
      //console.log("idUsuarioSesion " + idUsuarioSesion);
    },
  });
} //obtenerUsuario

function registrarProducto(
  nombreProducto,
  precioProducto,
  descripcionProducto,
  total
) {
  var parametros = {
    nombre: nombreProducto,
    precio: precioProducto,
    descripcion: descripcionProducto,
    idCategoria: document.getElementById("listaCategorias").value,
    cantidad: total,
  };
  //console.log(parametros);
  $.ajax({
    data: parametros,
    url: "../?controlador=Producto&accion=registrarProducto",
    type: "POST",
    success: function (data) {
      var result = parseInt(data, 10);
      if (result == 1) {
        $("#resultado").html("Producto registrado");
        document.getElementById("nombreProducto").value = "";
        document.getElementById("cantidad").value = "";
        document.getElementById("precio").value = "";
        document.getElementById("descripcion").value = "";
      } else {
        $("#resultado").html("Error al registrar");
      }

      //console.log(data);
    },
  });
} //registrarProducto

function registrarCategoria(nombreCategoria) {
  var parametros = { nombre: nombreCategoria };
  //console.log(parametros);
  $.ajax({
    data: parametros,
    url: "../?controlador=Categoria&accion=registrarCategoria",
    type: "POST",
    success: function (data) {
      //$("#resultado").html(data);
      //console.log(data);
      mostrarCategoria();
    },
  });
} // registrarCategoria

function mostrarCategoria() {
  $.ajax({
    type: "GET",
    data: null,
    url: "http://127.0.0.1:80/APIREST/API/categoriaAPI.php",
  }).then(function (data) {
    var datos = JSON.parse(data);
    let res = document.querySelector("#tbodyCategoria");
    //var cont = 1;
    datos.forEach(function (element) {
      res.innerHTML = "";
      datos.forEach(function (element) {
        res.innerHTML += `
                <tr>
                    <td id="tdID">${element.id_categoria}</td>
                    <td id="tdNombre">${element.nombre}</td>
                </tr>
                `;
      });
    });
  });
} //mostrarCategoria

function eliminarCarrito(id_producto) {
  $.ajax({
    data: null,
    url: "../?controlador=Usuario&accion=obtenerIDUsuario",
    type: "POST",
    success: function (data) {
      //console.log("datos"+data)
      idUsuarioSesion = parseInt(data, 10);
      //console.log("idUsuarioSesion "+idUsuarioSesion)
      var parametros = { idUsuario: idUsuarioSesion, idproducto: id_producto };
      //console.log("parametros " + id_producto + ", " + idUsuarioSesion);
      $.ajax({
        //method: "DELETE",
        type: "GET",
        url: "http://127.0.0.1:80/APIREST/API/carritoAPI.php",
        data: parametros,
      }).then(function (data) {
       //console.log(data);
        location.href = "../view/carritoView.php";
      });
    },
  });
} //eliminarCarrito

function checkout() {
  $.ajax({
    data: null,
    url: "../?controlador=Usuario&accion=obtenerIDUsuario",
    type: "POST",
    success: function (data) {
      //console.log("datos" + data);
      idUsuarioSesion = parseInt(data, 10);
      var data = { idUsuario: idUsuarioSesion };
      $.ajax({
        type: "GET",
        data: data,
        url: "http://127.0.0.1:80/APIREST/API/checkoutAPI.php",
      }).then(function (data) {
        //console.log(data);
        var datos = parseInt(data, 10);
        if (datos == 0 & idUsuarioSesion != 0) {
          window.alert("Checkout correcto");
          document.getElementById("pago").disabled = false;
          document.getElementById("check").disabled = true;
          //location.href = "../view/carritoView.php"
        } else {
          window.alert("Un o varios artículos no se encuentran disponibles o debes iniciar sesion");
        }
      });
    },
  });
} //checkout

function simularPago() {
  location.href = "../view/pagoTarjetaView.php";
} // simularPago

function realizarPago(nombre, numero, vencimiento, cvv) {
  if ((nombre != "") & (numero != "") & (vencimiento != "") & (cvv != "")) {
    document.getElementById("pagar").disabled = false;
    document.getElementById("verificar").disabled = true;
    $("#validar").html("Datos verificados correctamente");
  } else {
    $("#validar").html("Error al verificar");
  }
} //realizarPago

function finalizarPago() {
  $.ajax({
    data: null,
    url: "../?controlador=Usuario&accion=obtenerIDUsuario",
    type: "POST",
    success: function (data) {
      idUsuarioSesion = parseInt(data, 10);
      var parametros = {
        idUsuario: idUsuarioSesion,
      };
      $.ajax({
        type: "GET",
        data: parametros,
        url: "http://127.0.0.1:80/APIREST/API/carritoAPI.php",
      }).then(function (data) {
        var producto = JSON.parse(data);
        var total = 0;
        producto.forEach(function (element) {
          total += parseInt(element.total);
        });

        var parametros = { idUsuario: idUsuarioSesion,cantidad: total}

        $.ajax({
          type: "POST",
          data: parametros,
          url: "http://127.0.0.1:80/APIREST/API/ordenAPI.php",
        }).then(function (data) {
          //var producto = JSON.parse(data);
          var total = parseInt(data);
          //console.log(data)
          if (total == 0) {
            location.href = "../view/homeView.php"
          } else {
            window.alert("Error no se puedo realizar la transacción");
          }
        });
      });
    },
  });
} //finalizarPago

function volverInicio() {
  location.href = "../view/homeView.php";
}