<?= $this->extend('plantillas/panel_base') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">
        <h4 class="mb-4">Nuevo Video</h4>

        <!-- FILTRO POR STREAMING -->
        <form method="get" class="form-inline mb-3">
            <label for="id_streaming" class="mr-2">Filtrar por título:</label>
            <select name="id_streaming" id="id_streaming" class="form-control mr-2" onchange="this.form.submit()">
                <option value="">-- Todos --</option>
                <?php foreach ($streamings as $item): ?>
                    <option value="<?= $item->id_streaming ?>" <?= ($filtro_streaming == $item->id_streaming) ? 'selected' : '' ?>>
                        <?= esc($item->nombre_streaming) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </form>

        <?= form_open_multipart(route_to('guardar_video')) ?>

        <div class="form-group">
            <label for="video">Archivo de Video (.mp4)</label>
            <input type="file" name="video" class="form-control-file" accept="video/mp4" required>
        </div>

        <div class="form-group">
            <label for="nombre_temporada">Nombre de la Temporada</label>
            <input type="text" name="nombre_temporada" class="form-control" placeholder="Ej: Parte 1, Temporada 2" required>
        </div>

        <div class="form-group">
            <label for="video_temporada">Número de Temporada</label>
            <input type="number" name="video_temporada" class="form-control" min="1" required>
        </div>

        <div class="form-group">
            <label for="capitulo_temporada">Número de Capítulo</label>
            <input type="number" name="capitulo_temporada" class="form-control" min="1" required>
        </div>

        <div class="form-group">
            <label for="descripcion_capitulo_temporada">Descripción del Capítulo</label>
            <textarea name="descripcion_capitulo_temporada" class="form-control" rows="4" placeholder="Breve resumen del episodio..." required></textarea>
        </div>

        <div class="form-group">
            <label for="id_streaming">Título (Streaming) Asociado</label>
            <select name="id_streaming" class="form-control" required>
                <option value="">Seleccione un título</option>
                <?php foreach ($streamings as $item): ?>
                    <option value="<?= $item->id_streaming ?>">
                        <?= esc($item->nombre_streaming) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Guardar Video
            </button>
            <a href="<?= route_to('videos') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver al listado
            </a>
        </div>

        <?= form_close() ?>
    </div>
</div>

<?= $this->endSection() ?>
