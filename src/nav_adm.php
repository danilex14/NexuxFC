    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="../img/logonexus.png" alt="logo" width="100" height="70">
        <a class="navbar-brand" href="#" style="color: #008F39;" id="Arriba">NexusFC ZONA ADMINISTRACIÓN
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#generarPagina" href="#">ReCrear paginas</a>
                </li>
            </ul>


            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" data-toggle="modal" data-target="#CerrarSesion" href="#">Cerrar Sesion</a>
                    </li>

                </ul>
            </form>
        </div>
    </nav>

    <div class="modal fade" id="CerrarSesion" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel_contac_cliente">Cerrar Sesion</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show text-left" role="alert">
                        <strong>Atencion</strong> Antes de cerrar sesion recuerda guardar todos los cambios
                        <button type="button" class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>

                </div>
                <div id="boton_contacto" class="modal-footer text-left">
                    <input type="submit" value="Cancelar" id="cerrarSesionV" class="btn btn-close-white" data-dismiss="modal">
                    <form action="cerrarSesionAdm.php" method="post">
                        <input type="submit" value="Cerrar Sesion" id="cerrarSesionV" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="generarPagina" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recrearpaginas">Re-crear pagina</h5>
                    <button type="button" class="close" data-dismiss="modal" style="color: #008F39;">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show text-left" role="alert">
                        <strong>Atencion</strong> Al recrear las paginas se actualizan todas las paginas de productos
                        <button type="button" class="close" data-dismiss="alert" >
                            <span>&times;</span>
                        </button>
                    </div>

                </div>
                <div id="boton_contacto" class="modal-footer text-left">
                    <input type="submit" value="Cancelar" id="cerrarSesionV" class="btn btn-close-white" data-dismiss="modal">
                    <form action="crearPaginas.php" method="post">
                        <input type="submit" value="ReCrear Paginas" id="cerrarSesionV" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>