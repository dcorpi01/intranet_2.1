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
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="css/crud.css">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!--FONT QUICKSAND-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!--Favicon-->
    <link rel="icon" href="img/LOGO_VERDEN_H.png">
    <title>Mis Solicitudes | INTRAVERDEN</title>
</head>
<body>
<div class="menu-btn">
    <i class="fa fa-bars"></i>
</div>
<!--Creamos la barra de navegación-->
<div class="container">
        <nav class="nav-main">
            <img src="img/LOGO_VERDEN_H.png" alt="Logo Grupo Verden" class="nav-brand">
            <ul class="nav-menu">
                <li>
                    <a href="inicio_usu.php" style="text-decoration: none;">Inicio</a>
                </li>
                <li>
                    <a href="mante_usr.php" style="text-decoration: none;">Próximos Mantenimientos</a>
                </li>
                 <li>
                    <a href="papeleria.php">Papelería</a>
                </li>
                <li>
                    <a href="logout.php" style="text-decoration: none;">Cerrar Sesión</a> 
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
    <h2>Mis <span>Solicitudes</span></h2>
    <hr>
</div>

<!--Se crea el botón que nos dirige directamente al formulario para crear solicitudes de soporte-->


<div class="col-md-8" style="color: black; margin-left: 200px;">

<input type="button" value="Generar Solicitud" onclick="location.href='tickets.php'" style="color: white; background-color: #038c65;" class="btn-sol">

    <!--Se crea la tabla en donde se desgloza la información de las solicitudes para los usuarios-clientes-->
    <table style="width:auto; height:50px; color:black;" class="table table-striped table-hover" cellpadding="0" cellspacing="0" style="margin-left: 250px;"> 
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
                <th>Estado Por parte de atencion</th>
                <th>Fecha de Actualización SOPORTE</th>
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
                    <?php $area2 = $row['area'] ?>
                    <?php $tipo2 = $row['tipo'] ?>
                    <?php $nivel2 = $row['nivel'] ?>
                    <?php $fecha2 = $row['fecha'] ?>
                    <?php $desc2 = $row['descripcion'] ?>
                    <?php $fechaac = $row['fechaac']?>

                    <td style="color: black;"><?php echo $id2?></td>
                    <td style="color: black;"><?php echo $nombre2?></td>
                    <td style="color: black;"><?php echo $area2?></td>
                    <td style="color: black;"><?php echo $tipo2?></td>
                    <td style="color: black;"><?php echo $nivel2?></td>
                    <td style="color: black;"><?php echo $fecha2?></td>
                    <td style="color: black;"><?php echo $desc2?></td>
                    <td style="color: black;">
                        <!--Se crea el select para seleccionar las opciones de estado de las solicitudes-->
                        <form action="update_u.php" method="POST">
                            <select name="status_f" class="form-control">
                                <option value="1" <?php if ($row ['u_status']==1){echo "selected";} ?>>Abierto</option>
                                <option value="2" <?php if ($row ['u_status']==2){echo "selected";} ?>>Cerrado</option>
                            </select>
                            <input type="radio" name="id_f" id="id_f" value="<?php echo $id2; ?>" checked hidden>

                            <div class="col-sm-6">
                                <input type="submit" name="save_u" class="btn btn-sm btn-primary" value="save">
                            </div>
                        </form>
                    </td>
                    <td style="color: black;">
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
                    <td style="color: black;"><?php echo $fechaac?></td>
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

</html>




<?php
 }else{
    header("Location: login.php");
    exit();
 }
   ?>