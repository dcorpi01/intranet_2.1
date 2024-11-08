<?php 

    include ("db.php");

    if(isset($_POST['save_um'])){
        $status = $_POST['status_um'];
        $id = $_POST['id_u'];
        date_default_timezone_set('america/mexico_city');
        $date11=date('Y-m-d h:i', time());

        $update = mysqli_query($conn, "UPDATE mantenimiento SET u_mstatus= '$status', fechau = '$date11' WHERE id=$id");
				if($update){
                    header("Location: mante_usr.php");
                }else{
                    echo 'ERROR';
                }
			 }
?>