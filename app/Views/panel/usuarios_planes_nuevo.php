<?= $this->extend('plantillas/panel_base') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Asignar Nuevo Plan a Usuario</h3>
            </div>

            <?= form_open(route_to('guardar_usuario_plan')) ?>
            <div class="card-body">

                <div class="form-group">
                    <label for="id_usuario">Usuario</label>
                    <select name="id_usuario" class="form-control" required>
                        <option value="">Seleccione un usuario</option>
                        <?php foreach ($usuarios as $usuario): ?>
                            <option value="<?= esc($usuario->id_usuario) ?>">
                                <?= esc($usuario->nombre_completo) ?> (<?= esc($usuario->email_usuario) ?>)
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_plan">Plan</label>
                    <select name="id_plan" class="form-control" required>
                        <option value="">Seleccione un plan</option>
                        <?php foreach ($planes as $plan): ?>
                            <option value="<?= esc($plan->id_plan) ?>">
                                <?= esc($plan->nombre_plan) ?> - <?= esc($plan->precio_plan) ?> USD
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha_registro">Fecha de Registro</label>
                    <input type="date" name="fecha_registro" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="fecha_fin">Fecha de Finalización</label>
                    <input type="date" name="fecha_fin" class="form-control" required>
                </div>

            </div>

            <div class="card-footer text-right">
                <a href="<?= route_to('usuarios_planes') ?>" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
