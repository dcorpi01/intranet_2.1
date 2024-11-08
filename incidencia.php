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
    <title>Generar Incidencia | RESIMEX</title>
    <link rel="icon" href="img/resimex.png">
    <link rel="stylesheet" type="text/css" href="css/resimex.css">
    <?php include "functions.php"; ?>
    <script src="jspdf.min.js"></script>
</head>
<body>
<header>
		<div class="header">
			
			<h1>INTRAVERDEN | GENERAR INCIDENCIA</h1>
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

    <section id="container">

    <img src="LOGO_RESIMEX.png" alt="" class="image-sup">

        <div class="form_register">
            <h1 style="margin-left: 55px;">Generar Incidencia</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

                <form id="form">
                    <h2>Datos del Solicitante</h2>

                    <label for="solicitante">Nombre del solicitante: </label>
                    <input type="text" name="solicitante" id="solicitante" placeholder="Nombre Completo">

                    <label for="area">Área: </label>
                    <input type="text" name="area" id="area" placeholder="Área">

                    <label for="fechasol">Fecha de Solicitud: </label>
                    <input type="date" name="fechasol" id="fechasol">

                    <label for="fechainci">Fecha de la incidencia: </label>
                    <input type="date" name="fechainci" id="fechainci">

                    <label for="motivo">Motivos de la incidencia: </label>
                    <input type="text" name="motivo" id="motivo">

                    <br>
                    <fieldset>
                        <legend>Elija una opción</legend>
                        <label>
                            <input type="radio" name="opcion" value="retardo"> Retardo
                        </label>
                        <label>
                            <input type="radio" name="opcion" value="salida"> Salida Anticipada
                        </label>
                        <label>
                            <input type="radio" name="opcion" value="llegada"> Llegada Tarde
                        </label>
                        <label>
                            <input type="radio" name="opcion" value="sxt"> Salida por Trabajo
                        </label>
                    </fieldset>

                    <br>

                    <label for="observaciones">Observaciones: </label>
                    <input type="text" name="observaciones" id="observaciones">

                    <br>
                    <fieldset>
                        <legend>Elija una opción</legend>
                        <label>
                            <input type="radio" name="permiso" value="cgs"> Con goce de sueldo
                        </label>
                        <label>
                            <input type="radio" name="permiso" value="sgs"> Sin goce de sueldo
                        </label>
                        <label>
                            <input type="radio" name="permiso" value="txt"> Tiempo x tiempo
                        </label>
                    </fieldset>

                    <br>
                    <button type="submit" class="btn_save" style="margin:auto; margin-left: 100px;">Generar Incidencia</button>


                </form>
        </div>

    </section>

    <hr>
    <br>
    <br>
    <div class="foot">
    <p> Creado por: David Alberto Corpi Zavala | 2022</p>
    <p>INTRAVERDEN &#169</p>
    <p>Residuos Mexicanos</p>
    <p>v2.0 - 2022</p>
    </div>
</body>
</html>

<?php 
    }else{
        header("Location: login.php");
        exit();
    }
?>