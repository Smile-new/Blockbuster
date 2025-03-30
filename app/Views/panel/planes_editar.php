<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <h4 class="mb-4">Editar Plan</h4>

        <?= form_open(route_to('actualizar_plan', $plan->id_plan)) ?>

        <div class="form-group">
            <label for="nombre">Nombre del Plan</label>
            <input type="text" name="nombre" class="form-control" required value="<?= esc($plan->nombre_plan) ?>">
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" required value="<?= esc($plan->precio_plan) ?>">
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad Límite</label>
            <input type="number" name="cantidad" class="form-control" required value="<?= esc($plan->cantidad_limite_plan) ?>">
        </div>

        <div class="form-group">
            <label for="tipo">Tipo de Plan</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="">Seleccione una opción</option>
                <option value="8" <?= ($plan->tipo_plan == 8) ? 'selected' : '' ?>>Semanal</option>
                <option value="16" <?= ($plan->tipo_plan == 16) ? 'selected' : '' ?>>Mensual</option>
                <option value="32" <?= ($plan->tipo_plan == 32) ? 'selected' : '' ?>>Anual</option>
            </select>
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar Plan
            </button>
            <a href="<?= route_to('planes') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver al listado
            </a>
        </div>

        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection() ?>