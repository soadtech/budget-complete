<?php
    include("db.php");
    //si existe atravez del metodo post un valor llamado save_log
    //significa que estan tradando de guardar algo

    if(isset($_POST['save_log'])){
        $description = $_POST['description'];
        $valor = $_POST['valor'];

        //consulta
        $query = "INSERT INTO log(desciption, valor) VALUES ('$description', '$valor')";

        //realizas la consulta en al base de datos
       $resultado = mysqli_query($conexion, $query);
       if(!$resultado){
           die('Query failed!');
       }

       //mostrar mensaje
       $_SESSION['mensaje'] = 'Fue agregado correctamente';
       $_SESSION['tipo_mensaje'] = 'success';

       //redireccionar
       header ('Location: ../index.php');
    }

?>