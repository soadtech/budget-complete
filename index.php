<?php include("php/db.php") ?>

<?php include("php/includes/header.php") ?>
    <!--CAJITAS FLOTANTES QUE TIENEN LOS VALORES-->
    <div class="container cont-secciones">
        <div class="seccion gastos">
            <h2>Total gastado:
                <span class="d-block">$ -45.000</span>
            </h2>
            <button class="btn btn-view">View All</button>
        </div>
        <div class="seccion ingresos">
            <h2>Total ganado:
                <span class="d-block">$ +800.000</span>
            </h2>
            <div>
                
            </div>
            <button class="btn btn-view">View All</button>
            
        </div>
    </div>

    <!--MOSTRAR  MENSAJES-->
    <?php if(isset($_SESSION['mensaje'])): ?>
        <div class="container alert alert-<?php echo $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['mensaje']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php session_unset(); ?><!--LIMPIAR LOS DATOS DE LA SESSION-->
    <?php endif; ?>    

    <!-- FORMULARIO -->
    <div class="container cont-form">
        <form action="php/save_log.php" method="POST">
            <input type="text" placeholder="Descripcion" name="description">
            <input type="number" placeholder="Valor" name="valor">
            <select name="" id="">
                <option value="gasto">-</option>
                <option value="ingreso">+</option>
            </select>
            <input type="submit" name="save_log" class="btn btn-add" value="Agregar" />
        </form>
    </div>
    

    <!-- LISTA -->
    <div class="container cont-list">
        <h2>Lista</h2>

        <div class="tabla">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Valor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
               <hr>
                <tbody>
                    <?php
                    //seleccionar todos los datos de la tabla log
                        $query = "SELECT * FROM log";

                        $resultado_logs = mysqli_query($conexion, $query);

                        while($row = mysqli_fetch_array($resultado_logs)): ?>
                            <tr>
                                <td><?php echo $row['desciption']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td><?php echo $row['valor']; ?></td>
                                <td>
                                    <a href="php/edit.php?id=<?php echo $row['id'] ?>" class="btn bg-icon">
                                        <span class="icon">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                    <a href="php/delete_log.php?id=<?php echo $row['id'] ?>" class="btn bg-danger">
                                        <span class="icon">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>  
                        <?php endwhile; ?>                   
                </tbody>
                                                          
            </table>
        </div>
    </div>
    <br>
<?php include("php/includes/footer.php") ?>  