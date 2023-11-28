<?php
// var_dump($_COOKIE['usuario']);
include('src/sesion.php');

?>

<!doctype html>
<html lang="es-CL">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>DoñaJulia.</title>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="js/agregarUsuario.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sumas.css">
    <link rel="stylesheet" type="text/css" href="css/otro.css">
    <link rel="shortcut icon" href="FAVICON.PNG">
</head>

<body style="background-color:rgb(252, 255, 255);">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="img/milogo.png" alt="logo" width="25" height="25">
        <a class="navbar-brand" href="#" style="color: #008F39;" id="Arriba">DoñaJulia
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="src/quienes.php">Quienes Somos<span class="sr-only">(current)</span></a>
                </li>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown">
                        Productos
                    </button>
                    <div class="dropdown-menu">
                        <?php
                        include('src/conectarDB.php');
                        $nav01 = mysqli_query($con, "SELECT * FROM item");
                        while ($fila = mysqli_fetch_assoc($nav01)) {
                            if ($fila['idItem'] == 22) {
                                echo "<div class=\"dropdown-divider\"></div>";
                            }
                            echo "<a class=\"dropdown-item\" href=\"src/producto" . $fila['idItem'] . ".php" . "\">" . $fila['nombre'] . "</a>";
                        }
                        ?>
                    </div>
                </div>


                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal2" href="#">Contacto</a>
                </li>
            </ul>
            <!-- aca cambie el carrito -->
            <div class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="src/loguear_user.php">Iniciar Sesión</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#registroFlotante" href="#">Registrate</a>
                    </li>

                    <!-- carrito -->
                    <div class="dropdown">
                        <div class="container-icon">
                            <div class="container-cart-icon ">
                                <div class="count-products col-md-auto">
                                    <span id="contador-productos"><?php 
                                    include('src/cargarCarro.php'); 
                                    if (isset($_SESSION['COOKIE_USUARIO'])){
                                    $val=cantidadCarro($_SESSION['COOKIE_USUARIO']); 
                                    echo $val;
                                }else{
                                    echo '0';
                                }
                                    ?></span>
                                </div>
                            </div>
                        </div>


                        <button onclick="window.location.href = 'src/ver_carrito.php'" class="btn btn-light " type="button" id="carroComprass" data-bs-toggle="dropdown">

                            <img src="img/carrito.png" alt="" width="25" height="25" class="icono-carro">
                            <style>
                                .icono-carro {
                                    transform: scale(0.75);
                                }
                            </style>
                        </button>

                    </div>
                    <li class="nav-item">
                        <?php
                        echo "<a class=\"nav-link\" data-toggle=\"modal\" data-target= \"#usuarioActivado\"";
                        echo "href=\"#\"><img src=\"$imagePath\" alt=\"\" width=\"25\" height=\"25\"></a>";
                        ?>

                    </li>
                </ul>
            </div>
        </div>


        <!-- hasta acaaaaaaaaaaaaaa -->
        </div>
    </nav>
    <main>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="imgirontech">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" id="img_fondo1" src="img/imagens.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>EN DoñaJulia</h5>
                            <p>Encontrarás todo lo que buscas al mejor precio.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" id="img_fondo2" src="img/imagenss.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>LA FRESCURA QUE TU FAMILIA MERECE</h5>
                            <p>Verdulería de confianza, productos de calidad.</p>
                        </div>
                    </div>


                    <div class="carousel-item">
                        <img class="d-block w-100" id="img_fondo3" src="img/imagensss.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>LA GENTE QUE SABE COMPRA EN DOÑAJULIA</h5>
                            <p>Colores y sabores naturales en cada compra.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="sr-only">Atrás</span>
                </a>
            </div>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only">Adelante</span>
            </a>
        </div>
        <br>
        <h1 id="list">&#x1F381;Productos en oferta</h1>
        <div class="card-group container-items">
            <?php

            if (isset($_COOKIE['usuario']) && $_COOKIE['usuario'] !== '') {
                $usuario = $_COOKIE['usuario'];
            } else {
                $usuario = 0;
            }



            include('src/conectarDB.php');
            $resultadoOfertas = mysqli_query($con, "SELECT * FROM producto");
            while ($fila = mysqli_fetch_assoc($resultadoOfertas)) {
                if ($fila['promocion'] == 1) {
                    $_SESSION['id_gnral'] = $fila['idInterno'];
                    $_SESSION['link'] = substr($fila['linkImagen'],3);
                    $_SESSION['desc_producto'] = $fila['descripcion'];
                    $_SESSION['nombre_producto'] = $fila['nombre'];
                    $_SESSION['precio_producto'] = $fila['precio'];
                    $_SESSION['idProd'] = $fila['idItem'];
                    $_SESSION['stock'] = $fila['stock'];
                    $_SESSION['id_producto_interno']=$fila['idProducto'];

                    echo "<div class=\"card\">";
                    echo "<img class=\"card-img-top item\" src=\"" . $_SESSION['link'] . "\" alt=\"producto\" />";
                    echo "<div class=\"card-body info-product\">";
                    echo "<h2 class=\"card-title\">" . $_SESSION['nombre_producto'] . "</h2>";
                    echo "<h3 class=\"card-text\">" . "Stock " . $_SESSION['stock'] . "</h3>";
                    echo "<p class=\"card-text price\">$" . $_SESSION['precio_producto'] . "</p>";
                    if($se===1){
                        echo "<button id=\"comprar_btn\" onclick=\"carrito_guardar('" . $_SESSION['nombre_producto'] . "','" . $_SESSION['precio_producto'] . "','" . $_SESSION['idProd'] . "','" . $_SESSION['stock'] . "','".$usuario."','".$_SESSION['id_producto_interno']."')\" class=\"btn-carrito btn-primary\">Añadir al carrito</button>";
                    }else{
                        echo "<button id=\"comprar_btn\" onclick=\"carrito_guardar('" . $_SESSION['nombre_producto'] . "','" . $_SESSION['precio_producto'] . "','" . $_SESSION['idProd'] . "','" . $_SESSION['stock'] . "','".$usuario."','".$_SESSION['id_producto_interno']."')\" class=\"btn-carrito btn-outline-primary\" disabled>Para comprar debe Iniciar Sesion</button>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
            }

            ?>

        </div>
        <!-- </div> -->

        <!-- registrar usuario -->
        <form onclick="agregarUser();" class="g-3 needs-validation" novalidate method="post">
            <div class="modal fade" id="registroFlotante" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel_reg_clientes">Registro de Clientes</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6>Rut/documento</h6>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon101"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="docRegistro" placeholder="Rut/Documento" required>
                            </div>
                            <h6>Nombre Completo</h6>
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">

                                    <span class="input-group-text" id="basic-addon101"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="nombreRegistro" placeholder="Nombres" required>
                                <input type="text" class="form-control" id="apellidoRegistro" placeholder="1° Apellido" required>
                                <input type="text" class="form-control" id="apellidoRegistro2" placeholder="2° Apellido" required>
                            </div>
                            <h6>Fecha de nacimiento</h6>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon12"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="date" id="nacimientoRegistro" name="trip-start" value="2000-01-01" min="1930-01-01" max="2022-12-31" class="fecha" required>
                                <!-- class="etiqueta" -->
                            </div>
                            <h6>Dirección</h6>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">

                                    <span class="input-group-text" id="basic-addon10"><i class="fa fa-home"></i></span>
                                </div>
                                <input type="text" class="form-control" id="direccionRegistro" placeholder="Ingrese direccion" required>
                            </div>
                            <h6>Email</h6>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">

                                    <span class="input-group-text" id="basic-addon13"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="email" id="emailRegistro" class="form-control" placeholder="Correo@irontech.cl" required>
                            </div>
                            <h6>Telefono</h6>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon14"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="text" id="telefonoRegistro" class="form-control" placeholder="+569 9999 9999" required>
                            </div>
                            <h6>Contraseña</h6>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon15"><i class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" minlength="6" id="passRegistro1" class="form-control" placeholder="Contraseña" required>
                                <input type="password" minlength="6" id="passRegistro2" class="form-control" placeholder="Confirmación" required>

                            </div>
                            <h6 id="minRegistro">Mínimo 6 Caracteres</h6>
                        </div>
                        <div id="boton_registro_usuario" class="modal-footer text-left">
                            <input type="submit" value="Registrarse" id="registrarUsuario" class="btn btn-primary" data-dismiss="modal">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel_contac_cliente">Contacto de Clientes</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-primary alert-dismissible fade show text-left" role="alert">
                            <strong>INFORMACION</strong> Si tienes alguna pregunta no dudes en contactarnos. Estaremos atentos a
                            responder cualquier inquietud que tengas.
                            <button type="button" id="botonContacto" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                        <h6>Nombre Completo</h6>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon16"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" id="nombreContacto" class="form-control" placeholder="Nombres Apellidos">
                        </div>
                        <h6>Email</h6>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon17"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" id="mailContacto" class="form-control" placeholder="Correo Electrónico">
                        </div>
                        <h6>Mensaje</h6>
                        <div class="input-group">

                            <textarea class="form-control" id="mensajeContacto"></textarea>
                        </div>
                    </div>
                    <div id="boton_contacto" class="modal-footer text-left">
                        <input type="submit" value="Contactar" id="btnContactar" class="btn btn-primary" data-dismiss="modal">
                    </div>
                </div>
            </div>
        </div>

        <!-- USUARIO -->
        <form action="src/cerrarSesion.php" method="post">

            <div class="modal fade" id="usuarioActivado" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- <form action="src/login_user.php" method="post"> -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel_Usuario">Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-primary alert-dismissible fade show text-left" role="alert">
                                <strong>INFORMACION</strong> Cualquier cosa que necesites comunicate con administracion@NexusFC.cl
                                <button type="button" class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <h6><?php echo $_SESSION['nombre_usuario']; ?></h6>
                            <div class="input-group mb-3">
                                <!-- aqui -->
                            </div>
                            <h6><?php echo $_SESSION['telefono_usuario']; ?></h6>
                            <div class="input-group mb-3">
                                <!-- aqui -->
                            </div>
                            <h6><?php echo $_SESSION['correo_usuario']; ?></h6>
                            <div class="input-group">
                            </div>
                            <!-- aqui -->

                        </div>

                        <div class="modal-footer text-left">
                            <input type="submit" value="Cerrar Sesion" id="CerrarSesion" class="btn btn-primary">
                        </div>
                        <!-- </form> -->

                    </div>
                </div>
            </div>
        </form>

        <!-- Iniciar Sesion -->
        <form action="src/verificar.php" method="post">
            <div class="modal fade" id="iniciarSesion" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel_ini_sesion">Iniciar Sesión</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6>Email</h6>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">

                                    <span class="input-group-text" id="basic-addon100"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="email" id="emailUser" class="form-control" placeholder="Correo@electronico.com" name="mailUsuario">
                            </div>
                            <h6>Password</h6>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">

                                    <span class="input-group-text" id="basic-addon18"><i class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" minlength="3" id="passUser" class="form-control" placeholder="Password" name="passUsuario">

                            </div>
                            <h6 id="minCaracter">Mínimo 6 Caracteres</h6>
                        </div>
                        <div id="boton_inicio" class="modal-footer text-left">
                            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                            <!-- <input type="submit" value="Iniciar Sesion" id="iniciarSesion1" class="btn btn-primary" data-dismiss="modal"> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- TERMINO REGISTRO -->

        <div id="cont" class="container col-12">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 id="titulo" style="color: #000000;">¿Cómo comprar en <a style="color: #008F39;" href="#"> DoñaJulia.com? </a> </h2>
                </div>
                <div class="col-sm-4 text-center">
                    <img id="img_footer_seleccion2" src="img/SELECCION2.png" width="150" height="150" alt="selec">
                    <p id="men_seleccion">1. Selecciona tu producto<br>Selecciona tu producto entre todas la verduras y frutas que
                        tenemos a
                        disposición.
                    </p>
                </div>
                <div class="col-sm-4 text-center">
                    <img id="img_footer_pago" src="img/pago.png" alt="pagoo" width="150" height="150">
                    <p id="men_pago">2. Define tu forma de pago.
                    </p>
                </div>
                <div class="col-sm-4 text-center">
                    <img id="img_footer_mapa" src="img/mapa.png" width="150" height="150" alt="mapaa">
                    <p id="men_mapa">3. Retira tus Productos.
                    </p>
                </div>
            </div>
        </div>

    </main>

    <footer class="footer">
        <br>

        <div class="desborde">
            <br>
            <div id="cont2" class="container col-12" style="background-color:#008F39">
                <div class="row">
                    <div class="col-sm-2 text-right">
                        <br>
                        <h2 id="titulo2" style="color: azure;">
                        Del campo a tu mesa, calidad que se nota
                        </h2>
                    </div>
                    <div class="col-sm-2 text-center">
                        <br>
                        <p id="footer_1" style="color: rgb(255, 255, 255);">
                            Cada uno de nuestros trabajadores están disponibles si necesitas alguna asesoría externa no
                            dudes en preguntar lo necesario.
                        </p>
                    </div>
                    <div class="col-sm-2 text-center">
                        <br>
                        <p id="footer_2" style="color: rgb(255, 255, 255);">
                            Nos encontramos en Avenida Alemparte #123 Ciudad de Concepción
                        </p>
                    </div>
                    <div class="col-sm-2 text-center">
                        <br>
                        <div class="autoSize">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8072.107491450066!2d-73.08322686423385!3d-36.786568405139185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scl!4v1682026826412!5m2!1ses-419!2scl" style="border: 1px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-sm-2 text-center">
                        <br>
                        <a style="color: aliceblue;">Mapa del sitio</a>
                        <a href="#">
                            <p style="color: aliceblue;"> Quienes somos</p>
                        </a>
                        <a href="#Arriba">
                            <p style="color: aliceblue;">Categorias de productos</p>
                        </a>
                    </div>
                    <div class="col-sm-2 text-center">
                        <br>
                        <img src="img/milogo.png" alt="" width="200" height="100">
                    </div>
                    <br>
                </div>
                <div style="text-align: center;">
                    <p style="color: rgb(249, 249, 249)">
                        NexusFC © 2023: todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- <script src="js/ccomprasfin.js"></script> -->
    <script src="js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        document.getElementById("btnContactar").addEventListener("click", function() {

            var contacto = {
                nombre: document.querySelector('#nombreContacto').value,
                mail: document.querySelector('#mailContacto').value,
                mensaje: document.querySelector('#mensajeContacto').value
            };

            $.ajax({
                url: "src/contacto.php",
                type: "POST",
                data: contacto,
                success: function(response) {
                    alert("Mensaje enviado");
                },
                error: function(error) {
                    alert("Mensaje no se ha podido enviar");
                }
            });


        });
    </script>

</body>

</html>