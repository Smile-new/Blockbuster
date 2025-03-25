<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <!-- BOTÓN AGREGAR PLAN -->
        <a href="<?= route_to('nuevo_plan') ?>" class="btn btn-agregar mb-3">
            <i class="fas fa-plus"></i> Nuevo Plan
        </a>

        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del Plan</th>
                        <th>Precio</th>
                        <th>Límite</th>
                        <th>Tipo</th>
                        <th>Estatus</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($planes as $plan): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= esc($plan['nombre_plan']) ?></td>
                            <td>$<?= number_format($plan['precio_plan'], 2) ?></td>
                            <td><?= esc($plan['cantidad_limite_plan']) ?></td>
                            <td><?= esc($plan['tipo_plan']) ?></td>
                            <td>
                                <?php if ($plan['estatus_plan'] == 1): ?>
                                    <span class="badge badge-success">Activo</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactivo</span>
                                <?php endif ?>
                            </td>
                            <td class="text-center">
                                <!-- Estatus -->
                                <?php if ($plan['estatus_plan'] == 1): ?>
                                    <a href="<?= route_to('estatus_plan', $plan['id_plan'], -1) ?>"
                                       class="btn btn-sm btn-warning"
                                       title="Desactivar"
                                       onclick="return confirm('¿Desactivar este plan?')">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= route_to('estatus_plan', $plan['id_plan'], 1) ?>"
                                       class="btn btn-sm btn-success"
                                       title="Activar"
                                       onclick="return confirm('¿Activar este plan?')">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                <?php endif ?>

                                <!-- Editar -->
                                <a href="<?= route_to('editar_plan', $plan['id_plan']) ?>"
                                   class="btn btn-sm btn-info"
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Eliminar -->
                                <a href="<?= route_to('eliminar_plan', $plan['id_plan']) ?>"
                                   class="btn btn-sm btn-danger"
                                   title="Eliminar"
                                   onclick="return confirm('¿Eliminar este plan?')">
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
