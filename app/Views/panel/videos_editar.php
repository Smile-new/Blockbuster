<?= $this->extend('plantillas/panel_base') ?>
<?= $this->section('content') ?>

<h4 class="mb-4">Editar Video</h4>

<?= form_open_multipart(route_to('actualizar_video', $video['id_video'])) ?>

<div class="form-group">
    <label for="video">Archivo de Video (dejar vacío para mantener el actual)</label>
    <input type="file" name="video" class="form-control-file" accept="video/*">
    <small class="form-text text-muted">Archivo actual: <?= esc($video['video']) ?></small>
</div>

<div class="form-group">
    <label for="nombre_temporada">Nombre de Temporada</label>
    <input type="text" name="nombre_temporada" class="form-control" value="<?= esc($video['nombre_temporada']) ?>" required>
</div>

<div class="form-group">
    <label for="video_temporada">Número de Temporada</label>
    <input type="number" name="video_temporada" class="form-control" value="<?= esc($video['video_temporada']) ?>" min="1" required>
</div>

<div class="form-group">
    <label for="capitulo_temporada">Número de Capítulo</label>
    <input type="number" name="capitulo_temporada" class="form-control" value="<?= esc($video['capitulo_temporada']) ?>" min="1" required>
</div>

<div class="form-group">
    <label for="descripcion_capitulo_temporada">Descripción del Capítulo</label>
    <textarea name="descripcion_capitulo_temporada" rows="4" class="form-control" required><?= esc($video['descripcion_capitulo_temporada']) ?></textarea>
</div>

<div class="form-group">
    <label for="id_streaming">Título (Streaming) Asociado</label>
    <select name="id_streaming" class="form-control" required>
        <option value="">Seleccione un título</option>
        <?php foreach ($streamings as $item): ?>
            <option value="<?= $item['id_streaming'] ?>" <?= $video['id_streaming'] == $item['id_streaming'] ? 'selected' : '' ?>>
                <?= esc($item['nombre_streaming']) ?>
            </option>
        <?php endforeach ?>
    </select>
</div>

<div class="form-group mt-4">
    <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Actualizar Video
    </button>
    <a href="<?= route_to('videos') ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Volver al listado
    </a>
</div>

<?= form_close() ?>

<?= $this->endSection() ?>
