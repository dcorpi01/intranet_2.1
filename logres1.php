<?php
$alert = '';
session_start();
include("db.php");
    if (isset($_POST['uname']) && isset($_POST['password'])) {
        
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);

        if(empty($uname)){
            header("Location: iniciargv.php?error=Usuario requerido");
            exit();
        }else if(empty($pass)) {
            header("Location: inicargv.php?error=Contraseña requerida");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
               $row = mysqli_fetch_assoc($result);

               if($row['user_name'] === $uname && $row['password'] === $pass){  
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id_cargo'] = $row['id_cargo'];
                    $_SESSION['id'] = $row['id'];
                
                    

                    header('location:bienvenida.php');


                }else if ($pass !== ['password']){
                    $alert = '<p>Contraseña incorrecta</p>';
                }

            }else{
                $alert = 'El usuario o la clave son incorrectos';
                header("Location: iniciargv.php?error=Usuario o contraseña incorrectos");
                exit();
            }
    }
    }



?>