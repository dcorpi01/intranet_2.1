<?php
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylerh.css">
    <link rel="icon" href="img/LOGO_VERDEN_H.png">
    <?php include "functions.php"; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <title>Cambiar contraseña | INTRAVERDEN</title>
</head>
<body>

<header>
		<div class="header">
			
			<h1 class="pape">Cambiar mi contraseña</h1>
			<div class="optionsBar">
				<p class="slp">San Luis Potosí, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['name'].' - '.$_SESSION['id_cargo']; ?></span>
				<img class="photouser" src="img/LOGO_VERDEN_H.png" alt="Usuario">
				<a href="logout.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
	</header>
    <br>
    <br>
<nav>
        <ul>
        <li>
            <a href="inicio_usu.php">Inicio</a> 
        </li>
                <li>
                    <a href="usu_index.php">Mis Solicitudes</a>
                </li>
                <li>
                    <a href="mis_mant.php">Próximos Mantenimientos</a>
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
                
        </ul>
    </nav>

    <section id="container">
		
        <div class="form_register">

    <form class="form-register" action="change_p.php" method="post" style="text-align: center;">

        <h2>Cambiar Contraseña</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        
        <div class="form-group">
        <label> Contraseña Anterior: </label><br>
        <input type="text" name="op" placeholder="Contraseña Antigua" required><br>
        </div>

        <div class="form-group">
        <label> Contraseña Nueva: </label><br>
        <input type="text" name="np" placeholder="Contraseña Nueva" class="form-group" required><br>
        </div>
        
        <div class="form-group">
        <label> Confirmar Contraseña Nueva: </label><br>
        <input type="text" name="c_np" placeholder="Confirmar Contraseña Nueva" class="form-group" required><br>
        </div>

        <button type="submit" class="btn_new">Cambiar</button>
        <a href="inicio_usu.php" class="btn_new" style="margin: auto;">Inicio</a>
        
    </form>
        
        </div>
        </section>
</body>

<hr>
    <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
    <div class="foot">
    <p>Desarrollado por: David Alberto Corpi Zavala</p>
    <p>INTRAVERDEN &#169</p>
    <p>Residuos Mexicanos</p>
    <p>v2.0 - 2022</p>
    </div>

</html>

<?php 

        }else{
            header("Location:login.php");
            exit();
        }
?>