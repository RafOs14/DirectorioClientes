<div class="modal fade" id="addNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title">Agregar Cliente</h4></center>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>       
            <div class="modal-body">
                <div class="container-fluid mb-3">
                    <form method="POST" action="agregar.php" id="MyFormAdd">
                        <div class="row form-group">
                        <div class="col-sm-2">
                                <label class="control-label">Cedula:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="text" class="form-control" name="cedula" placeholder="Cedula">
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">Nombre:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="text" class="form-control" name="nombreCliente" placeholder="Nombre">
                            </div>
                            <div class="col-sm-2">
                                <label class="control-label">Apellido:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="text" class="form-control" name="apellidoCliente" placeholder="Apellido">
                            </div>
                            <div class="col-sm-2 mb-3">
                                <label class="control-label">Direccion:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="text" class="form-control" name="direccion" placeholder="Direccion">
                            </div>
                            <div class="col-sm-2 mb-3">
                                <label class="control-label">Telefono:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="tel" class="form-control" name="telefono" placeholder="Telefono">
                            </div>
                            <div class="col-sm-2 mb-3">
                                <label class="control-label">Correo:</label>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Correo">
                            </div>                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="BorrarDatosForm()"><span class="fa fa-close"></span> Cancelar</button>
                            <button type="submit" name="add" class="btn btn-success" data-bs-dismiss="modal"><span class="fa fa-save"></span> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function BorrarDatosForm(){
        document.getElementById("MyFormAdd").reset();
    }
</script>