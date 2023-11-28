<!-- validar ingreso -->
<?php
$estadoSesion = session_status();
if ($estadoSesion === PHP_SESSION_ACTIVE) {
} else {
  session_start();
}
if ($_SESSION['autenticado'] === 0 || !isset($_COOKIE['duracionSesionAdmin'])) {
  $_SESSION['idItem'] = "";
  header('Location: loguear_admin.php');
}


?>

<!doctype html>
<html lang="es-Cl">

<head>
  <?php include('header.php'); ?>
  <style>
    main {
      margin-right: 5%;
      margin-left: 5%;
    }
  </style>
</head>

<body>
  <header>
    <?php include('nav_adm.php'); ?>

  </header>

  <main>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Leer Mensajes</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Agregar Datos</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Modificar Usuario</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h3>Mensajes</h3>
        <p>No Leídos</p>
        <form action="" method="post">

          <ul class="list-group">
            <?php
            include('conectarDB.php');
            $resultado = mysqli_query($con, "SELECT * FROM contacto where leido=0");
            while ($contacto = mysqli_fetch_assoc($resultado)) {
              $lect = ($contacto['leido'] == 0) ? 'No' : 'Si';
              echo "<li class=\"list-group-item\">";
              echo  "<a id=\"numeroMensaje\">" . $contacto['id_mensaje'] . "</a>)" . "Nombre= " . $contacto['nombre'] .
                "<br>Correo= " . $contacto['correo'] . "<br>Mensaje= " . $contacto['mensaje'] . "<br>Leido";

              echo "<select name=\"leido\" id=\"leido\" class=\"form-control\">";
              if ($lect === 'No') {
                echo  "<option value=\"0\">No</option>";
                echo  "<option value=\"1\">Si</option>";
              } elseif ($lect === 'Si') {
                echo  "<option value=\"1\">Si</option>";
                echo  "<option value=\"0\">No</option>";
              }
              echo "</select>";

              echo "</li>";
            }

            echo "<br><p>Leídos</p>";
            $resultado = mysqli_query($con, "SELECT * FROM contacto where leido=1");
            while ($contacto = mysqli_fetch_assoc($resultado)) {
              $lect = ($contacto['leido'] == 0) ? 'No' : 'Si';
              echo "<li class=\"list-group-item\">";
              echo  "<a id=\"" . $contacto['id_mensaje'] . "\">" . $contacto['id_mensaje'] . "</a>)" . "Nombre= " . $contacto['nombre'] .
                "<br>Correo= " . $contacto['correo'] . "<br>Mensaje= " . $contacto['mensaje'] . "<br>Leido";

              echo "<select name=\"yaleido\" id=\"yaleido\" class=\"form-control\" disabled>";
              if ($lect === 'No') {
                echo  "<option value=\"0\">No</option>";
                echo  "<option value=\"1\">Si</option>";
              } elseif ($lect === 'Si') {
                echo  "<option value=\"1\">Si</option>";
                echo  "<option value=\"0\">No</option>";
              }
              echo "</select>";

              echo "</li>";
            }
            ?>
          </ul>
          <br>
          <input class="btn btn-primary" id="botonLeidoGuardar" type="submit" value="guardar cambios">

        </form>

      </div>


      <!-- otro por aca -->
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <h1 class="h3 mb-3 fw-normal">Sistema de ingresos de componentes</h1>
        <br>

        <form class="was-validated form-signin" action="guardarImagen.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="nombreTexto" placeholder="Nombre" name="nombreTexto" required>
              <div class="invalid-feedback"></div>
            </div>
          </div>
          <br>
          <div class="mb-3">
            <div class="form-floating">
              <textarea class="form-control is-invalid" id="descripcionSubida" name="descripcionSubida" placeholder="Ingresa la descripcion" required></textarea>
              <label for="descripcionSubida">Descripcion</label>
            </div>
          </div>
          <br>
          <div class="mb-3">
            <div class="form-floating">
              <input type="number" class="form-control" id="precioSubida" placeholder="Precio" name="precioSubida" required>
              <label for="precioSubida">Ingresa el valor unitario</label>
              <div class="invalid-feedback"></div>
            </div>
          </div>

          <div class="mb-3">
            <div class="form-floating">
              <input type="number" class="form-control" id="cantidadSubida" placeholder="Ingresa las cantidades disponibles" name="cantidadSubida" minlength="1" required>
              <label for="cantidadSubida">Ingresa las unidades disponibles</label>
              <div class="invalid-feedback"></div>
            </div>
          </div>

          <div>
            <?php
            $idSelect = "none";
            include('conectarDB.php');
            //session_start();
            echo "<select name=\"opcionSeleccionar\" id=\"opcionSeleccionar\" class=\"form-control\">";
            $nav01 = mysqli_query($con, "SELECT * FROM item");
            echo "<option>Selecciona una categoria</option>";
            while ($fila = mysqli_fetch_assoc($nav01)) {
              echo "<option value=\"" . $fila['idItem'] . "\">" . $fila['idItem'] . ") " . $fila['nombre'] . "</option>";
            }
            echo "</select>";
            echo "<label for=\"opcionSeleccionar\">Selecciona una categoria:</label>";
            ?>
            <div class="invalid-feedback">Seleccione una categoria</div>
          </div>

          <div class="mb-3">
            <div class="form-floating">
              <select name="visibleOpcion" id="visibleOpcion" class="form-control">
                <option value="1">Si</option>
                <option value="0">No</option>
              </select>
              <label for="precioSubida">¿El producto esta visible?</label>
              <div class="invalid-feedback"></div>
            </div>
          </div>

          <div class="mb-3">
            <div class="form-floating">
              <select name="visibleOpcion" id="unidad" class="form-control">
                <option value="1">Si</option>
                <option value="0">No</option>
              </select>
              <label for="precioSubida">¿es kilo?</label>
              <div class="invalid-feedback"></div>
            </div>
          </div>

          <div class="mb-3">
            <div class="form-floating">
              <select name="promoIndex" id="promoIndex" class="form-control">
                <option value="0">No</option>
                <option value="1">Si</option>
              </select>
              <label for="precioSubida">¿El producto esta en oferta?</label>
              <div class="invalid-feedback"></div>
            </div>
          </div>


          <div class="mb-3">
            <input type="file" class="form-control" id="inputImagen" name="inputImagen" aria-label="file example" accept="image/*" onchange="previewImage(event, '#imgPreview')" required>
            <label for="inputImagen">Ingresa la imagen</label>
            <div class="invalid-feedback">Falta ingresar la imagen</div>
          </div>
          <div class="imgirontech">
            <img id="imgPreview" width="300" height="300">
          </div>
          <br>
          <div class="mb-3">
            <button class="btn btn-primary" type="submit">Enviar formulario</button>
          </div>
        </form>

      </div>

      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">


        <!-- aca va el usuario -->
        <h1 class="h3 mb-3 fw-normal">Modificacion de usuarios registrados</h1>
        <br>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
          </div>
          <!-- <button id="botonActualizar" class="btn btn-outline-primary" type="button">Consultar</button> -->
          <?php
          include('conectarDB.php');

          echo "<select name=\"seleccionarUsuario\" id=\"seleccionarUsuario\" class=\"custom-select\">";
          $selUser = mysqli_query($con, "SELECT * FROM usuario");
          echo "<option>Selecciona un usuario</option>";
          while ($fila = mysqli_fetch_assoc($selUser)) {
            echo "<option value=\"" . $fila['idUsuario'] . "\">" . $fila['nombre'] . " " . $fila['apellido_a']  . "</option>";
          }
          echo "</select>";
          // echo "<button id=\"botonConsultar\" class=\"btn btn-outline-primary\">Seleccionar</button>";
          echo "<br>";
          echo "<br>";
          echo "<br>";
          ?>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-pretend">
            <span class="input-group-text" id="idIdUsuarioACT">ID Usuario </span>
          </div>
          <input type="text" class="form-control" id="idUsuarioACT" name="idUsuarioACT" value="idUsuarioACT">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-pretend">
            <span class="input-group-text" id="idNombreACT">Nombre </span>
          </div>
          <input type="text" class="form-control" id="nombreACT" name="nombreACT" value="nombreACT">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-pretend">
            <span class="input-group-text" id="idApellido1ACT">1° Apellido </span>
          </div>
          <input type="text" class="form-control" id="apellido1ACT" name="apellido1ACT" value="apellido1ACT">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-pretend">
            <span class="input-group-text" id="idApellido2ACT">2° Apellido </span>
          </div>
          <input type="text" class="form-control" id="apellido2ACT" name="apellido2ACT" value="apellido2ACT">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-pretend">
            <span class="input-group-text" id="idContrasena">Contrasena </span>
          </div>
          <input type="text" class="form-control" id="contrasenaACT" name="contrasenaACT" value="contrasenaACT">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-pretend">
            <span class="input-group-text" id="idCorreo">Correo</span>
          </div>
          <input type="email" class="form-control" id="correoACT" name="correoACT" value="correoACT">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-pretend">
            <span class="input-group-text" id="idTelefono">Telefono</span>
          </div>
          <input type="tel" class="form-control" id="telefonoACT" name="telefonoACT" value="telefonoACT">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-pretend">
            <span class="input-group-text" id="idDireccion">Direccion</span>
          </div>
          <input type="text" class="form-control" id="direccionACT" name="direccionACT" value="direccionACT">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-pretend">
            <span class="input-group-text" id="idNAC">Fecha Nac</span>
          </div>
          <input type="date" class="form-control" id="nacimientoACT" name="nacimientoACT" value="nacimientoACT">
        </div>


        <div class="mb-3">
          <div class="form-floating">
            <select name="visibilidadACT" id="visibilidadACT" class="form-control">
              <option value="1">Si</option>
              <option value="0">No</option>
            </select>
            <label for="visibilidadACT">¿El Usuario esta visible?</label>
          </div>
        </div>


        <input type="button" class="btn btn-primary" id="btnActualizar" value="Actualizar Cambios">
        <br>

      </div>

    </div>





  </main>
  <footer>
    <?php include('footer.php');
    ?>
  </footer>
