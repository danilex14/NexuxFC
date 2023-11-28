
function agregarUser() {
    document.getElementById("registrarUsuario").addEventListener("click", function () {

        pass1 = document.querySelector('#passRegistro1').value;
        pass2 = document.querySelector('#passRegistro2').value;
        nombre = document.querySelector('#nombreRegistro').value;
        //alert("registro");

        if ((pass1 === pass2) && (pass1.length >= 6) && (nombre.length > 3)) {
            var registro = {
                funcion: "registrarUsuario",
                nom: nombre,
                documento:document.querySelector('#docRegistro').value,
                apellido: document.querySelector('#apellidoRegistro').value,
                apellido2: document.querySelector('#apellidoRegistro2').value,
                nacimiento: document.querySelector('#nacimientoRegistro').value,
                direccion: document.querySelector('#direccionRegistro').value,
                mail: document.querySelector('#emailRegistro').value,
                telefono: document.querySelector('#telefonoRegistro').value,
                pass: document.querySelector('#passRegistro1').value
            }
            $.ajax({
                url: "src/crud.php",
                type: "POST",
                data: registro,
            }).done(function(respuesta) {
                alert("Usuario Agregado")
                location.reload(true);
              })
              .fail(function(respuesta) {
                alert("No se ha podido cambiar el mensaje " + respuesta);
              });

            //alert("Iguales");
        } else {
            alert("No El registro no esta correcto")
        }





    });

}

