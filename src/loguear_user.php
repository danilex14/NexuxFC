<?php
$estadoSesion = session_status();
if ($estadoSesion === PHP_SESSION_ACTIVE) {
} else {
  session_start();
}
$_SESSION['user'] = "usr";
?>
<!doctype html>
<html lang="es-CL">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Inicio de sesion del administrador">
  <meta name="author" content="Pyme componentes electricos">
  <meta name="generator" content="FeGonB">
  <title>Iniciar Sesión Usuario</title>
  <link rel="stylesheet" type="text/css" href="../css/sumas.css">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/sign-in.css" rel="stylesheet">
  <link rel="shortcut icon" href="../FAVICON.PNG">
</head>

<body class="text-center imagenFon">

  <main class="w-100 form-signin m-auto">
    <form action="login.php" method="post" class="form-control">
      <img class="mb-4 redondeo" src="../img/milogo.png" alt="" width="200" height="150">
      <h2 class="h3 mb-3 fw-normal redondeo">Iniciar Sesion</h2>
      <div class="form-floating">
        <input type="email" class="form-control" id="mailUsr" placeholder="nombre@correo.com" name="mailUsr" required>
        <label for="floatingInput">Direccion Email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="passUsr" placeholder="Password" name="passUsr" required>
        <label for="floatingPassword">Contraseña</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
      <label for="admin"></label>
      <a href="loguear_admin.php" id="admin" name="admin" class="w-100 btn btn-lg btn-outline-primary">Iniciar Sesion Admin</a>
      <p class="mt-5 mb-3 text-muted redondeoPeq">NexusFC &copy; 2023: todos los derechos reservados.</p>

    </form>
  </main>

</body>

</html>