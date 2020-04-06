<?php
session_start();

$conexion = mysqli_connect(
    'localhost',
    'root',
    '',
    'budget'
);
//verificar la conexion a la base de datos
// if(isset($conexion)){
//     echo "conectada";
// }

?>