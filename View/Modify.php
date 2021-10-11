    <div class="container">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input required type="text" class="form-control" name="txtNombre" id="" aria-describedby="helpId" placeholder="Ingrese su nombre" value="<?php echo $alumno->nombre ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Apellido</label>
                <input required type="text" class="form-control" name="txtApellido" id="" aria-describedby="helpId" placeholder="Ingrese su apellido" value="<?php echo $alumno->apellido ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Ciudad</label>
                <input required type="text" class="form-control" name="txtCiudad" id="" aria-describedby="helpId" placeholder="Ingrese su ciudad" value="<?php echo $alumno->ciudad ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fecha Inscripcion</label>
                <input required type="date" class="form-control" name="txtFecha" id="" aria-describedby="helpId" placeholder="Ingrese su fecha de inscripcion" value="<?php echo $alumno->fecha ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Correo</label>
                <input required type="mail" class="form-control" name="txtMail" id="" aria-describedby="helpId" placeholder="Ingrese su correo" value="<?php echo $alumno->correo ?>">
            </div>
            <input type="hidden" name="txtOld" value="<?php echo $alumno->apellido ?>" />
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a type="submit" href="?action=inicio" class="btn btn-danger">Cancelar</a>
        </form>
    </div>