</body>
<script src="../js/validar.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  // document.getElementById("botonConsultar").addEventListener("click", function() {
  document.getElementById("seleccionarUsuario").addEventListener("change", function() {

    var consulta = {
      id: document.querySelector('#seleccionarUsuario').value,
      funcion: "consultarRut"
    };
    $.ajax({
        url: "crud.php",
        type: "POST",
        data: consulta
      })
      .done(function(response) {
        // var respuesta=JSON.parse(response.salida);
        var respuesta = JSON.parse(response)
        document.querySelector('#idUsuarioACT').value = respuesta.idUsuario;
        document.querySelector('#nombreACT').value = respuesta.nombre;
        document.querySelector('#apellido1ACT').value = respuesta.apellido_a,
        document.querySelector('#apellido2ACT').value = respuesta.apellido_b;
        document.querySelector('#contrasenaACT').value = respuesta.contrasena;
        document.querySelector('#correoACT').value = respuesta.correo;
        document.querySelector('#telefonoACT').value = respuesta.telefono;
        document.querySelector('#direccionACT').value = respuesta.direccion;
        document.querySelector('#nacimientoACT').value = respuesta.nacimiento;
        document.querySelector('#visibilidadACT').value = respuesta.visibilidad;
      })
      .fail(function(response) {
        // aqui va si hay errro
        alert("Error")
      });

  });
