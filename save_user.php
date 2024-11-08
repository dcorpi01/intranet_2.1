<?php 

session_start();
include("db.php");

if(isset($_POST['save_u'])){
    $usname = $_POST['uname'];
    $passw = $_POST['pass'];
    $name = $_POST['nombre'];
    $area = $_POST['area'];
    $cargo = $_POST['cargo'];

    $save = "INSERT INTO users(user_name, password, name, area, id_cargo) VALUES ('$usname', '$passw', '$name', '$area', '$cargo')";
    $result = mysqli_query($conn, $save);

    if(!$result){
        die("Query Failed");
    }
    
    echo'<script type="text/javascript">
    window.location.href="s_user.php";
    </script>';
}else{
    header("Location: registro.php");
    exit();
}

?>