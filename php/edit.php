<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM log WHERE id = $id";

        $resultado = mysqli_query($conexion, $query);

        //comprobar cuantas filas hay
        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_array($resultado);
            $descripcion = $row['desciption'];
            $valor = $row['valor'];
        }
    }  
    
    if(isset($_POST['actualizar'])){
        $id = $_GET['id'];

        $description = $_POST['description'];
        $valor = $_POST['valor'];

        $query = "UPDATE log set desciption = '$description', valor = '$valor' WHERE id = $id";

        mysqli_query($conexion, $query);

         //mostrar mensaje
       $_SESSION['mensaje'] = 'Fue actualizado correctamente';
       $_SESSION['tipo_mensaje'] = 'success';

        header("Location: ../index.php");
    }

?>

<?php include('includes/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <h2>Actualizando datos</h2>
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="description" value="<?php echo $descripcion; ?>" class="form-control" placeholder="actualizar descripcion">
                    </div>

                    <div class="form-group">
                        <input type="text" name="valor" value="<?php echo $valor; ?>" class="form-control" placeholder="actualizar valor">
                    </div>
                    <button class="btn bg-icon" name="actualizar">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>