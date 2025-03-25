<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <h4 class="mb-4">Nuevo Plan</h4>

        <?= form_open(route_to('guardar_plan')) ?>

        <div class="form-group">
            <label for="nombre">Nombre del Plan</label>
            <input type="text" name="nombre" class="form-control" required placeholder="Ej. Plan Premium">
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" required placeholder="Ej. 9.99">
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad Límite</label>
            <input type="number" name="cantidad" class="form-control" required placeholder="Ej. 5">
        </div>

        <div class="form-group">
    <label for="tipo">Tipo de Plan</label>
    <select name="tipo" id="tipo" class="form-control" required>
        <option value="">Seleccione una opción</option>
        <option value="8" <?= (old('tipo', $plan['tipo_plan'] ?? '') == 8) ? 'selected' : '' ?>>Semanal</option>
        <option value="16" <?= (old('tipo', $plan['tipo_plan'] ?? '') == 16) ? 'selected' : '' ?>>Mensual</option>
        <option value="32" <?= (old('tipo', $plan['tipo_plan'] ?? '') == 32) ? 'selected' : '' ?>>Anual</option>
    </select>
</div>


        <div class="form-group mt-4">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Guardar Plan
            </button>
            <a href="<?= route_to('planes') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver al listado
            </a>
        </div>

        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection() ?>
