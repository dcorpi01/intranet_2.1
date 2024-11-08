<?php
 
session_start();
if($_SESSION['id_cargo'] != 3){
    header("location: ./inicio_usu.php");
}

    include "db.php"

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>RESIMEX | INTRAVERDEN</title>
    <link rel="stylesheet" type="text/css" href="css/resimex.css">
    <?php include "functions.php"; ?>
</head>
<body>
<header>
		<div class="header">
			
			<h1>RESIMEX</h1>
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
						<li><a href="index_carganova.php">CARGANOVA</a></li>
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
                            <li><a href="trabajador_rmx.php">Nuevo Trabajador</a></li>
                        </ul>
                
                </li>

        </ul>
    </nav>
	<section id="container">
        <?php 
        
            $busqueda = strtolower($_REQUEST['busqueda']);
            if(empty($busqueda)){
                header("location: lista_tresimex.php");
            }
        
        ?>
		<h1>Usuarios</h1>
        <a href="trabajador_rmx.php" class="btn_new">Dar de Alta Trabajador</a>

    <form action="buscar_trabajadormx.php" method="GET" class="form_search">

        <input type="search" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
        <input type="submit" value="Buscar" class="btn_search">

    </form>

        <table>
            <tr>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombre (s)</th>
                <th>Área</th>
                <th>Puesto</th>
                <th>Estado Civil</th>
                <th>NSS</th>
                <th>CURP</th>
                <th>RFC</th>
                <th>Calle</th>
                <th>No. Ext</th>
                <th>Col.</th>
                <th>C.P</th>
                <th>Municipio</th>
                <th>Horario</th>
                <th>Tipo</th>
                <th>Fecha Ingreso</th>
                <th>Fecha Baja</th>
                <th>Edad</th>
                <th>Fecha Nacimiento</th>
                <th>Antiguedad</th>
                <th>Acciones</th>
            </tr>

                <?php 

                    //Paginador
                    $emp = '';
                    if($busqueda == 'administrativo'){

                        $rol = "OR tipoem LIKE '%2%'";

                    }else if($busqueda == 'operativo'){

                        $rol = "OR tipoem LIKE '%3%'";

                    }

                    $sql_register = mysqli_query($conn, "SELECT COUNT(*) AS total_registro FROM trabajadormx WHERE (id_tb LIKE '%$busqueda%' OR apep LIKE '%$busqueda%' OR tipoem LIKE '%$busqueda%' OR apem LIKE '%$busqueda%' $emp) AND status = 1");

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
                
                    $query5 = mysqli_query($conn,"SELECT t.id_tb, t.apep, t.apem, t.nombre, d.descripcion, t.curp, t.puesto, t.ec, t.nss, t.rfc, t.calle, t.numext, t.col, t.cp, t.muni, t.hr, t.tipoem, t.fechain, t.fechabj, t.edad, t.fechanac, t.antiguedad, d.id FROM trabajadormx t INNER JOIN departamentos d ON d.id = t.dptto WHERE (t.id_tb LIKE '%$busqueda%' OR t.apep LIKE '%$busqueda%' OR t.apem LIKE '%$busqueda%' OR t.nombre LIKE '%$busqueda%' OR d.descripcion LIKE '%$busqueda%' OR t.curp LIKE '%$busqueda%' OR t.puesto LIKE '%$busqueda%' OR t.ec LIKE '%$busqueda%' OR t.nss LIKE '%$busqueda%' OR t.rfc LIKE '%$busqueda%' OR t.calle LIKE '%$busqueda%' OR t.numext LIKE '%$busqueda%' OR t.col LIKE '%$busqueda%' OR t.cp LIKE '%$busqueda%' OR t.muni LIKE '%$busqueda%' OR t.hr LIKE '%$busqueda%' OR t.tipoem LIKE '%$busqueda%' OR t.fechain LIKE '%$busqueda%' OR t.fechabj LIKE '%$busqueda%' OR t.edad LIKE '%$busqueda%' OR t.fechanac LIKE '%$busqueda%' OR t.antiguedad LIKE '%$busqueda%' OR d.id LIKE '%$busqueda%') AND status = 1 ORDER BY t.id_tb ASC LIMIT $desde,$por_pagina");
                
                    $result4 = mysqli_num_rows($query5);

                    if($result4 > 0){

                        while ($data = mysqli_fetch_array($query5)){

                    ?>
                        <tr>
                                <td><?php echo $data["apep"] ?></td>
                                <td><?php echo $data["apem"] ?></td>
                                <td><?php echo $data["nombre"] ?></td>
                                <td><?php echo $data["descripcion"] ?></td>
                                <td><?php echo $data["puesto"] ?></td>
                                <td><?php echo $data["ec"] ?></td>
                                <td><?php echo $data["nss"] ?></td>
                                <td><?php echo $data["curp"] ?></td>
                                <td><?php echo $data["rfc"] ?></td>
                                <td><?php echo $data["calle"] ?></td>
                                <td><?php echo $data["numext"] ?></td>
                                <td><?php echo $data["col"] ?></td>
                                <td><?php echo $data["cp"] ?></td>
                                <td><?php echo $data["muni"] ?></td>
                                <td><?php echo $data["hr"] ?></td>
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
                                    </td>
                                <td><?php echo $data["fechain"] ?></td>
                                <td><?php echo $data["fechabj"] ?></td>
                                <td><?php echo $data["edad"] ?> años</td>
                                <td><?php echo $data["fechanac"] ?></td>
                                <td><?php echo $data["antiguedad"] ?> años/días </td>
                            <td>
                                <a class="link_edit" href="editar_usuario.php?id=<?php echo $data["id_tb"] ?>">Editar</a>

                              
                    |
                                <a class="link_delete" href="eliminar_confirmar_trabajador.php?id_tb=<?php echo $data["id_tb"]?>"> Eliminar</a>
                                
                            </td>
                        </tr>
                <?php

                        }

                    }

                ?>

            
        </table>

        <?php 
        
            if($total_registro != 0)
                {
        ?>
        <div class="paginador">
            <ul>
                <?php 
                    if($pagina != 1){ 
                ?>
                <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<</a></li>
                <li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda; ?>"><<</a></li>

                    <?php 
                    }
                        for($i=1; $i <= $total_paginas; $i++){

                            if($i == $pagina){
                                echo '<li class="pageSelected">'.$i.'</li>';
                            }else{

                                echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';

                            }   
                        }
                        if($pagina != $total_paginas){ 
                    ?>

                <li><a href="?pagina=<?php echo $pagina+1; ?> &busqueda=<?php echo $busqueda; ?> ">>></a></li>
                <li><a href="?pagina=<?php echo $total_paginas; ?> &busqueda=<?php echo $busqueda; ?>">>|</a></li>
                <?php } ?>
            </ul>
        </div>
        <?php }?>
		
	</section>

	<?php include "includes/footer.php";?>
</body>
</html>