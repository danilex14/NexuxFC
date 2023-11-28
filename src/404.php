<!doctype html>
<html lang="es-CL">

<head>
<?php
include('header.php');
?>
<style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
    }

    footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      height: 60px;
      background-color: #f5f5f5;
    }
  </style>
</head>

<body style="background-color:rgb(252, 255, 255);">
<?php
include('navv.php');
?>
           
    <main class="cuerpoTexto">
        <div>

            <br>
            <h1>
                404. Error.


            </h1>
            <a href="../index.php" class="btn btn-primary">Volver al inicio</a>



        </div>
    </main>
<?php
include('footer.php');
?>
</body>

</html>