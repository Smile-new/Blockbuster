<?= $this->extend('plantillas/panel_base') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <a href="<?= route_to('nuevo_usuario_plan') ?>" class="btn btn-agregar mb-3">
            <i class="fas fa-plus"></i> Nuevo Usuario Plan
        </a>

        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Plan</th>
                        <th>Fecha de Registro</th>
                        <th>Fecha de Fin</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($usuarios_planes as $item): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= esc($item['nombre_usuario']) ?></td>
                            <td><?= esc($item['nombre_plan']) ?></td>
                            <td><?= esc($item['fecha_registro_plan']) ?></td>
                            <td><?= esc($item['fecha_fin_plan']) ?></td>
                            <td class="text-center">
                                <a href="<?= route_to('editar_usuario_plan', $item['id_usuario_plan']) ?>"
                                   class="btn btn-sm btn-info" title="Editar">
                                   <i class="fas fa-edit"></i>
                                </a>

                                <a href="<?= route_to('eliminar_usuario_plan', $item['id_usuario_plan']) ?>"
                                   class="btn btn-sm btn-danger" title="Eliminar"
                                   onclick="return confirm('¿Eliminar este registro?')">
                                   <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
