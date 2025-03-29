<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-primary card-outline">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title"><i class="fas fa-credit-card mr-2"></i> Pagos Registrados</h3>
                        <a href="<?= route_to('pago_nuevo') ?>" class="btn btn-success btn-sm">
                            <i class="fas fa-plus-circle"></i> Nuevo Pago
                        </a>
                    </div>
                    <div class="card-body">
                        <?php if (count($pagos) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Plan</th>
                                            <th>Fecha</th>
                                            <th>Monto</th>
                                            <th>Tarjeta</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pagos as $index => $p): ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= esc($p->nombre_usuario . ' ' . $p->ap_usuario) ?></td>
                                                <td><?= esc($p->nombre_plan) ?></td>
                                                <td><?= esc($p->fecha_registro_pago) ?></td>
                                                <td>$<?= number_format($p->monto_pago, 2) ?></td>
                                                <td><?= esc($p->tarjeta_pago) ?></td>
                                                <td>
                                                    <?php if ($p->estatus_pago == 1): ?>
                                                        <a href="<?= route_to('pago_estatus', $p->id_pago) ?>" class="btn btn-success btn-sm" title="Marcar como Rechazado">
                                                            <i class="fas fa-check-circle mr-1"></i> Aceptado
                                                        </a>
                                                    <?php elseif ($p->estatus_pago == 0): ?>
                                                        <a href="<?= route_to('pago_estatus', $p->id_pago) ?>" class="btn btn-warning btn-sm" title="Aceptar/Rechazar">
                                                            <i class="fas fa-clock mr-1"></i> Pendiente
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="<?= route_to('pago_estatus', $p->id_pago) ?>" class="btn btn-danger btn-sm" title="Marcar como Aceptado">
                                                            <i class="fas fa-times-circle mr-1"></i> Rechazado
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="<?= route_to('pago_editar', $p->id_pago) ?>" class="btn btn-warning btn-sm" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= route_to('pago_eliminar', $p->id_pago) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este pago?')" title="Eliminar">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info text-center">No hay pagos registrados.</div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
