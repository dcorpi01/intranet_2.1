<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
$mail=$_SESSION['user_name'];

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
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--CUSTOM CSS-->
    <?php include "functions.php"; ?>
    <link rel="stylesheet" href="css/stylerh.css">
    <!--FONT QUICKSAND-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="./img/MSF.png">
    <title>Próximos Mantenimientos | INTRAVERDEN</title>
</head>
<body>
<header>
		<div class="header">
			
			<h1>Mantenimientos Programados</h1>
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
                    <a href="usu_index.php">Mis Solicitudes</a>
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
<hr>
<div class="content">
    <h2>Próximos matenimientos de: <?php echo $_SESSION['name'];?></h2>
    <hr>
</div>
<div class="col-md-8">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Mantenimiento</th>
                <th>Fecha a realizar mantenimiento</th>
                <th>Correo Electrónico</th>
                <th>Estado por parte de soporte</th>
                <th>Descripción</th>
                <th>Fecha de actualización SOPORTE</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $mant_q = "SELECT * FROM mantenimiento WHERE usuario='$mail'";
            $result_tarea = mysqli_query($conn, $mant_q);

            while($row = mysqli_fetch_array($result_tarea)) { ?>

            <div class="form-group">
                <div>
                    <tr>

                        <?php $id4 = $row['id'] ?>
                        <?php $mant4 = $row['mantenimiento'] ?>
                        <?php $fecha4 = $row['fecha'] ?>
                        <?php $usu4 = $row['usuario'] ?>
                        <?php $desc10 = $row['descripcion'] ?>
                        <?php $fecha5 = $row['fechac']?>

                        <td style="font-weight: bold;"><?php echo $id4?></td>
                        <td><?php echo $mant4?></td>
                        <td style="font-weight: bold;"><?php echo $fecha4?></td>
                        <td><?php echo $mail?></td>
                        
                        <td style="font-weight: bold;">
                            <?php 
                            switch ($row['a_mstatus']){
                                case 1: 
                                    echo "Asignado";
                                    break;
                                case 2:
                                    echo "En Proceso";
                                    break;
                                case 3: 
                                    echo "Realizado";
                                    break;
                            }
                            
                            ?>
                        </td>
                        <td><?php echo $desc10?></td>
                        <td style="font-weight: bold;"><?php echo $fecha5?></td>
                    </tr>
                </div>
            </div>

            <?php }?>
        </tbody>
    </table>
</div>

<hr>
    <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
    <div class="foot">
    <p> Creado por: David Alberto Corpi Zavala | 2024</p>
    <p>MAVEPO SOPORTE &#169</p>
    <p>MAVEPO</p>
    <p>v1.0 - 2024</p>
    </div>

<!--CUSTOM JAVASCRIPT-->
<script src="/js/main.js"></script>
</body>
</html>





<?php
}else{
    header("Location: login.php");
    exit();
}

?>