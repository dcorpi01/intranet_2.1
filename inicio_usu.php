<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['id_cargo'])){


 ?>

 <?php 
    include("db.php");
 ?>
<!--PRIMERO SE CREA LA SESIÓN PARA QUE GUARDE Y MUESTRE LOS DATOS DEL USUARIO VALIDADO-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/inicio_usu.css">
    <!--FONT QUICKSAND-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="img/LOGO_VERDEN_H.png">
    <title>Bienvenido | INTRAVERDEN</title>
</head>
<body>
<div class="menu-btn">
    <i class="fa fa-bars"></i>
</div>
<!--CREACIÓN DE LA BARRA DE NAVEGACIÓN-->
<div class="container">
        <nav class="nav-main">
            <img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="nav-brand">
            <ul class="nav-menu">
                <li>
                    <a href="usu_index.php">Mis Solicitudes</a>
                </li>
                <li>
                    <a href="mis_mant.php">Proximos Mantenimientos</a>
                </li>
                <li>
                    <a href="papeleria1.php">Requisición de Papelería</a>
                </li>
                <?php 
					if($_SESSION['id_cargo'] == 3){
				?>
                <li>
                    <a href="index_rh.php">Recursos Humanos</a>
                </li>
                <?php }?>
                <?php 
                    if($_SESSION['id_cargo'] == 4){
                ?>
                <li>
                    <a href="index_mtto.php">Mantenimiento Gral.</a>
                </li>
                <?php }?>
                <?php 
                    if ($_SESSION['id_cargo'] == 5){
                ?>
                <li>
                    <a href="tb_pape.php">Registro Papelería</a>
                </li>
                <?php }?>
            </ul>
            <ul class="nav-menu-right">
                <li>
                    <a href="cambiar_cont.php">Cambiar Contraseña</a>
                </li>
                <li>
                    <a href="logout.php"><img class="close" src="img/salir2.png" alt="Salir del sistema" title="Salir"></a>
                </li>
            </ul>
        </nav>

    <!--AQUI SE MUESTRA EL MENSAJE DE BIENVENIDA PARA LOS USUARIOS-->
    <hr>
        <div class="bienvenida" style="margin-top: 0px;">
            <ul>
                <li>
                    <img src="logo-intraverden.png" alt="">
                    <br>
                    <p>.</p>
                    <br>
                    <h1 style="color: black;">BIENVENIDO, <?php echo $_SESSION['name']; ?></h1>
                </li>
            </ul>
        </div>
        <!--CUSTOM JAVASCRIPT-->
        <!--CONECTAMOS CON EL ARCHIVO JVASCRIPT PARA PODER TENER LAS ANIMACIONES-->
    <script src="/js/main.js"></script>
<?php
 }else{
    header("Location: login.php");
    exit();
 }
   ?>