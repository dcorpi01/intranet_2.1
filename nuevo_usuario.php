<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

 ?>

 <?php 
    include("db.php");
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario | SOPORTE MAVEPO</title>
    <!--Favicon-->
    <link rel="icon" href="./img/LOGO_MAF20241.png">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/stylerh.css">
    <?php include "functions.php"; ?>

</head>
<body>
<header>
		<div class="header">
			
			<h1>Registrar Nuevo Usuario</h1>
			<div class="optionsBar">
				<p>San Luis Potosí, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['name'].' - '.$_SESSION['id_cargo']; ?></span>
				<img class="photouser" src="./img/LOGO_MAF20241.png" height="75" alt="Usuario">
				<a href="logout.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
	</header>

    <br>
    <br>

    <div class="container">
    <nav>
        <ul>
        <li>
            <a href="bienvenida.php">Inicio</a> 
        </li>
                <li>
                    <a href="tabla_mantadm.php">Mantenimiento</a>
                </li>
                <li>
                    <a href="tab_usuarios.php">Usuarios</a>
                </li>
                <li>
                    <a href="comentarios.php">Comentarios</a>
                </li>
                <li>
                    <a href="tb_pape.php">Registro Papelería</a>
                </li>
        </ul>
    </nav>
        <hr>
    
        <div class="container" style="max-width: 700px; margin-left: 550px; ">
           
            <div class="image_sup">
                <img class="image-sup" src="./img/LOGO_MAF20241.png" height="100">
                <br>
            </div>

                    <form action="save_user.php" method="post">
                    <div class="form_register">
                        <input type="text" name="uname" class="form-control" placeholder="Correo Empresarial o Usuario @intraverden.com" autofocus required style="margin: auto;">
                    </div>
                    <br>
                    <div class="form_register">
                        <input name="pass" ID="txtPassword" type="text" class="form-control" placeholder="Contraseña" style="font-family:Arial, Helvetica, sans-serif; font: size 20px;" required>
                    </div>
                    <br>
                    <div class="form_register">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre y Primer Apellido" autofocus required>
                    </div>
                    <br>
                    <div class="form_register">
                        <input type="text" name="area" class="form-control" placeholder="Area o Proceso" autofocus required>
                    </div>
                    <br>
                    <div class="form_register">
                        <select class="form-select" name="cargo" id="cargo" style="font-size: 15px; font-family:Arial, Helvetica, sans-serif;" required>
                            <option value="" class="opt" selected>Seleccionar cargo --</option>
                            <option value="1" class="opt">Administrador</option>
                            <option value="2" class="opt">Usuario</option>
                            <option value="3" class="opt">Usuario Recursos Humanos</option>
                            <option value="4" class="opt">Usuario Mantenimiento</option>
                        </select>
                    </div>
                    <br>
                    <input type="submit" class="btn_new" name="save_u" value="Guardar Usuario" style="width: 300px; margin-left: 150px;">
                    </form>
        </div>

    <br>
    <hr>

    <br>
    <div class="foot">
    <p> Creado por: David Alberto Corpi Zavala | 2024</p>
    <p>MAVEPO SOPORTE &#169</p>
    <p>MAVEPO</p>
    <p>v1.0 - 2024</p>
    </div>
</body>
</html>









<?php
 }else{
    header("Location: login.php");
    exit();
 }
   ?>