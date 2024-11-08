<?php 

session_start();
include("db.php");

if(isset($_POST['guardar_vac'])){
    $fechasol = $_POST['fechasol'];
    $nombre = $_POST['nombre'];
    $dptto = $_POST['dptto'];
    $fechaing = $_POST['fechaing'];
    $numeroemp = $_POST['numeroemp'];
    $puesto = $_POST['puesto'];
    $dia1 = $_POST['dia1'];
    $mes1 = $_POST['mes1'];
    $año1 = $_POST['año1'];
    $dia2 = $_POST['dia2'];
    $mes2 = $_POST['mes2'];
    $año2 = $_POST['año2'];
    $dia3 = $_POST['dia3'];
    $mes3 = $_POST['mes3'];
    $año3 = $_POST['año3'];

    $savev = "INSERT INTO vacaciones(fechasol, nombre, dptto, fechaing, numeroemp, puesto, dia1, mes1, año1, dia2, mes2, año2, dia3, mes3, año3) VALUES ('$fechasol', '$nombre', '$dptto', '$fechaing', '$numeroemp', '$puesto', '$dia1', '$mes1', '$año1', '$dia2', '$mes2', '$año2', '$dia3', '$mes3', '$año3')";
    $result = mysqli_query($conn, $savev);

    if(!$result){
        die("Query Failed");
    }


}else{
    header("Location: sol_vacaciones.php");
    exit();
}

?>