<?php 

session_start();
    if($_SESSION['id_cargo'] != 1){
        header("location: ./bienvenida.php");
    }
    
    include "db.php"

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <link rel="icon" href="./img/LOGO_MAF20241.png">
    <link rel="stylesheet" type="text/css" href="css/stylerh.css">
    <?php include "functions.php"; ?>
	<title>Administrador | MAVEPO SOPORTE</title>
</head>
<body>
<header>
		<div class="header">
			
			<h1>Solicitudes de Soporte de Sistemas</h1>
			<div class="optionsBar">
				<p>San Luis Potosí, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['name'].' - '.$_SESSION['id_cargo']; ?></span>
				<img class="photouser" src="./img/LOGO_MAF20241.png" alt="Usuario">
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
                    <a href="tabla_mantadm.php">Mantenimiento</a>
                </li>
                <li>
                    <a href="tab_usuarios.php">Usuarios</a>
                </li>
                <li>
                    <a href="tb_comentarios.php">Comentarios</a>
                </li>
                <li>
                    <a href="tb_pape.php">Registro Papelería</a>
                </li>
        </ul>
    </nav>
	<section id="container">
		<h1>Solicitudes | ADMINISTRADOR</h1>

    <form action="buscar_soladm.php" method="GET" class="form_search"> <!--buscar solicitud-->

        <input type="search" name="busqueda" id="busqueda" placeholder="Buscar">
        <input type="submit" value="Buscar" class="btn_search">

    </form>
    <br>
    <br>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Empresa</th>
                <th>Sucursal</th>
                <th>Soporte</th>
                <th>Nivel</th>
                <th>Fecha de Creación</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Estado (Usuario)</th>
                <th>Fecha Actualización</th>
                <th>Fecha Usuario</th>
            </tr>

                <?php 

                    //Paginador
                    $sql_register = mysqli_query($conn, "SELECT COUNT(*) AS total_registro FROM solicitud");
                    $result_register = mysqli_fetch_array($sql_register);

                    $total_registro = $result_register['total_registro'];

                    $por_pagina = 15;

                    if(empty($_GET['pagina'])){
                        $pagina = 1;
                    }else{
                        $pagina = $_GET['pagina'];
                    }

                    $desde = ($pagina-1) * $por_pagina;
                    $total_paginas = ceil($total_registro / $por_pagina);
                
                    $query5 = mysqli_query($conn,"SELECT * FROM solicitud ORDER BY id DESC LIMIT $desde,$por_pagina");
                    mysqli_close($conn);
                    $result4 = mysqli_num_rows($query5);

                    if($result4 > 0){

                        while ($data = mysqli_fetch_array($query5)){

                    ?>
                        <tr>
                    <?php $id1=$data['id'] ?>
                    <?php $nombre1=$data['nombre'] ?>
                    <?php $empresa = $data['empresa'] ?>
                    <?php $sucursal = $data['sucursal']?>
                    <?php $soporte = $data['tipo_soporte']?>
                    <?php $urgencia = $data['urgencia']?>
                    <?php $desc1 = $data['descripcion']?>
                    <?php $fecha = $data['fecha']?>
                    <?php $fechaac = $data['fechaac']?>
                    <?php $fechaacu = $data['fechaacu']?>
                    
                    <td style="font-weight: bold;"><?php echo $id1?></td>
                    <td><?php echo $nombre1?></td>
                    <td style="font-weight: bold;"><?php echo $empresa?></td>
                    <td style="font-weight: bold;"><?php echo $sucursal?></td>
                    <td style="font-weight: bold;"><?php echo $soporte?></td>
                    <td style="font-weight: bold;"><?php echo $urgencia?></td>
                    <td style="font-weight: blod;"><?php echo $fecha?></td>
                    <td><?php echo $desc1?></td>
                    <td>
                    <form action="update.php" method="POST">
                        <select name="status_final" class="form-control">
                            <option value="1" <?php if ($data ['d_status']==1){echo "selected";} ?>>Abierto</option>
                            <option value="2" <?php if ($data ['d_status']==2){echo "selected";} ?>>Cerrado</option>
                            <option value="3" <?php if ($data ['d_status']==3){echo "selected";} ?>>En Proceso</option>
                            <option value="4" <?php if ($data ['d_status']==4){echo "selected";} ?>>No Aplica</option>
                        </select>
                        <input style="display:none;" type="radio" id="id_final" name="id_final" value="<?php echo $id1; ?>" checked hidden>
                        
                        <div class="col-sm-6">
                            <input type="submit" name="save" class="btn_new" style="margin: auto;" value="Guardar">
                        </div>
                    </form>
                    </td>
                    <td>
                        
                    
                    <?php 
                    
                    switch ($data['u_status']){
                        case 1:
                            echo "Abierto";
                            break;
                        case 2:
                            echo "Cerrado";
                            break;
                    }
                    ?>
                <!--Mostramos los datos que se nos solicitan de los usuarios-clientes-->
                
                    </td>
                    <td style="font-weight: bold;"><?php echo $fechaac?></td>
                    <td style="font-weight: bold;"><?php echo $fechaacu?></td>
                </tr>
                <?php

                        }

                    }

                ?>

            
        </table>

        <div class="paginador">
            <ul>
                <?php 
                    if($pagina != 1){ 
                ?>
                <li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
                <li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>

                    <?php 
                    }
                        for($i=1; $i <= $total_paginas; $i++){

                            if($i == $pagina){
                                echo '<li class="pageSelected">'.$i.'</li>';
                            }else{

                                echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';

                            }   
                        }
                        if($pagina != $total_paginas){ 
                    ?>

                <li><a href="?pagina=<?php echo $pagina+1; ?>">>></a></li>
                <li><a href="?pagina=<?php echo $total_paginas; ?>">>|</a></li>
                <?php } ?>
            </ul>
        </div>
		
	</section>

	<?php include "includes/footer.php";?>
</body>

<hr>
    <!--Se grega un píe de página para poder colocar los datos del desarrollador y versión del sistema-->
    <div class="foot">
    <p> Creado por: David Alberto Corpi Zavala | 2024</p>
    <p>MAVEPO SOPORTE &#169</p>
    <p>MAVEPO</p>
    <p>v1.0 - 2024</p>
    </div>

</html>