</script>

<script>
  document.getElementById("btnActualizar").addEventListener("click", function() {

    var fechaInput = document.querySelector("#nacimientoACT").value;
    var fechaObjeto = new Date(fechaInput);
    var fechaFormateada = fechaObjeto.getFullYear() + "-" + fechaObjeto.getMonth() + "-" + fechaObjeto.getDay();

    var contacto = {
      funcion: "actualizarDatos",
      id: document.querySelector('#idUsuarioACT').value,
      nombre: document.querySelector('#nombreACT').value,
      apellido1: document.querySelector('#apellido1ACT').value,
      apellido2: document.querySelector('#apellido2ACT').value,
      contrasena: document.querySelector('#contrasenaACT').value,
      correo: document.querySelector('#correoACT').value,
      telefono: document.querySelector('#telefonoACT').value,
      direccion: document.querySelector('#direccionACT').value,
      nacimiento: fechaFormateada,
      visibilidad: document.querySelector('#visibilidadACT').value
    };
    // nacimiento: document.querySelector('#nacimientoACT').value,

    $.ajax({
        url: "crud.php",
        type: "POST",
        data: contacto
      })
      .done(function(respuesta) {
        alert("OK los cambios de " + respuesta);
      })
      .fail(function(respuesta) {
        alert("no Ok los cambios de " + respuesta);
      });
  });
</script>

<script>
  document.getElementById("leido").addEventListener("change", function() {

    var sel = document.querySelector('#leido').value;
    var idMensaje=document.getElementById("numeroMensaje").innerHTML;
    // var idMensaje = parseInt(textId);

    // alert("Leido "+sel+" ID= "+idMensaje);
    var leido = {
      funcion: "cambiarMensaje",
      valor: sel,
      valorID:idMensaje
    };


    $.ajax({
        url: "crud.php",
        type: "POST",
        data: leido
      })
      .done(function(respuesta) {
        location.reload(true);
        // alert(respuesta)
      })
      .fail(function(respuesta) {
        alert("No se ha podido cambiar el mensaje " + respuesta);
      });
  });
</script>

</html>