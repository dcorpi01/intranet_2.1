<?php 

session_start();
    if($_SESSION['id_cargo'] != 1 && $_SESSION['id_cargo'] != 5){
        header("location: ./bienvenida.php");
    }
    
    include "db.php"

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <link rel="icon" href="./img/LOGO_MAF20241.png">
    <link rel="stylesheet" type="text/css" href="css/STYLERH.css">
    <?php include "functions.php"; ?>
	<title>Lista de Papelería | INTRAVERDEN</title>
</head>
<body>
<header>
		<div class="header">
			
			<h1>Registro de PAPELERÍA | INTRAVERDEN</h1>
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
                <?php 
                    if($_SESSION['id_cargo'] == 1){
                    ?>
                <li>
                    <a href="bienvenida.php" class="link">Inicio</a>
                </li>
                <li>
                    <a href="adm_index.php" class="link">Solicitudes</a> 
                </li>
                <li>
                    <a href="tabla_mantadm.php" class="link">Mantenimiento</a>
                </li>
                <li>
                    <a href="tab_usuarios.php" class="link">Usuarios</a>
                </li>
                <li>
                    <a href="tb_comentarios.php" class="link">Comentarios</a>
                </li>
                <?php }?>

                <?php 
                    if ($_SESSION['id_cargo'] == 5){
                ?>
                <li>
                    <a href="usu_index.php">Mis Solicitudes</a>
                </li>
                <li>
                    <a href="mis_mant.php">Proximos Mantenimientos</a>
                </li>
                <li>
                    <a href="papeleria1.php">Requisición de Papelería</a>
                </li>
                <?php }?>
        </ul>
    </nav>
	<section id="container">
		<h1>Lista de papelería | MAVEPO</h1>

    <form action="#" method="GET" class="form_search">

        <input type="search" name="busqueda" id="busqueda" placeholder="Buscar">
        <input type="submit" value="Buscar" class="btn_search">

    </form>
    <br>
    <br>
        <table>
            <tr>
                <th>ID Pedido</th>
                <th>Nombre Completo</th>
                <th>Correo</th>
                <th>Área</th>
                <th>Pedido</th>
                <th>Fecha de pedido</th>
            </tr>

                <?php 

                    //Paginador
                    $sql_register = mysqli_query($conn, "SELECT COUNT(*) AS total_registro FROM papeleria");
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
                
                    $query5 = mysqli_query($conn,"SELECT * FROM papeleria ORDER BY id DESC LIMIT $desde,$por_pagina");
                    mysqli_close($conn);
                    $result4 = mysqli_num_rows($query5);

                    if($result4 > 0){

                        while ($data = mysqli_fetch_array($query5)){

                    ?>
                        <tr style="">
                                <td><?php echo $data["id"] ?></td>
                                <td><?php echo $data["nombre"] ?></td>
                                <td><?php echo $data["correo"] ?></td>
                                <td><?php echo $data["area"]   ?></td>
                                <td><?php echo $data["papeleria"] ?></td>
                                <td><?php echo $data["fecha"]?></td>
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