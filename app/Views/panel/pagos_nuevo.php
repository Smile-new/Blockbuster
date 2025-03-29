<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary card-outline">
                    <div class="card-header bg-info">
                        <h3 class="card-title"><i class="fas fa-money-check-alt mr-2"></i>Registrar nuevo pago</h3>
                    </div>

                    <?= form_open(route_to('pago_guardar')) ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fecha_registro_pago">Fecha de registro</label>
                            <input type="date" name="fecha_registro_pago" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="monto_pago">Monto del pago</label>
                            <input type="number" name="monto_pago" class="form-control" step="0.01" min="0" required>
                        </div>

                        <div class="form-group">
                            <label for="tarjeta_pago">Tarjeta asociada</label>
                            <input type="text" name="tarjeta_pago" class="form-control" maxlength="32" placeholder="**** **** **** 1234" required>
                        </div>

                        <div class="form-group">
                            <label for="id_usuario">Usuario</label>
                            <select name="id_usuario" class="form-control" required>
                                <option value="">Seleccionar usuario</option>
                                <?php foreach ($usuarios as $usuario): ?>
                                    <option value="<?= $usuario->id_usuario ?>">
                                        <?= esc($usuario->nombre_usuario . ' ' . $usuario->ap_usuario . ' ' . $usuario->am_usuario) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_plan">Plan</label>
                            <select name="id_plan" class="form-control" required>
                                <option value="">Seleccionar plan</option>
                                <?php foreach ($planes as $plan): ?>
                                    <option value="<?= $plan->id_plan ?>">
                                        <?= esc($plan->nombre_plan) ?> - $<?= esc($plan->precio_plan) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="<?= route_to('pagos') ?>" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Pago</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
