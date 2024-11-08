<?php
    session_start();

    if($_SESSION['id_cargo'] != 3 && $_SESSION['id_cargo'] != 1){
        header("location: ./inicio_usu.php");
    }

    if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

     ?>

     <?php 
        include("db.php");
     ?>

     <!--Se crea la sesión paraque guarde y muestre los datos de usuarioverificado-->

     <!DOCTYPE html>
     <html lang="es">
     <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/carganova.png">
        <link rel="stylesheet" type="text/css" href="css/carganova.css">
        <script type="text/javascript" src="js/functions.js"></script>
        <?php include "functions.php"; ?>
        <title>CARGANOVA | INTRAVERDEN</title>
     </head>
     <body>
<header>
		<div class="header">
			
			<h1>CARGANOVA</h1>
			<div class="optionsBar">
				<p>San Luis Potosí, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['name'].' - '.$_SESSION['id_cargo']; ?></span>
				<img class="photouser" src="img/resimex.png" alt="Usuario">
				<a href="logout.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
	</header>

    <br>
    <br>
    <nav>
        <ul>
            <li><a href="index_rh.php">Inicio</a></li>
            <li class="principal">
				<a href="#">Empresas</a>
				    <ul>
						<li><a href="index_resimex.php">RESIMEX</a></li>
					</ul>
			</li>
				<li class="principal">
                    <a href="#">Formatos</a>
                        <ul>
                            <li><a href="generar_dc3_crgnva.php">DC-3</a></li>
                            <li><a href="#">Solicitud de vacaciones</a></li>
                        </ul>
                </li>
            <li class="principal">
                <a href="#">Trabajadores</a>
                <ul>
                    <li><a href="#">Nuevo Trabajador</a></li>
                    <li><a href="#">Lista Trabajadores</a></li>
                </ul>
            </li>

        </ul>
    </nav>


    </body>
     <script type="text/javascript" src="js/functions.js"></script>
     </html>

     <?php
    }else{
        header("Location: inicio_usu.php");
        exit();
    }
        ?>