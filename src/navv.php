<?php
$estadoSesion = session_status();
if ($estadoSesion != PHP_SESSION_ACTIVE) {
    session_start();
}

/*if ($_SESSION['comprobarConexionUser']===1){
    $imagePath = '../img/userLogueado.png';
}else{
    $imagePath = '../img/user2.png';
}*/

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="../img/milogo.png" alt="logo" width="25" height="25">
    <a class="navbar-brand" href="../index.php" style="color: #008F39;" id="Arriba">Doña Julia</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="quienes.php">Quienes Somos<span class="sr-only">(current)</span></a>
            </li>

            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Productos
                </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <?php
                    include('conectarDB.php');
                    $navDrop = mysqli_query($con, "SELECT * FROM item");
                    while ($fila = mysqli_fetch_assoc($navDrop)) {
                        if ($fila['idItem'] == 22) {
                            echo "<div class=\"dropdown-divider\"></div>";
                        }
                        echo "<a class=\"dropdown-item\" href=\"producto" . $fila['idItem'] . ".php" . "\">" . $fila['nombre'] . "</a>";
                    }
                    ?>



                </div>
            </div>


            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#tarjetaContacto" href="#">Contacto</a>
            </li>
        </ul>
        <!-- aca cambie el carrito -->
        <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="loguear_user.php">Iniciar Sesión</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#registroFlotante" href="#">Registrate</a>
                </li>

                <!-- carrito -->
                <div class="dropdown">
                        <div class="container-icon">
                            <div class="container-cart-icon ">
                                <div class="count-products col-md-auto">
                                    <span id="contador-productos"><?php include('cargarCarro.php'); $val=cantidadCarro($_SESSION['COOKIE_USUARIO']); echo $val;?></span>
                                </div>
                            </div>
                        </div>


                        <button onclick="window.location.href = 'ver_carrito.php'" class="btn btn-light " type="button" id="carroComprass" data-bs-toggle="dropdown">

                            <img src="../img/carrito.png" alt="" width="25" height="25" class="icono-carro">
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
</nav>




<!-- tarjeta contacto -->
<div class="modal fade" id="tarjetaContacto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel_contac_cliente">Contacto de Clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary alert-dismissible fade show text-left" role="alert">
                    <strong>Info!</strong> Si tienes alguna pregunta no dudes en contactarnos. Estaremos atentos
                    a
                    responder cualquier inquietud que tengas.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h6>Nombre Completo</h6>
                <div class="input-group mb-3">

                    <div class="input-group-prepend">

                        <span class="input-group-text" id="basic-addon16"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" id="nombre" class="form-control" placeholder="Nombres Apellidos" aria-label="Username" aria-describedby="basic-addon16">
                </div>
                <h6>Email</h6>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">

                        <span class="input-group-text" id="basic-addon17"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input type="email" id="mail" class="form-control" placeholder="Correo Electrónico" aria-label="Username" aria-describedby="basic-addon17">
                </div>
                <h6>Mensaje</h6>
                <div class="input-group">

                    <textarea class="form-control" id="campo" aria-label="With textarea"></textarea>
                </div>


            </div>
            <div id="boton_contacto" class="modal-footer text-left">

                <input type="submit" value="Contactar" id="contactar" class="btn btn-primary" data-dismiss="modal">
            </div>
        </div>
    </div>
</div>

<!-- registro -->
<div class="modal fade" id="registroFlotante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel_reg_clientes">Registro de Clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6>Nombre Completo</h6>
                <div class="input-group mb-3">

                    <div class="input-group-prepend">

                        <span class="input-group-text" id="basic-addon101"><i class="fa fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" id="completo" placeholder="Nombres Apellidos" aria-label="Username" aria-describedby="basic-addon101">
                </div>
                <h6>Fecha de nacimiento</h6>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon12"><i class="fa fa-calendar"></i></span>
                    </div>


                    <input type="date" id="nacimiento" name="trip-start" value="2000-01-01" min="1930-01-01" max="2022-12-31" class="fecha" aria-describedby="basic-addon12">
                    <!-- class="etiqueta" -->
                </div>
                <h6>Dirección</h6>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">

                        <span class="input-group-text" id="basic-addon10"><i class="fa fa-home"></i></span>
                    </div>
                    <input type="text" class="form-control" id="dir" placeholder="Avenida Alemparte" aria-label="Username" aria-describedby="basic-addon10">
                </div>
                <h6>Email</h6>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">

                        <span class="input-group-text" id="basic-addon13"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input type="email" id="emailRegistro" class="form-control" placeholder="Correo@electronico.com" aria-label="Username" aria-describedby="basic-addon13">
                </div>
                <h6>Telefono</h6>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">

                        <span class="input-group-text" id="basic-addon14"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text" id="tel" class="form-control" placeholder="+569 9999 9999" aria-label="Username" aria-describedby="basic-addon14">
                </div>
                <h6>Contraseña</h6>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon15"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="password" minlength="6" id="passRegistro1" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon15">
                    <input type="password" minlength="6" id="passRegistro2" class="form-control" placeholder="Confirmación" aria-label="Username" aria-describedby="basic-addon15">

                </div>
                <h6 id="minRegistro">Mínimo 6 Caracteres</h6>
            </div>
            <div id="boton_registro_usuario" class="modal-footer text-left">

                <input type="submit" value="Registrarse" id="registrarUsuario" class="btn btn-primary" data-dismiss="modal">
            </div>
        </div>
    </div>
</div>
<!-- <script src="../js/ccomprasfin.js"></script> -->

<form action="cerrarSesion.php" method="post">

    <div class="modal fade" id="usuarioActivado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- <form action="src/login_user.php" method="post"> -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel_Usuario">Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show text-left" role="alert">
                        <strong>INFORMACION</strong> Cualquier cosa que necesites comunicate con administracion@NexusFC.cl
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
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
