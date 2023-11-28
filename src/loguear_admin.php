<?php
$estadoSesion = session_status();

if ($estadoSesion === PHP_SESSION_ACTIVE){
}else{
    session_start();
}
$_SESSION['user'] = "adm";

?>
<!doctype html>
<html lang="es-CL">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Inicio de sesion del administrador">
  <meta name="author" content="Pyme componentes electricos">
  <meta name="generator" content="FeGonB">
  <title>Sesion Administracion</title>


  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/sumas.css">

  <link href="../css/sign-in.css" rel="stylesheet">

  <link rel="shortcut icon" href="../FAVICON.PNG">
</head>

<body class="text-center ">
  <main class="w-100 form-signin m-auto">
    <form action="../src/login.php" class="form-control" method="post">
      <img class="mb-4 redondeo" src="../img/logonexus.png" alt="" width="210" height="150">

      <h2 class="h3 mb-3 fw-normal redondeo">Iniciar Admin</h2>
      <div class="form-floating">
        <input type="email" class="form-control" id="mailAdm" placeholder="nombre@correo.com" name="mailAdm" required>
        <label for="mailAdm">Direccion Email</label>
      </div>
      
      <div class="form-floating">
        <input type="password" class="form-control" id="passAdm" placeholder="Password" name="passAdm" required>
        <label for="floatingPassword">Contraseña</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
      <label for="usuario"></label>
      <a href="loguear_user.php" id="usuario" name="usuario" class="w-100 btn btn-lg btn-primary">Iniciar Sesion User</a>
      <p class="mt-5 mb-3 text-muted redondeoPeq">NexusFC &copy; 2023: todos los derechos reservados.</p>

    </form>
  </main>
</body>

</html>