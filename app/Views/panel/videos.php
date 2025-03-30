<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <!-- BOTÓN AGREGAR VIDEO -->
        <a href="<?= route_to('nuevo_video') ?>" class="btn btn-agregar mb-2">
            <i class="fas fa-plus"></i> Nuevo Video
        </a>

        <!-- FILTRO POR STREAMING -->
        <form method="get" action="<?= route_to('videos') ?>" class="form-inline mb-3">
            <label for="id_streaming" class="mr-2">Filtrar por Título:</label>
            <select name="id_streaming" id="id_streaming" class="form-control mr-2" onchange="this.form.submit()">
                <option value="">-- Todos --</option>
                <?php foreach ($streamings as $stream): ?>
                    <option value="<?= $stream['id_streaming'] ?>"
                        <?= ($filtro_streaming == $stream['id_streaming']) ? 'selected' : '' ?>>
                        <?= esc($stream['nombre_streaming']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </form>

        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Archivo</th>
                        <th>Nombre Temporada</th>
                        <th>Temporada</th>
                        <th>Capítulo</th>
                        <th style="max-width: 300px;">Descripción</th>
                        <th>Estatus</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($videos as $video): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>
                                <video width="150" height="90" controls>
                                    <source src="<?= base_url('videos/' . $video['video']) ?>" type="video/mp4">
                                    Tu navegador no soporta la reproducción de video.
                                </video>
                            </td>
                            <td><?= esc($video['nombre_temporada']) ?></td>
                            <td><?= esc($video['video_temporada']) ?></td>
                            <td><?= esc($video['capitulo_temporada']) ?></td>
                            <td style="max-width: 300px; overflow-wrap: break-word;">
                                <?= esc($video['descripcion_capitulo_temporada']) ?>
                            </td>
                            <td>
                                <?php if ($video['estatus_video'] == 1): ?>
                                    <span class="badge badge-success">Activo</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactivo</span>
                                <?php endif ?>
                            </td>
                            <td class="text-center">
                                <!-- Estatus -->
                                <?php if ($video['estatus_video'] == 1): ?>
                                    <a href="<?= route_to('estatus_video', $video['id_video'], -1) ?>"
                                       class="btn btn-sm btn-warning"
                                       title="Desactivar"
                                       onclick="return confirm('¿Desactivar este video?')">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= route_to('estatus_video', $video['id_video'], 1) ?>"
                                       class="btn btn-sm btn-success"
                                       title="Activar"
                                       onclick="return confirm('¿Activar este video?')">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                <?php endif ?>

                                <!-- Editar -->
                                <a href="<?= route_to('editar_video', $video['id_video']) ?>"
                                   class="btn btn-sm btn-info"
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Eliminar -->
                                <a href="<?= route_to('eliminar_video', $video['id_video']) ?>"
                                   class="btn btn-sm btn-danger"
                                   title="Eliminar"
                                   onclick="return confirm('¿Eliminar este video?')">
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
