<?php 

session_start();
    if($_SESSION['id_cargo'] != 3){
        header("location: ./inicio_usu.php");
    }

    include "db.php";

    if(!empty($_POST)){
        
        $alert = '';
        if(empty($_POST['nombre']) || empty($_POST['apep']) || empty($_POST['apem']) || empty($_POST['curp']) || empty($_POST['rfc']) || empty($_POST['muni'])){

            $alert = '<p class="msg_error">Todos los campos son requeridos.</p>';

        }else{

            $nombre = $_POST['nombre'];
            $apep = $_POST['apep'];
            $apem = $_POST['apem'];
            $dptto = $_POST['dptto'];
            $curp = $_POST['curp'];
            $puesto = $_POST['puesto'];
            $ec = $_POST['ec'];
            $nss = $_POST['nss'];
            $rfc = $_POST['rfc'];
            $calle = $_POST['calle'];
            $numint = $_POST['numint'];
            $numext = $_POST['numext'];
            $col = $_POST['col'];
            $cp = $_POST['cp'];
            $muni = $_POST['muni'];
            $hr = $_POST['hr'];
            $tipoem = $_POST['tipoem'];
            $fechain = $_POST['fechain'];
            $edad = $_POST['edad'];
            $fechanac = $_POST['fechanac'];

            $save = "INSERT INTO trabcarganova(nombre, apep, apem, dptto, curp, puesto, ec, nss, rfc, calle, numint, numext, col, cp, muni, hr, tipoem, fechain, edad, fechanac) VALUES ('$nombre', '$apep', '$apem', '$dptto', '$curp', '$puesto', '$ec', '$nss', '$rfc', '$calle', '$numint', '$numext', '$col', '$cp', '$muni', '$hr', '$tipoem', '$fechain', '$edad', '$fechanac')";
            $result = mysqli_query($conn, $save);

            if($save){
                $alert = '<p class="msg_save">Trabajador creado con éxito</p>';
            }else{
                $alert = '<p class="msg_error">Error al crear el nuevo trabajador</p>';
            }

               
            }
        }

    ?>

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
        <title>PLANTILLA CARGANOVA | INTRAVERDEN</title>
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
            <li><a href="index_resimex.php">Inicio</a></li>
            <li class="principal">
				<a href="#">Empresas</a>
				    <ul>
						<li><a href="index_resimex.php">Residuos Mexicanos</a></li>
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
                            <li><a href="lista_tcarganova.php">Lista de Trabajadores</a></li>
                        </ul>
                
                </li>

        </ul>
    </nav>

    <section id="container">

   
		
        <div class="form_register">
            <img src="img/carganova.png" alt="" class="image-sup">
            <br>
            <h1 style="margin-left: 60px;"">Alta de Trabajador</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            
            <form action="#" method="POST">

                <label for="nombre">Nombre (s): </label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre(s)">

                <label for="apep">Apellido Paterno: </label>
                <input type="text" name="apep" id="apep" placeholder="Apellido Paterno">

                <label for="apem">Apellido Materno: </label>
                <input type="text" name="apem" id="apem" placeholder="Apellido Materno">


                <?php 
                
                $query4 = mysqli_query($conn, "SELECT * FROM departamentos");
                $result3 = mysqli_num_rows($query4);
                
                ?>

                <label for="dptto">Áea o Departamento: </label>
                <select name="dptto" id="dptto">
                    <?php 
                    
                    if($result3){
                        while ($dptto = mysqli_fetch_array($query4)){
                            ?>
                            <option value="<?php echo $dptto["id"]; ?>"><?php echo $dptto["descripcion"]; ?></option>   
                
                            <?php
                         }
                    }
                    
                    ?>
                </select>

                <label for="curp">CURP</label>
                <input type="text" name="curp" id="curp" placeholder="Clave Única del Registro de Población">

                <label for="puesto">Puesto: </label>
                <input type="text" name="puesto" id="puesto" placeholder="Puesto del trabajador">

                <label for="ec">Estado Civil: </label>
                <input type="text" name="ec" id="ec" placeholder="Estado Civil">

                <label for="nss">Seguro Social: </label>
                <input type="text" name="nss" id="nss" placeholder="Número de Seguro Social">

                <label for="rfc">Registro Federal de Contribuyentes: </label>
                <input type="text" name="rfc" id="rfc" placeholder="Número RFC">

                <br>

                    <h2>Direccion: </h2>

                    <br>
                    <br>

                <input type="text" name="calle" id="calle" placeholder="Calle">
                    <br>
                <input type="text" name="numint" id="numint" placeholder="Núm. Interior">
                    <br>
                <input type="text" name="numext" id="numext" placeholder="Núm. Exterior">
                    <br>
                <input type="text" name="col" id="col" placeholder="Colonia">
                    <br>
                <input type="text" name="cp" id="cp" placeholder="Código Postal">
                    <br>
                <input type="text" name="muni" id="muni" placeholder="Municipio">
                    <br>
                    <br>

                    <h2>Datos de empleo: </h2>
                <label for="horario">Escriba el horario del empleado: </label>
                <input type="text" name="hr" id="hr" placeholder="Horario">

                <label for="tipoem">Tipo de empleado: </label>
                <select name="tipoem" id="tipoem">
                    <option value="1">Seleccione el tipo de empleado--</option>
                    <option value="2">Administrativo</option>
                    <option value="3">Operativo</option>
                </select>

                <label for="fechain">Fecha de Ingreso: </label>
                <input type="date" name="fechain" id="fechain">

                <label for="edad">Edad: </label>
                <input type="number" name="edad" id="edad">

                <label for="fechanac">Fecha de nacimiento: </label>
                <input type="date" name="fechanac" id="fechanac">

                <input type="submit" value="Guardar" class="btn_save">
                <br>

                <footer>
                <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
                <div class="foot">
                <p>Creado por: David Alberto Corpi Zavala | 2022</p>
                <p>INTRAVERDEN | RRHH &#169</p>
                <p>Residuos Mexicanos</p>
                <p>Developers Beta 1</p>
                </div>
                </footer>

                </form>



    </body>
     <script type="text/javascript" src="js/functions.js"></script>
     </html>

     