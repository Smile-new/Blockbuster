<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-primary card-outline">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title"><i class="fas fa-film mr-2"></i> Alquileres Registrados</h3>
                        <a href="<?= route_to('alquiler_nuevo') ?>" class="btn btn-success btn-sm">
                            <i class="fas fa-plus-circle"></i> Nuevo Alquiler
                        </a>
                    </div>
                    <div class="card-body">
                        <?php if (count($alquileres) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Streaming</th>
                                            <th>Inicio</th>
                                            <th>Fin</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php foreach ($alquileres as $index => $a): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= esc($a->nombre_usuario . ' ' . $a->ap_usuario) ?></td>
            <td><?= esc($a->nombre_streaming) ?></td>
            <td><?= esc($a->fecha_inicio_alquiler) ?></td>
            <td><?= esc($a->fecha_fin_alquiler) ?></td>
            <td>
                <?php if ($a->estatus_alquiler == 1): ?>
                    <span class="badge badge-success">Activo</span>
                <?php else: ?>
                    <span class="badge badge-warning">Inactivo</span>
                <?php endif ?>
            </td>
            <td>
                <a href="<?= route_to('alquiler_editar', $a->id_alquiler) ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="<?= route_to('alquiler_eliminar', $a->id_alquiler) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este alquiler?')">
                    <i class="fas fa-trash-alt"></i>
                </a>
                <a href="<?= route_to('estatus_alquiler', $a->id_alquiler) ?>" class="btn btn-info btn-sm" title="Cambiar estatus">
                    <i class="fas fa-sync-alt"></i>
                </a>
            </td>
        </tr>
    <?php endforeach ?>
</tbody>

                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info text-center">No hay alquileres registrados.</div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
