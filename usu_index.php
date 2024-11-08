<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
$mail=$_SESSION['user_name'];

?>

<?php 
include("db.php");
?>
<!--Se inicia la sesión validada y se incluye el archivo de conexión a la base de datos-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "functions.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/stylerh.css">
    <link rel="icon" href="./img/MSF.png">
    <title>Mis Solicitudes | INTRAVERDEN</title>
</head>
<body>
<header>
		<div class="header">
			
			<h1>Solicitudes de Soporte de Sistemas</h1>
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
        <li>
            <a href="bienvenida.php">Inicio</a> 
        </li>
                <li>
                    <a href="mis_mant.php">Proximos Mantenimientos</a>
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
		<h1>Solicitudes de: <?php echo $_SESSION['name'];?></h1>

        <a href="reg_tickets.php" class="btn_new">Generar Solicitud</a>

    <br>
    <br>

    <!--Se crea la tabla en donde se desgloza la información de las solicitudes para los usuarios-clientes-->
    <table> 
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Área</th>
                <th>Tipo</th>
                <th>Nivel</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th style="text-align: center;">Estado Por parte de atencion</th>
                <th style="text-align: center;">Fecha de Actualización SOPORTE</th>
            </tr>
        </thead>
        <tbody>
            <!--Se incluye y crea la sentencia SQL con ayuda de PHP-->
            <?php
            $query = "SELECT * FROM solicitud where email='$mail' ORDER BY id DESC";
            $result_tasks = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result_tasks)) { ?>

                <div class="form group">

                <div class="table-content">
                <!--Mostramos y guardamos los datos para las tablas de olicitudes, solo se mostrarán las solicitudes del usuario validado con la sesión-->
                <tr>

                    <?php $id2 = $row['id'] ?>
                    <?php $nombre2 = $row['nombre'] ?>
                    <?php $empresa = $row['empresa'] ?>
                    <?php $suc2 = $row['sucursal'] ?>
                    <?php $tipo2 = $row['tipo_soporte'] ?>
                    <?php $fecha2 = $row['fecha'] ?>
                    <?php $desc2 = $row['descripcion'] ?>
                    <?php $fechaac = $row['fechaac']?>

                    <td style="font-weight: bold;"><?php echo $id2?></td>
                    <td style="color: black;"><?php echo $nombre2?></td>
                    <td style="font-weight: bold;"><?php echo $empresa?></td>
                    <td style="color: black;"><?php echo $tipo2?></td>
                    <td style="font-weight: bold;"><?php echo $suc2?></td>
                    <td style="color: black;"><?php echo $fecha2?></td>
                    <td style="color: black;"><?php echo $desc2?></td>
                    <td style="color: black;">
                        <!--Se crea el select para seleccionar las opciones de estado de las solicitudes-->
                        <form action="update_u.php" method="POST">
                            <select name="status_f" class="form-control">
                                <option value="1" <?php if ($row ['u_status']==1){echo "selected";} ?>>Abierto</option>
                                <option value="2" <?php if ($row ['u_status']==2){echo "selected";} ?>>Cerrado</option>
                            </select>
                            <input style="display:none;" type="radio" name="id_f" id="id_f" value="<?php echo $id2; ?>" checked hidden>

                            <div class="col-sm-6">
                                <input type="submit" name="save_u" class="btn_new" style="margin: auto;" value="Guardar">
                            </div>
                        </form>
                    </td>
                    <td style="text-align: center; font-weight: bold;">
                        <?php 
                        switch ($row['d_status']){
                            case 1:
                                echo "Abierto";
                                break;
                            case 2:
                                echo "Cerrado";
                                break;
                            case 3:
                                echo "En Proceso";
                                break;
                            case 4: 
                                echo "No Aplica";
                                break;
                        }
                        ?>
                
                
                    </td>
                    <td style="text-align: center; font-weight: bold;"><?php echo $fechaac?></td>
                </tr>
                
                </div>

                </div>
           <?php }?>
        </tbody>
       
    </table>
    
    <!--<a href="tickets.php" style="background-color: #33ACFF; color: white; text-decoration: none;" class="btn-sol" >Generar solicitud</a>-->
</div>


<!--CUSTOM JAVASCRIPT-->
<script src="/js/main.js"></script>
</body>
<br>
<br>

<hr>
    <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
    <div class="foot">
    <p> Creado por: David Alberto Corpi Zavala | 2024</p>
    <p>MAVEPO SOPORTE &#169</p>
    <p>MAVEPO</p>
    <p>v1.0 - 2024</p>
    </div>

</html>




<?php
 }else{
    header("Location: login.php");
    exit();
 }
   ?>