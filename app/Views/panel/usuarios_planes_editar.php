<?= $this->extend('plantillas/panel_base') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Editar Plan Asignado</h3>
            </div>

            <?= form_open(route_to('actualizar_usuario_plan', $registro['id_usuario_plan'])) ?>
            <div class="card-body">

                <!-- USUARIO -->
                <div class="form-group">
                    <label for="id_usuario">Usuario</label>
                    <select name="id_usuario" class="form-control" required>
                        <option value="">Seleccione un usuario</option>
                        <?php foreach ($usuarios as $usuario): ?>
                            <option value="<?= $usuario->id_usuario ?>" <?= $usuario->id_usuario == $registro['id_usuario'] ? 'selected' : '' ?>>
                                <?= esc($usuario->nombre_completo) ?> (<?= esc($usuario->email_usuario) ?>)
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- PLAN -->
                <div class="form-group">
                    <label for="id_plan">Plan</label>
                    <select name="id_plan" class="form-control" required>
    <option value="">Seleccione un plan</option>
    <?php foreach ($planes as $plan): ?>
        <option value="<?= $plan['id_plan'] ?>" <?= $plan['id_plan'] == $registro['id_plan'] ? 'selected' : '' ?>>
            <?= esc($plan['nombre_plan']) ?> - <?= esc($plan['precio_plan']) ?> USD
        </option>
    <?php endforeach ?>
</select>

                </div>

                <!-- FECHAS -->
                <div class="form-group">
                    <label for="fecha_registro">Fecha de Registro</label>
                    <input type="date" name="fecha_registro" class="form-control"
                           value="<?= esc($registro['fecha_registro_plan']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="fecha_fin">Fecha de Finalización</label>
                    <input type="date" name="fecha_fin" class="form-control"
                           value="<?= esc($registro['fecha_fin_plan']) ?>" required>
                </div>

            </div>

            <div class="card-footer text-right">
                <a href="<?= route_to('usuarios_planes') ?>" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
