<?php
session_start();
if($_SESSION['id_cargo'] != 3){
    header("location: ./logout.php");
}

include "db.php";
    if(!empty($_POST)){
        
        if($_POST['id_cargo'] == 1 && $_POST['id_cargo'] == 2){
            header("location: logout.php");
            mysqli_close($conn);
            exit;
        }
        
        $idusuario = $_POST['id_tb'];

        //$query10 = mysqli_query($conn, "DELETE FROM usuario WHERE idusuario = $idusuario");
        $query10 = mysqli_query($conn, "UPDATE trabcarganova SET status = 0 WHERE id_tb = $idusuario");

        if($query10){
            header("location: lista_tcarganova.php");
        }else{
            echo "Error al eliminar registro";
        }

    }


    if(empty($_REQUEST['id_tb']) || $_REQUEST['id_tb'] == 1){
        header("location: lista_tcarganova.php");
    }else{

        $idusuario = $_REQUEST['id_tb'];

        $query9 = mysqli_query($conn, "SELECT t.apep, t.apem, t.nombre, t.curp, t.puesto, t.nss, t.col, t.fechain, d.descripcion FROM trabcarganova t INNER JOIN departamentos d ON d.id = t.dptto WHERE t.id_tb = $idusuario");
        $result8 = mysqli_num_rows($query9);

        if($result8 > 0){
            while ($data = mysqli_fetch_array($query9)){
                $apep = $data['apep'];
                $apem = $data['apem'];
                $nombre = $data['nombre'];
                $curp = $data['curp'];
                $puesto =$data['puesto'];
                $nss = $data['nss'];
                $col = $data['col'];
                $fechain = $data['fechain'];
                $dptto = $data['descripcion'];
            }
        }else{
            header("location: lista_tcarganova.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Eliminar Trabajador | INTRAVERDEN</title>
    <link rel="stylesheet" type="text/css" href="css/carganova.css">
	<script type="text/javascript" src="js/functions.js"></script>
    <link rel="icon" href="img/carganova.png">
    <?php include "functions.php"; ?>
</head>
<body>
	<section id="container">
		<div class="data_delete">
            <h2>¿Está seguro de eliminar el siguiente registro?</h2>
            <p>Apellido Paterno: <span><?php echo $apep; ?></span></p>
            <p>Apellido Materno: <span><?php echo $apem; ?></span></p>
            <p>Nombre(s): <span><?php echo $nombre; ?></span></p>
            <p>Clave Unica del Registro de Población: <span><?php echo $curp; ?></span></p>
            <p>Departamento: <span><?php echo $dptto; ?></span></p>

            <form action="" method="POST">
                <input type="hidden" name="id_tb" value="<?php echo $idusuario?>">
                <a class="btn_cancel" href="lista_tcarganova.php">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn_ok">
            </form>
        </div>
		
	</section>


</body>
</html>