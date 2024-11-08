<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

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
    <link rel="stylesheet" href="css/inicio_adm.css">
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
            <a href="inicio_adm.php"><img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="nav-brand"></a>
            <ul class="nav-menu">
                <li>
                    <a href="adm_index.php">Solicitudes</a>
                </li>
                <li>
                    <a href="tabla_mantadm.php">Mantenimiento</a> 
                </li>
                <li>
                    <a href="tab_usuarios.php">Usuarios</a> 
                </li>
                <li>
                    <a href="tb_pape.php">Registro Papelería</a>
                </li>
                <li>
                    <a href="tb_comentarios.php">Comentarios</a> 
                </li>
                <li>
                    <a href="logout.php">Cerrar Sesion</a> 
                </li>
            </ul>
            <ul class="nav-menu-right">
                <li>
                    <a href="#">
                        <i class="fas fa-search"> <!-- <input type="text" id="search" placeholder="Buscar">--></i>
                    </a>

                </li>
            </ul>
        </nav>

     <!--AQUI SE MUESTRA EL MENSAJE DE BIENVENIDA PARA LOS USUARIOS-->

        <hr>
        <br>
        <div class="bienvenida">
            <ul>
                <li>
                    <img class="image-sup" src="logo-intraverden.png">
                    <h1>BIENVENIDO, <?php echo $_SESSION['name']; ?></h1>
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