<!-- Editar -->
<div class="modal fade" id="edit_<?php echo $row['Cedula'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title">Modificar Cliente</h4></center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>       
            <div class="modal-body">
                <div class="container-fluid mb-3">
                    <form method="POST" action="editar.php?id=<?php echo $row['Cedula'];?>">
                        <div class="row form-group">
                        <div class="col-sm-2">
                                <label class="control-label">Cedula:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="text" class="form-control" name="cedula" placeholder="Cedula" value="<?php echo $row['Cedula'];?>">
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">Nombre:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="text" class="form-control" name="nombreCliente" placeholder="Nombre" value="<?php echo $row['Nombre'];?>">
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">Apellido:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="text" class="form-control" name="apellidoCliente" placeholder="Apellido" value="<?php echo $row['Apellido'];?>">
                            </div>
                            <div class="col-sm-2 mb-3">
                                <label class="control-label">Direccion:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="<?php echo $row['Direccion'];?>">
                            </div>
                            <div class="col-sm-2 mb-3">
                                <label class="control-label">Telefono:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="tel" class="form-control" name="telefono" placeholder="Telefono" value="<?php echo $row['Telefono'];?>">
                            </div>
                            <div class="col-sm-2 mb-3">
                                <label class="control-label">Correo:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Correo" value="<?php echo $row['Correo'];?>">
                            </div>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                            <button type="submit" name="edit" class="btn btn-success" data-bs-dismiss="modal"><span class="fa fa-check"></span> Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!----------------------------------------------------- Eliminar ----------------------------------------------------------------->

<div class="modal fade" id="delete_<?php echo $row['Cedula'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title">Eliminar Cliente</h4></center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>       
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['Nombre'] . " - " .  $row['Cedula']; ?></h3>
                <p class="text-center fw-normal">Va a eliminar el cliente y toda su información, seguro desea continuar?</p>                
            </div>    
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="delete.php?id=<?php echo $row['Cedula']; ?>" class="btn btn-danger"><span class="fa fa-trash"> Eliminar</span></a>                
            </div>          
        </div>
    </div>