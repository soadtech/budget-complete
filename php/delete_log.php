<?php 

    include("db.php");

    //validar si tenemos el id
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        //eliminar DE log DONDE el id sea igual al que estan pasando
        $query = "DELETE FROM log WHERE id = $id";
        $resultado = mysqli_query($conexion, $query);

        //verificar
       if(!$resultado){
           die('Query failed!');
       }
       //mostrar mensaje
       $_SESSION['mensaje'] = 'Fue eliminado correctamente';
       $_SESSION['tipo_mensaje'] = 'success';

       //redireccionar
       header ('Location: ../index.php');
    }

?>