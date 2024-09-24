
<?php

session_start();
$usuario_sesion = $_SESSION['nombre'];
$area_trabajo = $_SESSION['area_trabajo'];



if($area_trabajo == '2')
{
  header("location: login_sistemas.html");
}
if(!isset($usuario_sesion)){
    header("location: login_sistemas.html");
} else {

    //SI SI HAY USUARIO LOGUEADO ENTONCES...
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    <link rel="shortcut icon" href="images/hologo.png">
    <link rel="stylesheet" href="css/head.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Calligraffitti&family=Croissant+One&display=swap" rel="stylesheet">

</head>
<body >
    


<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #2b455c; box-shadow:0px 10px 20px #2b455c; color:white">
  <div class="container" style="color:white">
    <a class="navbar-brand" style="font-family: 'Calligraffitti', cursive; font-family: 'Croissant One', cursive; color:white" href="menu_principal_sistemas.php">R.I.H.O | Reporte de Incidencias Hernán Ocazionez</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--sidebar-->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <!--CUERPO DE SIDEBAR-->
      <div class="offcanvas-body" >
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item mx-2">
            <a class="nav-link active" aria-current="page" href="menu_principal_sistemas.php" style="font-family:Century Gothic; color:white">Menú</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" aria-current="page" href="casos_reportados_sistemas_admin.php" style="font-family:Century Gothic; color:white">Casos</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link active" aria-current="page" href="casos_miscasos_curso_sistemas.php" style="font-family:Century Gothic; color:white">Mis casos</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="casos_resueltos_sistemas_admin.php" style="font-family:Century Gothic; color:white">Resueltos</a>
          </li>
            </ul>
            <!--LOGIN / LOGOUT-->
            <div class="d-flex justify-content-center align-items-center gap-3" style="color:white">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3" style="font-family:Century Gothic; color:white">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button"style="color:white" data-bs-toggle="dropdown" aria-expanded="false">
                        <b style="font-size:16px"><?php echo $usuario_sesion ?></b>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item" href="editar_usuario_sistemas.php" >Perfil</a></li>
                      <li>
                      <li>
                        <a class="dropdown-item" href="agregar_usuario_sistemas.php">Agregar usuario</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li>
                        <a class="dropdown-item" href="logica/salir.php">Cerrar sesión</a>
                      </li>
                </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<br>
<br>
<div style="margin-top:-35px"></div>