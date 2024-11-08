<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
include("db.php");

if(isset($_POST['save_sol'])){
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $sucursal = $_POST['sucursal'];
    $soporte = $_POST['tipo_soporte'];
    $urgencia = $_POST['urgencia'];
    $description = $_POST['description'];
    $email = $_SESSION['user_name'];
    date_default_timezone_set('america/mexico_city');
    $date=date('Y-m-d h:i', time());
   


    $query = "INSERT INTO solicitud(nombre, empresa, sucursal, tipo_soporte, urgencia, descripcion, fecha, email) VALUES ('$nombre', '$empresa', '$sucursal', '$soporte', '$urgencia', '$description', '$date', '$email')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        $alert = '<p class="msg_save">Trabajador creado con éxito</p>';
    }else{
        $alert = '<p class="msg_error">Error al crear el nuevo trabajador</p>';
    }

}
}else{
    header("Location: iniciargv.php");
    exit();
 }
?>