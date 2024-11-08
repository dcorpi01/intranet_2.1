<?php 

session_start();
    if($_SESSION['id_cargo'] != 3){
        header("location: ./inicio_usu.php");
    }
    
    include "db.php";

    if(!empty($_POST)){
        
        $alert = '';
        if(empty($_POST['id_tb']) || empty($_POST['nombre']) || empty($_POST['apep']) || empty($_POST['apem']) || empty($_POST['dptto']) || empty($_POST['curp']) || empty($_POST['ec']) || empty($_POST['nss']) || empty($_POST['rfc']) || empty($_POST['calle']) || empty($_POST['numext']) || empty($_POST['col']) || empty($_POST['cp']) || empty($_POST['muni']) || empty($_POST['hr']) || empty($_POST['fechain']) || empty($_POST['edad'])){

            $alert = '<p class="msg_error">Todos los campos son requeridos.</p>';

        }else{

            $idtb = $_POST['id_tb'];
            $nombre = $_POST['nombre'];
            $apep = $_POST['apep'];
            $apem = $_POST['apem'];
            $dptto = $_POST['dptto'];
            $curp = $_POST['curp'];
            $ec = $_POST['ec'];
            $nss = $_POST['nss'];
            $rfc = $_POST['rfc'];
            $calle = $_POST['calle'];
            $numext = $_POST['numext'];
            $col = $_POST['col'];
            $cp = $_POST['cp'];
            $muni = $_POST['muni'];
            $puesto = $_POST['puesto'];
            $hr = $_POST['hr'];
            $fechain = $_POST['fechain'];
            $edad = $_POST['edad'];


            $query2 = mysqli_query($conn, "SELECT * FROM trabcarganova WHERE (apep = '$apep' AND id_tb != '$idtb')");

            $result2 = mysqli_fetch_array($query2);
            /*$result2 = count($result2);*/

            if($result2 > 0){
                $alert = '<p class="msg_error">El trabajador ya existe</p>';
            }else{

                if(empty($_POST['apep'])){

                    $query8 = mysqli_query($conn, "UPDATE trabcarganova SET apem = '$apem', nombre = '$nombre', curp = '$curp', puesto = '$puesto', ec = '$ec', nss = '$nss', calle = '$calle', numext = '$numext', col = '$col', cp = '$cp', muni = '$muni', hr = '$hr', fechain = '$fechain', edad = '$edad' WHERE id_tb = $idtb");

                }else{

                    $query8 = mysqli_query($conn, "UPDATE trabcarganova SET apep = '$apep', apem = '$apem', nombre = '$nombre', curp = '$curp', rfc = '$rfc', puesto = '$puesto', ec = '$ec', nss = '$nss', calle = '$calle', numext = '$numext', col = '$col', cp = '$cp', muni = '$muni', hr = '$hr', fechain = '$fechain', edad = '$edad' WHERE id_tb = $idtb");

                }

                if($query8){
                    $alert = '<p class="msg_save">Trabajador actualizado con éxito</p>';
                }else{
                    $alert = '<p class="msg_error">Error al actualizar el trabajador</p>';
                }
            }
        }
    }

        //Mostrar Datos
        if(empty($_REQUEST['id_tb'])){
            header('location: lista_tcarganovax.php');
        }

        $idtrab = $_REQUEST['id_tb'];

        $query6 = mysqli_query($conn, "SELECT t.id_tb, t.apep, t.apem, t.nombre, d.descripcion, t.puesto, t.ec, t.nss, t.curp, t.rfc, t.calle, t.numext, t.col, t.cp, t.muni, t.hr, t.tipoem, t.fechain, t.fechabj, t.edad, t.fechanac, t.antiguedad, d.id, (d.id) AS id, (d.descripcion) AS descripcion FROM trabcarganova t INNER JOIN departamentos d ON d.id = t.dptto WHERE id_tb = $idtrab");

        $result5 = mysqli_num_rows($query6);

        if($result5 == 0){
            header('location: lista_tcarganova.php');
        }else{
            $option = '';
            while ($data = mysqli_fetch_array($query6)){

                $idtb = $data['id_tb'];
                $nombre = $data['nombre'];
                $apep = $data['apep'];
                $apem = $data['apem'];
                $iddptto = $data['id'];
                $dptto = $data['descripcion'];
                $curp = $data['curp'];
                $puesto = $data['puesto'];
                $ec = $data['ec'];
                $nss = $data['nss'];
                $rfc = $data['rfc'];
                $calle = $data['calle'];
                $numext = $data['numext'];
                $col = $data['col'];
                $cp = $data['cp'];
                $muni = $data['muni'];
                $hr = $data['hr'];
                $tipoem = $data['tipoem'];
                $fechain = $data['fechain'];
                $edad = $data['edad'];
                $fechanac = $data['fechanac'];

                if($iddptto == 1){
                    $option = '<option value="'.$iddptto.'" select>'.$dptto.'</option>';
                }else if ($iddptto == 2){
                    $option = '<option value="'.$iddptto.'" select>'.$dptto.'</option>';
                }else if ($iddptto == 3){
                    $option = '<option value="'.$iddptto.'" select>'.$dptto.'</option>';
                }else if ($iddptto == 4){
                    $option = '<option value="'.$iddptto.'" select>'.$dptto.'</option>';
                }
            }
        }       
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <link rel="icon" href="img/carganova.png">
    <link rel="stylesheet" href="css/carganova.css">
	<title>Actualizar Usuario | INTRAVERDEN</title>
    <?php include "functions.php"; ?>
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
            <li><a href="index_rh.php">Inicio</a></li>
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
                            <li><a href="trabajador_crgnva.php">Nuevo Trabajador</a></li>
                        </ul>
                
                </li>

        </ul>
    </nav>

	<section id="container">
		
        <div class="form_register">
            <h1>Actualizar Usuario</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="#" method="post">
                <input type="hidden" name="id_tb" id="id_tb" value="<?php echo $idtb; ?>">

                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo" value="<?php echo $nombre; ?>">

                <label for="correo">Apellido Paterno: </label>
                <input type="text" name="apep" id="apep" placeholder="Apellido Paterno" value="<?php echo $apep; ?>">

                <label for="apem">Nombre de Usuario: </label>
                <input type="text" name="apem" id="apem" placeholder="Nombre de Usuario" value="<?php echo $apem; ?>">

                <label for="dptto">Departamento: </label>
                <?php 
                
                    include "db.php";
                    $query4 = mysqli_query($conn, "SELECT * FROM departamentos");
                    mysqli_close($conn);
                    $result3 = mysqli_num_rows($query4);
                    
                ?>

                <select name="dptto" id="dptto" class="notItemOne">
                    <?php 

                    echo $option;
                    
                    if($result3){
                        while ($dptto = mysqli_fetch_array($query4)){
                            ?>
                            <option value="<?php echo $dptto["id"] ?>"><?php echo $dptto["descripcion"]; ?></option>                
                <?php
                         }
                    }
                    
                    ?>
                </select>

                <label for="curp">CURP</label>
                <input type="text" name="curp" id="curp" placeholder="Clave Única del Registro de Población" value="<?php echo $curp; ?>">

                <label for="puesto">Puesto: </label>
                <input type="text" name="puesto" id="puesto" placeholder="Puesto del trabajador" value="<?php echo $puesto; ?>">

                <label for="ec">Estado Civil: </label>
                <input type="text" name="ec" id="ec" placeholder="Estado Civil" value="<?php echo $ec; ?>">

                <label for="nss">Seguro Social: </label>
                <input type="text" name="nss" id="nss" placeholder="Número de Seguro Social" value="<?php echo $nss; ?>">

                <label for="rfc">Registro Federal de Contribuyentes: </label>
                <input type="text" name="rfc" id="rfc" placeholder="Número RFC" value="<?php echo $rfc; ?>">

                <br>
                <br>

                    <h2>Direccion: </h2>
                    <br>

                <input type="text" name="calle" id="calle" placeholder="Calle" value="<?php echo $calle; ?>">
                    <br>
                <input type="text" name="numext" id="numext" placeholder="Núm. Exterior" value="<?php echo $numext; ?>">
                    <br>
                <input type="text" name="col" id="col" placeholder="Colonia" value="<?php echo $col; ?>">
                    <br>
                <input type="text" name="cp" id="cp" placeholder="Código Postal" value="<?php echo $cp; ?>">
                    <br>
                <input type="text" name="muni" id="muni" placeholder="Municipio" value="<?php echo $muni; ?>">
                    <br>
                    <br>

                    <h2>Datos de empleo: </h2>
                <label for="horario">Escriba el horario del empleado: </label>
                <input type="text" name="hr" id="hr" placeholder="Horario" value="<?php echo $hr; ?>">

                <label for="fechain">Fecha de Ingreso: </label>
                <input type="date" name="fechain" id="fechain" value="<?php echo $fechain; ?>">

                <label for="edad">Edad: </label>
                <input type="number" name="edad" id="edad" value="<?php echo $edad; ?>">


                <input type="submit" value="Actualizar" class="btn_save">
            </form>

        </div>
		
	</section>

	<?php include "includes/footer.php";?>
</body>
</html>