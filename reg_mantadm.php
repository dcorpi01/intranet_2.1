<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>

<?php 

include("db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mantenimiento | MAVEPO ADMINISTRADOR</title>
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--FONT OSWALD-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
    <!--FONTS GOOGLE-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="./img/LOGO_MAF20241.png">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/stylerh.css">
    <?php include "functions.php"; ?>
    
</head>
<body>
<header>
		<div class="header">
			
			<h1>Registro de Mantenimientos</h1>
			<div class="optionsBar">
				<p>San Luis Potosí, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['name'].' - '.$_SESSION['id_cargo']; ?></span>
				<img class="photouser" src="./img/LOGO_MAF20241.png" alt="Usuario">
				<a href="logout.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
	</header>

    <div class="container">
    <br>
    <br>
    <nav>
        <ul>
        <li>
            <a href="bienvenida.php">Inicio</a> 
        </li>
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
                    <a href="comentarios.php">Comentarios</a>
                </li>
                <li>
                    <a href="tb_pape.php">Registro Papelería</a>
                </li>
        </ul>
    </nav>
    <br>
        
            <h1>Registrar Mantenimiento</h1>
            <hr>

                <div class="form_register">

                <div class="image_sup" style="align-items: center;">
                    <img class="image-sup" src="./img/LOGO_MAF20241.png" height="95">
                    <br>
                </div>

                    <form action="save_mant.php" method="post">
                    <div class="container" style="max-width: 800px;">

                        <br>

                        <div class="form-group">
                            <input type="text" name="eq" placeholder="ID del Equipo" class="form-control"  autofocus required>
                        </div>

                        <br>

                        <div class="form-group">
                            <input type="text" name="mar" placeholder="Marca del equipo" class="form_control" autofocus required>
                        </div>

                        <br>
                        
                        <div class="form-group">
                            <input type="text" name="mant" placeholder="Tipo de Mantenimiento" class="form-control" autofocus required>
                        </div>

                        <br>

                        <div class="form-group">
                            <input type="date" name="fecha" id="fech1" autofocus required>
                        </div>

                        <br>

                        <div class="form-group">
                            <input type="text" name="userw" placeholder="Usuario" class="form-control" autofocus required>
                        </div>

                        <br>

                        <div class="form-group">
                            <textarea name="descripcion" id="msg1" cols="45" rows="10" placeholder="Descripción del mantenimiento"></textarea>
                        </div>

                        <br>

                        <input type="submit" class="btn_new" value="Enviar" name="save_m" style="margin: auto;">
                    </div>
                    </form>
                </div>

    <hr>
    <br>
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