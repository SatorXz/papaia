<?php
$conn=new mysqli('localhost','phpmyadmin','Almi1234*/','foro');
if (mysqli_connect_errno()){
    die('Falla la conexion: '.mysqli_connect_error());
}