<?php
    session_start();

    if($_SESSION['id_cargo'] != 3 && $_SESSION['id_cargo'] != 1){
        header("location: ./bienvenida.php");
    }

    if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
        $mail=$_SESSION['user_name'];
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
        <link rel="stylesheet" type="text/css" href="css/resimex.css">
        <title>Solicitud de Papelería | INTRAVERDEN</title>
        <link rel="icon" href="img/LOGO_VERDEN_H.png">
        <?php include "functions.php"; ?>
    </head>
    <body>
    <header>
		<div class="header">
			
			<h1>INTRAVERDEN | COMPRAS</h1>
			<div class="optionsBar">
				<p>San Luis Potosí, <?php echo fechaC(); ?></p>
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
                <?php 
					if($_SESSION['id_cargo'] == 1){
				?>
                <li>
                    <a href="bienvenida.php">Inicio</a> 
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
                <li>
                    <a href="bienvenida.php">Inicio</a> 
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 5){
				?>
                <li>
                    <a href="usu_index.php">Mis Solicitudes</a>
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 5){
				?>
                <li>
                    <a href="mis_mant.php">Proximos Mantenimientos</a>
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 1){
				?>
                <li>
                    <a href="index_rh.php">Recursos Humanos</a>
                </li>
                <?php }?>
                <?php 
                    if($_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 1){
                ?>
                <li>
                    <a href="index_mtto.php">Mantenimiento Gral.</a>
                </li>
                <?php }?>

                <?php 
                    if($_SESSION['id_cargo'] == 5){
                ?>
                <li>
                    <a href="tb_pape.php">Registro papeleria</a>
                </li>
                <?php }?>
                
        </ul>
    </nav>

<?php
}else{
        header("Location: bienvenida.php");
        exit();
    }
        ?>