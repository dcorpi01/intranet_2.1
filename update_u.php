<?php 

    include ("db.php");

    if(isset($_POST['save_u'])){
        $estado = $_POST['status_f'];
        $id_u = $_POST['id_f'];
        date_default_timezone_set('america/mexico_city');
        $date13=date('Y-m-d h:i', time());

        $updt = mysqli_query($conn, "UPDATE solicitud SET u_status='$estado', fechaacu = '$date13' WHERE id='$id_u'");

        if($updt){
            header("Location: usu_index.php");
        }else{
            echo 'ERROR';
        }
    }
?>