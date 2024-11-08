<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
    include("db.php");


    ?>
<!DOCTYPE html>
     <html lang="es">
     <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./img/LOGO_MAF20241.png">
        <link rel="stylesheet" type="text/css" href="css/stylerh.css">
        <script type="text/javascript" src="js/functions.js"></script>
        <?php include "functions.php"; ?>
        <title>Papelería | MAVEPO</title>
     </head>
     <body>
<header>
		<div class="header">
			
			<h1 class="pape">Registro de Papelería</h1>
			<div class="optionsBar">
				<p class="slp">San Luis Potosí, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['name'].' - '.$_SESSION['id_cargo']; ?></span>
				<img class="photouser" src="./img/LOGO_MAF20241.png" alt="Usuario">
				<a href="logout.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
	</header>

    <br>
    <br>
    <nav>
    <ul>
        <li>
            <a href="bienvenida.php">Inicio</a> 
        </li>
                <li>
                    <a href="usu_index.php">Mis Solicitudes</a>
                </li>
                <li>
                    <a href="mis_mant.php">Proximos Mantenimientos</a>
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
    </nav>

    <section id="container">
		
        <div class="form_register">
            <h1 style="margin-left: 30px;">Registro de Papelería</h1>
            <hr>

            
            <form action="save_pape.php" method="post">

            <div class="container" style="max-width: 800px;">

<div class="text-center" style="margin: 20px 0px 20px 0px;">
<span class="text-secondary">Por favor, ingresa tu pedido de papelería, recuerda que tienes hasta el día 15 de cada mes para ingresar tu pedido y que llegue dentro del tiempo establecido.</span>
</div>

<form method="post" action="#">
<div class="form-group">
                        <label>Nombre: </label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Área: </label>
                        <input type="text" name="area" class="form-control" required>
                    </div>
                    
                    <br>
                    <div class="form-group">
                    <label style="align-items: center;">Pedido de Papelería: </label>
                    <br>
                    <textarea name="pape" cols="45" rows="25" placeholder="Papelería solicitada" autofocus required style="margin-left; 0px;"></textarea>
                    </div>
<br>
<input type="submit" style="margin: auto;" class="btn_new" name="save_pape" value="Enviar Papeleria">
                <br>
                <br>

                </form>
                <footer>
                <hr>
    <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
    <div class="foot">
    <p> Creado por: David Alberto Corpi Zavala | 2024</p>
    <p>MAVEPO SOPORTE &#169</p>
    <p>MAVEPO</p>
    <p>v1.0 - 2024</p>
    </div>
                </footer>





    </body>
     <script type="text/javascript" src="js/functions.js"></script>
     </html>
<?php 

}else{
    header("Location: login.php");
    exit();
}?>