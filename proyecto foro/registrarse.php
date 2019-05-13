<?php
session_start();
$usuario=$_POST['usu'];
$password=$_POST['pass'];
$repassword=$_POST['repass'];
$email=$_POST['email'];
require 'conexion.php';
if ($password!=$repassword){
    echo "<script>alert('Las contraseñas no coinciden');</script>";
    echo "<script> location.href='index.html';</script>";
    die();
}else{
    $resultado=mysqli_query($conn,"select * from usuarios where nombre='$usuario'");
    $filas=mysqli_num_rows($resultado);
    if($filas>0){
        echo "<script>alert('Tu nombre de usuario ya existe');</script>";
        echo "<script> location.href='index.html';</script>";
        die();
    }else{
        mysqli_query($conn,"INSERT INTO usuarios values (null,'$usuario','$password','email')");
        $_SESSION['usuario']=$usuario;
        mkdir('fotos/'.$usuario,0777);
        echo "<script> alert('YA ESTAS REGISTRADP Y CON LA SESION INICIADA');</script>";
        echo "<script> location.href='index.php';</script>";
    }
}
mysqli_close($conn);