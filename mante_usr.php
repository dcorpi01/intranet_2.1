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
    <link rel="stylesheet" href="css/mante_usr.css">
    <!--FONT QUICKSAND-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="img/LOGO_VERDEN_H.png">
    <title>Próximos Mantenimientos | INTRAVERDEN</title>
</head>
<body>
<div class="menu-btn">
    <i class="fa fa-bars"></i>
</div>
<div class="container">
        <nav class="nav-main">
            <img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="nav-brand">
            <ul class="nav-menu">
                <li>
                    <a href="inicio_usu.php">Inicio</a>
                </li>
                <li>
                    <a href="usu_index.php">Mis Solicitudes</a>
                </li>
                <li>
                    <a href="papeleria.php">Papelería</a>
                </li>
                <li>
                    <a href="logout.php">Cerrar Sesión</a> 
                </li>
            </ul>
            <ul class="nav-menu-right">
                <li>
                    <a href="#">
                        <i class="fas fa-search"> <!-- <input type="text" id="search" placeholder="Buscar">--></i>
                    </a>

                </li>
            </ul>
            <ul>
                <li>
                <h1>BIENVENIDO, <?php echo $_SESSION['name']; ?></h1>
                </li>
            </ul>
        </nav>
</div>
<hr>
<div class="content">
    <h2>Mis <span>Mantenimientos</span></h2>
    <hr>
</div>
<div class="col-md-8">
    <table name="table1" style="width:auto; height:20px;" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Mantenimiento</th>
                <th>Fecha a realizar mantenimiento</th>
                <th class="th1" align="center">Correo Electrónico</th>
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
                <div class="table-content">
                    <tr>

                        <?php $id4 = $row['id'] ?>
                        <?php $mant4 = $row['mantenimiento'] ?>
                        <?php $fecha4 = $row['fecha'] ?>
                        <?php $usu4 = $row['usuario'] ?>
                        <?php $desc10 = $row['descripcion'] ?>
                        <?php $fecha5 = $row['fechac']?>

                        <td><?php echo $id4?></td>
                        <td><?php echo $mant4?></td>
                        <td><?php echo $fecha4?></td>
                        <td class="td1" style="font-size: small;"><?php echo $mail?></td>
                        <!--<td>
                            <form action="update_mant_usr.php" method="post">
                                <select name="status_um" class="form-control">
                                    <option value=""> </option>
                                    <option value="1" <?php if ($row ['u_mstatus']==1){echo "selected";} ?>>Completado</option>
                                    <option value="2" <?php if ($row ['u_mstatus']==2){echo "selected";} ?>>Pendiente</option>
                                </select>
                                <input type="radio" name="id_u" id="id_u" value="<?php echo $id4; ?>" checked hidden>

                                <div class="col-sm-6">
                                    <input type="submit" name="save_um" value="Guardar" class="btn btn-sm btn-primary">
                                </div>
                            </form>
                        </td>-->
                        <td>
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
                        <td><?php echo $fecha5?></td>
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
    <p> Creado por: David Alberto Corpi Zavala | 2022</p>
    <p>INTRAVERDEN &#169</p>
    <p>Residuos Mexicanos</p>
    <p>v.0.0.1 - 2022</p>
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