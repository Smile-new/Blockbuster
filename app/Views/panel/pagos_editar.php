<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary card-outline">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title"><i class="fas fa-edit mr-2"></i> Editar Pago</h3>
                        <a href="<?= route_to('pagos') ?>" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                    </div>
                    <?= form_open(route_to('pago_actualizar', $pago->id_pago)) ?>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="id_usuario">Usuario</label>
                            <select name="id_usuario" class="form-control" required>
                                <option value="">Seleccionar usuario</option>
                                <?php foreach ($usuarios as $u): ?>
                                    <option value="<?= $u->id_usuario ?>" <?= ($u->id_usuario == $pago->id_usuario) ? 'selected' : '' ?>>
                                        <?= esc($u->nombre_usuario . ' ' . $u->ap_usuario) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_plan">Plan</label>
                            <select name="id_plan" class="form-control" required>
                                <option value="">Seleccionar plan</option>
                                <?php foreach ($planes as $plan): ?>
                                    <option value="<?= $plan->id_plan ?>" <?= ($plan->id_plan == $pago->id_plan) ? 'selected' : '' ?>>
                                        <?= esc($plan->nombre_plan) ?> - $<?= number_format($plan->precio_plan, 2) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fecha_registro_pago">Fecha</label>
                            <input type="date" name="fecha_registro_pago" class="form-control" value="<?= esc($pago->fecha_registro_pago) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="monto_pago">Monto</label>
                            <input type="number" step="0.01" name="monto_pago" class="form-control" value="<?= esc($pago->monto_pago) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="tarjeta_pago">Tarjeta</label>
                            <input type="text" name="tarjeta_pago" class="form-control" maxlength="32" value="<?= esc($pago->tarjeta_pago) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="estatus_pago">Estatus</label>
                            <select name="estatus_pago" class="form-control" required>
                                <option value="-1" <?= ($pago->estatus_pago == -1) ? 'selected' : '' ?>>Rechazado</option>
                                <option value="0" <?= ($pago->estatus_pago == 0) ? 'selected' : '' ?>>Pendiente</option>
                                <option value="1" <?= ($pago->estatus_pago == 1) ? 'selected' : '' ?>>Aceptado</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Guardar Cambios
                        </button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
