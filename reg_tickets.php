<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

 ?>

 <?php 
    include("db.php"); /*Incluimos la conexión a la base de datos*/
    
    $alert = '';
 ?>


<!DOCTYPE html>
     <html lang="es">
     <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./img/MSF.png">
        <link rel="stylesheet" type="text/css" href="css/stylerh.css">
        <script type="text/javascript" src="js/functions.js"></script>
        <?php include "functions.php"; ?>
        <title>MAVEPO | SOPORTE</title>
     </head>
     <body>
<header>
		<div class="header">
			
			<h1>GRUPO MAVEPO/MAVESA</h1>
			<div class="optionsBar">
				<p>San Luis Potosí, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['name'].' - '.$_SESSION['id_cargo']; ?></span>
				<img class="photouser" src="./img/MSF.png" alt="Usuario">
				<a href="logout.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
	</header>

    <br>
    <br>
    <nav>
        <ul>
            <li><a href="index_resimex.php">Inicio</a></li>
            <li class="principal">
				<a href="#">Empresas</a>
				    <ul>
						<li><a href="index_carganova.php">CARGANOVA</a></li>
					</ul>
			</li>
				<li class="principal">
                    <a href="#">Formatos</a>
                        <ul>
                            <li><a href="#">DC-3</a></li>
                            <li><a href="#">Solicitud de Vacaciones</a></li>
                        </ul>
                </li>
                <li>
                    <a href="#">Trabajadores</a>
                        <ul>
                            <li><a href="lista_tresimex.php">Lista de Trabajadores</a></li>
                        </ul>
                
                </li>

        </ul>
    </nav>

    <section id="container">

    <img class="image-sup" src="./img/MSF.png" height="95">
    <br>
		
        <div class="form_register">
            <h1 style="margin-left: 80px;">Registrar Ticket</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            
            <form action="btn_sol.php" method="POST">

            <p style="font-size: 26px; font-weight: bold;">Datos del Solicitante</p>

                <label for="nombre">Nombre Completo: </label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo">

                <?php 
                
                $query4 = mysqli_query($conn, "SELECT * FROM empresa");
                $result3 = mysqli_num_rows($query4);
                
                ?>

                <label for="empresa">Empresa: </label>
                <select name="empresa" id="empresa">
                    <?php 
                    
                    if($result3){
                        while ($dptto = mysqli_fetch_array($query4)){
                            ?>
                            <option value="<?php echo $dptto["empresa"]; ?>"><?php echo $dptto["empresa"]; ?></option>   
                
                            <?php
                         }
                    }
                    
                    ?>
                </select>

                <?php 
                
                $query4 = mysqli_query($conn, "SELECT * FROM sucursal");
                $result3 = mysqli_num_rows($query4);
                
                ?>

                <label for="sucursal">Sucursal: </label>
                <select name="sucursal" id="sucursal">
                    <?php 
                    
                    if($result3){
                        while ($dptto = mysqli_fetch_array($query4)){
                            ?>
                            <option value="<?php echo $dptto["sucursal"]; ?>"><?php echo $dptto["sucursal"]; ?></option>   
                
                            <?php
                         }
                    }
                    
                    ?>
                </select>
                <br>

                <p style="font-size: 26px; font-weight: bold;">Datos del Servicio</p>

                <?php 
                
                $query4 = mysqli_query($conn, "SELECT * FROM tipo_soporte");
                $result3 = mysqli_num_rows($query4);
                
                ?>

                <label for="tipo_soporte">Seleccione el tipo de soporte que requiere: </label>
                <select name="tipo_soporte" id="tipo_soporte">
                    <?php 
                    
                    if($result3){
                        while ($dptto = mysqli_fetch_array($query4)){
                            ?>
                            <option value="<?php echo $dptto["tipo"]; ?>"><?php echo $dptto["tipo"]; ?></option>   
                
                            <?php
                         }
                    }
                    
                    ?>
                </select>

                <?php 
                
                $query4 = mysqli_query($conn, "SELECT * FROM urgencia");
                $result3 = mysqli_num_rows($query4);
                
                ?>

                <label for="urgencia">Seleccione el nivel de urgencia que considere: </label>
                <select name="urgencia" id="urgencia">
                    <?php 
                    
                    if($result3){
                        while ($dptto = mysqli_fetch_array($query4)){
                            ?>
                            <option value="<?php echo $dptto["urgencia"]; ?>"><?php echo $dptto["urgencia"]; ?></option>   
                
                            <?php
                         }
                    }
                    
                    ?>
                </select>

                <div class="form-group">
                    <textarea name="description" cols="45" rows="10" placeholder="Descripción del problema o servicio" autofocus required></textarea>
                </div>

                <input type="submit" value="Enviar Solicitud" name="save_sol" class="btn_save">
                <br>

                <footer>
                <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
                <div class="foot">
                <p> Creado por: David Alberto Corpi Zavala | 2024</p>
                    <p>MAVEPO SOPORTE &#169</p>
                    <p>MAVEPO</p>
                    <p>v1.0 - 2024</p>
                </div>
                </footer>

                </form>



    </body>
     <script type="text/javascript" src="js/functions.js"></script>
     </html>


<?php
 }else{
    header("Location: login.php");
    exit();
 }
   ?>
