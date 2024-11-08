<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
include("db.php");

if(isset($_POST['save_m'])){

    $eq1 = $_POST['eq'];
    $mark = $_POST['mar'];
    $mante = $_POST['mant'];
    $date = $_POST['fecha'];
    $usuar = $_POST['userw'];
    $desc9 = $_POST['descripcion'];

    $conf = "INSERT INTO mantenimiento(equipo, marca, mantenimiento, fecha, usuario, descripcion) VALUES ('$eq1', '$mark','$mante', '$date', '$usuar', '$desc9')";
    $result = mysqli_query($conn, $conf);
    if(!$result) {
        die("Query Failed");
    }

    echo'<script type="text/javascript">
    window.location.href="mante_ok.php";
    </script>';

}

}else{
    header("Location: login.php");
    exit();
}

?>