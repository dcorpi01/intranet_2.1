<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
include("db.php");

if(isset($_POST['save_task'])){
    $nombre = $_POST['nombre'];
    $email = $_SESSION['user_name'];
    $area = $_POST['area'];
    $tipo = $_POST['tipo'];
    $nivel = $_POST ['nivel'];
    $description = $_POST ['description'];
    date_default_timezone_set('america/mexico_city');
    $date=date('Y-m-d h:i', time());
   


    $query = "INSERT INTO solicitud(nombre, email, area, tipo, nivel, descripcion, fecha) VALUES ('$nombre', '$email', '$area', '$tipo', '$nivel', '$description', '$date')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed");
    }


    echo'<script type="text/javascript">
    window.location.href="ticket.php";
    </script>';

}
}else{
    header("Location: login.php");
    exit();
 }
?>