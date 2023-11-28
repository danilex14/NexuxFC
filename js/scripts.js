function carrito_guardar(nombre, precio, id_interno, stock, user_interno,id_producto) {
    var carro = {
        id: id_interno,
        pre: precio,
        nom: nombre,
        st: stock,
        usuario: user_interno,
        id_prod: id_producto,
        acceso:'guardarCarro'
    }

    $.ajax({
        url: "src/cargarCarro.php",
        type: "POST",
        data: carro
    }).done(function(respuesta) {
        alert("Producto agregado")
        location.reload(true);
        
      })
      .fail(function(respuesta) {
        alert("No se ha podido cambiar el mensaje " + respuesta);
      });;
}

function eliminardelcarro(id_usuario,producto){
  var datos={
    id:id_usuario,
    pro:producto,
    acceso:'eliminarCarro'
  }
  $.ajax({
    url: "cargarCarro.php",
    type: "POST",
    data: datos
}).done(function(respuesta) {
  alert("Producto eliminado")
  location.reload(true);
  
  })
  .fail(function(respuesta) {
    alert("No se ha podido eliminar el producto " + respuesta);
  });;
}

function carrito_guardar2(nombre, precio, id_interno, stock, user_interno,id_producto) {
  var prueba=obtenerValorCookie('usuario');
  var carro = {
      id: id_interno,
      pre: precio,
      nom: nombre,
      st: stock,
      usuario: prueba,
      id_prod: id_producto,
      acceso:'guardarCarro'
  }

  $.ajax({
      url: "cargarCarro.php",
      type: "POST",
      data: carro
  }).done(function(respuesta) {
    alert("Producto agregado")
    location.reload(true);
    })
    .fail(function(respuesta) {
      alert("No se ha podido cambiar el mensaje " + respuesta);
    });;
}

function obtenerValorCookie(nombreCookie) {
  var cookies = document.cookie.split(';');

  for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i].trim();
    
    if (cookie.startsWith(nombreCookie + '=')) {
      var valor = cookie.substring(nombreCookie.length + 1);
      return decodeURIComponent(valor);
    }
  }

  return null;
}

function contarProductos(){

}
