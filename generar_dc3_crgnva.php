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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Generar DC3 | CARGANOVA</title>
    <link rel="icon" href="img/resimex.png">
    <link rel="stylesheet" type="text/css" href="css/carganova.css">
    <?php include "functions.php"; ?>
    <script type="text/javascript" src="js/functions.js"></script>
    <script src="jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="dc3_carganova.js"></script>   
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
            <li><a href="index_rh.php">Recursos Humanos</a></li>
            <li class="principal">
				<a href="#">Empresas</a>
				    <ul>
						<li><a href="index_resimex.php">Residuos Mexicanos</a></li>
					</ul>
			</li>
				<li class="principal">
                    <a href="#">Formatos</a>
                        <ul>
                            <li><a href="sol_vacaciones.php">Solicitud de Vacaciones</a></li>
                        </ul>
                </li>
                <li>
                    <a href="#">Trabajadores</a>
                        <ul>
                            <li><a href="#">Nuevo Trabajador</a></li>
                            <li><a href="#">Lista de Trabajadores</a></li>
                        </ul>
                
                </li>

        </ul>
    </nav>

    <section id="container">

<img src="img/carganova.png" alt="" class="image-sup">
    
    <div class="form_register">
        <h1 style="margin-left: 30px;">Generar Formato DC-3</h1>
        <hr>
        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form id="formc">
                <h2>Datos del Trabajador</h2>

                <label for="nombre">Nombre (s): </label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre(s)">

                <label for="curp">Clave Única del Registro de Población: </label>
                <input type="text" name="curp" id="curp" placeholder="CURP">

                <label for="ocupacion">Ocupación específica <span style="font-weight: bold;">(Catálogo Nacional de Ocupaciones): </span></label>
                <input type="text" name="ocupacion" id="ocupacion" placeholder="Ocupación Específica">

                <label for="puesto">Puesto: </label>
                <input type="text" name="puesto" id="puesto" placeholder="Puesto">

                <br>
                <br>

                <h2>Datos de la Empresa</h2>

                <label for="razon">Nombre o Razón Social:</label>
                <input type="text" name="razon" id="razon" value="CARGANOVA SA de CV">

                <label for="rfc">Registro Federal de Contribuyentes con Homoclave <span style="font-weight: bold;">(SHCP): </span></label>
                <input type="text" name="rfc" id="rfc" value="CAR 120625 FJA">

                <br>
                <br>

                <h2>Datos del Programa de Capacitación</h2>

                <label for="curso">Nombre del Curso: </label>
                <input type="text" name="curso" id="curso" placeholder="Nombre del Curso">

                <label for="horas">Duración en Horas: </label>
                <input type="text" name="horas" id="horas" placeholder="hr" style="width: 40px;">

                <label for="periodo">Periodo de Ejecución: </label>
                <input type="number" name="año" id="año" placeholder="Año" style="width: 200px;" min="2022">
                <br>
                <input type="number" name="mes" id="mes" placeholder="Mes" style="width: 200px;" min="01" max="12">
                <br>
                <input type="number" name="dia" id="dia" placeholder="Día" style="width: 200px;" min="01" max="31">

                <label for="a">a </label>

                <input type="number" name="año2" id="año2" placeholder="Año" style="width: 200px;" min="2022">
                <br>
                <input type="text" name="mes2" id="mes2" placeholder="Mes" style="width: 200px;">
                <br>
                <input type="number" name="dia2" id="dia2" placeholder="Día" style="width: 200px;" min="01" max="31">


                <label for="tematica">Área temática del curso: </label>
                <input type="text" name="tematica" id="tematica" placeholder="Temática del curso">

                <label for="agente">Nombre del agente capacitador o <span style="font-weight: bold;">STPS</span></label>
                <input type="text" name="agente" id="agente" placeholder="Agente Capacitador">

                <br>
                <br>

                <h2>Zona de Firmas</h2>

                <label for="instructor">Nombre y firma del instructor: </label>
                <input type="text" name="instructor" id="instructor" placeholder="Nombre del Instructor">

                <label for="patron">Patrón o Respresentante Legal: </label>
                <input type="text" name="patron" id="patron" value="Francisco Izquierdo de la Peña">

                <br>

                <button type="submit" class="btn_save" style="margin:auto; margin-left: 100px;">Generar DC-3</button>
    </div>
</body>
</header>

<?php
    }else{
        header("Location: bienvenida.php");
        exit();
    }
        ?>