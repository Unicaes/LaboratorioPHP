<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Ciudad</th>
            <th>Fecha de inscripcion</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($Alumnos as $alumno) {
        ?>
            <tr>
                <td scope="row"><?php echo $alumno->nombre; ?></td>
                <td><?php echo $alumno->apellido; ?></td>
                <td><?php echo $alumno->ciudad; ?></td>
                <td><?php echo $alumno->fecha; ?></td>
                <td><?php echo $alumno->correo ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="">
                        <a href="?action=editar&apellido=<?php echo $alumno->apellido; ?>" type="button" class="btn btn-info">Editar</a>
                        <a href="?action=borrar&apellido=<?php echo $alumno->apellido; ?>" type="button" class="btn btn-danger">Borrar</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<a name="" id="" class="btn btn-primary" href="../Lab/Model/PDF.php" role="button">Generar PDF</a>