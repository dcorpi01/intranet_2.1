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
        <link rel="icon" href="img/LOGO_VERDEN_H.png">
        <link rel="stylesheet" type="text/css" href="css/stylerh.css">
        <?php include "functions.php"; ?>
        <script src="jspdf.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
        <script type="text/javascript" src="vacaciones_verden.js"></script>
        <title>Vacaciones | INTRAVERDEN</title>
     </head>
     <body>
<header>
		<div class="header">
			
			<h1>SOLICITUD DE VACACIONES</h1>
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
                    <a href="bienvenida.php">Inicio</a> 
                </li>
                <?php 
					if($_SESSION['id_cargo'] == 1){
				?>
                <li>
                    <a href="tabla_mantadm.php">Mantenimiento</a>
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 1){
				?>
                <li>
                    <a href="tab_usuarios.php">Usuarios</a>
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 1){
				?>
                <li>
                    <a href="tb_comentarios.php">Comentarios</a>
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 1){
				?>
                <li>
                    <a href="tb_pape.php">Registro Papelería</a>
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 4){
				?>
                <li>
                    <a href="usu_index.php">Mis Solicitudes</a>
                </li>
                <?php }?>
                <?php 
					if($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 4){
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
                
        </ul>
    </nav>
    <section id="container">

        <img src="LOGO_RESIMEX.png" alt="" class="image-sup">
    
        <div class="form_register">
        <h1 style="margin-left: 20px;">Solicitud de Vacaciones</h1>
        <hr>
        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

        <form id="form_v" action="save_vacaciones.php" method="post">

        <h2>Datos del Trabajador</h2>
            
            <label for="fechasol">Fecha de Solicitud: </label>
            <input type="date" name="fechasol" id="fechasol">
            
            <label for="nombre">Nombre Completo: </label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">

            <label for="dptto">Departamento: </label>
            <input type="text" name="dptto" id="dptto" placeholder="Departamento">

            <label for="fechaing">Fecha de ingreso: </label>
            <input type="date" name="fechaing" id="fechaing">

            <label for="numeroemp">No. Empleado: </label>
            <input type="text" name="numeroemp" id="numeroemp" placeholder="Número de empleado">

            <label for="puesto">Puesto: </label>
            <input type="text" name="puesto" id="puesto">

            <br>
            <h2>Días de Vacaciones</h2>

            <br>
            <label for="dia1">Del: </label>
            <br>
            <input type="number" name="dia1" id="dia1" min="01" max="31" placeholder="Día dd">
            <br>
            <input type="number" name="mes1" id="mes1" min="01" max="12" placeholder="Mes mm">
            <br>
            <input type="number" name="año1" id="año1" min="2022" placeholder="Año aaaa">

            <br>
            <label for="dia2">Al: </label>
            <br>
            <input type="number" name="dia2" id="dia2" min="01" max="31" placeholder="Día dd">
            <br>
            <input type="number" name="mes2" id="mes2" min="01" max="12" placeholder="Mes mm">
            <br>
            <input type="number" name="año2" id="año2" min="2022" placeholder="Año aaaa">

            <br>
            <label for="dia3">Regresa: </label>
            <br>
            <input type="number" name="dia3" id="dia3" min="01" max="31" placeholder="Día dd">
            <br>
            <input type="number" name="mes3" id="mes3" min="01" max="12" placeholder="Mes mm">
            <br>
            <input type="number" name="año3" id="año3" min="2022" placeholder="Año aaaa">

            <br>

                <button type="submit" class="btn_save" style="margin:auto;" name="save_holy">Generar Formato</button>
            </form>
    </section>    
                    
    <?php 

}else{
    header("Location: bienvenida.php");
    exit();
}?>