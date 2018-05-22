
<?php $empresa = $empleado->getPensionController(); ?>


<div class="modal fade" id="agregar_pension" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar cotizacion de pension</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="ajax_pensionempleado"></div>
      <div id="ajax_errorpensionempleado"></div>
      <form id="formPensionEmpleado">
      <input type="hidden" id="idEmpleadoPension" name="idEmpleadoPension" value="<?php echo $_POST['idEmpleadoEditar'] ?>">
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="form-group col-md-9">
                <label for="nacionalidad">Empresa de Pension</label>
                <select id="empresaPensionEmpleado" name="empresaPensionEmpleado" class="form-control">
                  <?php while ($row = mysqli_fetch_row($empresa)) {?>
                   <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                  <?php } ?>
                  <option selected>...</option> 
                </select>
              </div>
            </div> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
          <input type="submit" class="btn btn-primary" value="Guardar"></input>
        </div>
      </form>
    </div>
  </div>
</div>
