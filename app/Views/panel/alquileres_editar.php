<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-edit mr-2"></i>Editar Alquiler</h3>
                    </div>

                    <?= form_open(route_to('alquiler_actualizar', $alquiler->id_alquiler)) ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_usuario">Cliente</label>
                            <select name="id_usuario" class="form-control" required>
                                <option value="">Seleccione un cliente</option>
                                <?php foreach ($usuarios as $u): ?>
                                    <option value="<?= $u->id_usuario ?>" <?= ($u->id_usuario == $alquiler->id_usuario ? 'selected' : '') ?>>
                                        <?= esc($u->nombre_usuario . ' ' . $u->ap_usuario) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_streaming">Servicio de Streaming</label>
                            <select name="id_streaming" class="form-control" required>
                                <option value="">Seleccione una plataforma</option>
                                <?php foreach ($streaming as $s): ?>
                                    <option value="<?= $s->id_streaming ?>" <?= ($s->id_streaming == $alquiler->id_streaming ? 'selected' : '') ?>>
                                        <?= esc($s->nombre_streaming) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fecha_inicio_alquiler">Fecha de Inicio</label>
                            <input type="date" name="fecha_inicio_alquiler" class="form-control" value="<?= esc($alquiler->fecha_inicio_alquiler) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="fecha_fin_alquiler">Fecha de Fin</label>
                            <input type="date" name="fecha_fin_alquiler" class="form-control" value="<?= esc($alquiler->fecha_fin_alquiler) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="estatus_alquiler">Estatus</label>
                            <select name="estatus_alquiler" class="form-control" required>
                                <option value="-1" <?= ($alquiler->estatus_alquiler == -1 ? 'selected' : '') ?>>En proceso</option>
                                <option value="1" <?= ($alquiler->estatus_alquiler == 1 ? 'selected' : '') ?>>Culminado</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <a href="<?= route_to('alquileres') ?>" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning">Actualizar Alquiler</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
