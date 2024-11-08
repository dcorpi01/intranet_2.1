<?php 

session_start();
    if($_SESSION['id_cargo'] != 4){
        header("location: ./inicio_usu.php");
    }
    
    include "db.php"

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <link rel="icon" href="img/resimex.png">
    <link rel="stylesheet" type="text/css" href="css/resimex.css">
    <?php include "functions.php"; ?>
	<title>Trabajadores MTTO | INTRAVERDEN</title>
</head>
<body>
<header>
		<div class="header">
			
			<h1>ÁREA MANTENIMIENTO | RESIMEX</h1>
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
            <li><a href="area_mtto.php">Inicio</a></li>
            <li class="principal">
                    <a href="#">Trabajadores</a>
                        <ul>
                            <li><a href="listamtto_carganova.php">Lista de trabajadores MTTO | CARGANOVA</a></li>
                        </ul>
                </li>
                <li class="principal">
                <a href="#">Formatos</a>
                    <ul>
                        <li><a href="#">Tablero de control Carganova y RESIMEX</a></li> <!--Formato lista de datos de formulario de solicitud de mtto.-->
                    </ul>
                </li>
        </ul>
    </nav>
	<section id="container">
		<h1>Trabajadores Mantenimiento | RESIMEX</h1>

    <form action="buscar_trabajadormx.php" method="GET" class="form_search">

        <input type="search" name="busqueda" id="busqueda" placeholder="Buscar">
        <input type="submit" value="Buscar" class="btn_search">

    </form>

        <table>
            <tr>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombre(s)</th>
                <th>Departamento</th>
                <th>Puesto</th>
                <th>CURP</th>
                <th>RFC</th>
                <th>Municipio</th>
                <th>Horario</th>
                <th>Tipo</th>
                <th>Fecha Ingreso</th>
                <th>Fecha Nacimiento</th>
            </tr>

                <?php 

                    //Paginador
                    $sql_register = mysqli_query($conn, "SELECT COUNT(*) AS total_registro FROM trabajadormx WHERE status = 1");
                    $result_register = mysqli_fetch_array($sql_register);

                    $total_registro = $result_register['total_registro'];

                    $por_pagina = 7;

                    if(empty($_GET['pagina'])){
                        $pagina = 1;
                    }else{
                        $pagina = $_GET['pagina'];
                    }

                    $desde = ($pagina-1) * $por_pagina;
                    $total_paginas = ceil($total_registro / $por_pagina);
                
                    $query5 = mysqli_query($conn,"SELECT t.id_tb, t.apep, t.apem, t.nombre, d.descripcion, t.curp, t.puesto, t.nss, t.rfc, t.muni, t.hr, t.tipoem, t.fechain, t.fechanac, d.id FROM trabajadormx t INNER JOIN departamentos d ON d.id = t.dptto WHERE status = 1 AND id = 5 ORDER BY t.id_tb ASC LIMIT $desde,$por_pagina");
                    mysqli_close($conn);
                    $result4 = mysqli_num_rows($query5);

                    if($result4 > 0){

                        while ($data = mysqli_fetch_array($query5)){

                    ?>
                        <tr style="">
                                <td><?php echo $data["apep"] ?></td>
                                <td><?php echo $data["apem"] ?></td>
                                <td><?php echo $data["nombre"] ?></td>
                                <td><?php echo $data["descripcion"] ?></td>
                                <td><?php echo $data["puesto"] ?></td>
                                <td><?php echo $data["curp"]?></td>
                                <td><?php echo $data["rfc"]?></td>
                                <td><?php echo $data["muni"]?></td>
                                <td><?php echo $data["hr"]?></td>
                                <td>
                                    <?php 
                                    
                                    switch ($data['tipoem']){
                                        case 1:
                                            echo " ";
                                            break;
                                        case 2:
                                            echo "Administrativo";
                                            break;
                                        case 3:
                                            echo "Operativo";
                                            break;
                                    }
                                    ?>
                                <!--Mostramos los datos que se nos solicitan de los usuarios-clientes-->
                                    </td>
                                <td><?php echo $data["fechain"]?></td>
                                <td><?php echo $data["fechanac"]?></td>
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
</html>