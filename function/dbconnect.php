<?php
    $host = "localhost:3307";
    $username = "root";
    $password = "";
    $database   = "bd_beauty";
    
    //Creando la conexion a la base de datos
    $con = mysqli_connect($host, $username, $password, $database);
    
    if(!$con){
        die("Connection failed". mysqli_connect_error());
    }else{
        echo"Connected sucessfully";
    }
?>