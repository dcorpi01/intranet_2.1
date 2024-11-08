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
        <link rel="icon" href="img/LOGO_VERDEN_H.png">
        <link rel="stylesheet" type="text/css" href="css/stylerh.css">
        <script type="text/javascript" src="js/functions.js"></script>
        <?php include "functions.php"; ?>
        <title>Departamento RRHH | INTRAVERDEN</title>
     </head>
     <body>
<header>
		<div class="header">
			
			<h1>DEPTTO. RECURSOS HUMANOS</h1>
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
            <li><a href="bienvenida.php">Inicio</a></li>
            <li class="principal">
				<a href="#">Empresas</a>
				    <ul>
						<li><a href="index_resimex.php">Residuos Mexicanos</a></li>
						<li><a href="index_carganova.php">CARGANOVA</a></li>
					</ul>
			</li>
                <?php 
					if($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 5){
				?>
				<li class="principal">
                    <a href="#">Mis Solicitudes</a>
                        <ul>
                            <li><a href="tickets.php">Nueva Solicitud</a></li>
                            <li><a href="usu_index.php">Ver mis solicitudes</a></li>
                        </ul>
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 1){
				?>
                <li class="principal">
				    <a href="#">Sistemas</a>
				        <ul>
						    <li><a href="tabla_mantadm.php">Mantenimientos</a></li>
                            <li><a href="tab_usuarios.php">Usuarios</a></li>
                            <li><a href="tb_comentarios.php">Comentarios</a></li>
                            <li><a href="tb_pape.php">Registro Papelería</a></li>
					    </ul>
                                                   
			    </li>
                <?php }?>

                <?php 
					if($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 5){
				?>
                <li><a href="mis_mant.php">Mantenimientos</a></li>
                <li><a href="papeleria1.php">Papelería</a></li>
                <?php }?>
        </ul>
    </nav>
    <hr>
    
     </body>
     <script type="text/javascript" src="js/functions.js"></script>
     </html>

     <?php
    }else{
        header("Location: bienvenida.php");
        exit();
    }
        ?>

