<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-film mr-2"></i> Nuevo Alquiler</h3>
                    </div>
                    <?= form_open(route_to('alquiler_guardar')) ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_usuario">Usuario</label>
                            <select name="id_usuario" class="form-control" required>
                                <option value="">Selecciona un usuario</option>
                                <?php foreach ($usuarios as $u): ?>
                                    <option value="<?= $u->id_usuario ?>">
                                        <?= esc($u->nombre_usuario . ' ' . $u->ap_usuario) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_streaming">Contenido Streaming</label>
                            <select name="id_streaming" class="form-control" required>
                                <option value="">Selecciona contenido</option>
                                <?php foreach ($streamings as $s): ?>
                                    <option value="<?= $s->id_streaming ?>">
                                        <?= esc($s->nombre_streaming) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fecha_inicio_alquiler">Fecha de inicio</label>
                            <input type="date" name="fecha_inicio_alquiler" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="fecha_fin_alquiler">Fecha de finalización</label>
                            <input type="date" name="fecha_fin_alquiler" class="form-control" required>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= route_to('alquileres') ?>" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Registrar Alquiler</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
