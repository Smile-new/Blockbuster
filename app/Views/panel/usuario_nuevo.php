<?= $this->extend('plantillas/panel_base') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Registrar Nuevo Usuario</h3>
            </div>

            <?= form_open_multipart(route_to('registrar_usuario')) ?>
            <div class="card-body">

                <!-- Imagen Preview -->
                <div class="form-group text-center">
                    <label>Vista Previa de Foto</label><br>
                    <img id="preview_foto" src="<?= base_url('perfiles/default.png') ?>" alt="Vista previa"
                         class="rounded-circle" width="120" height="120"
                         style="object-fit: cover; border: 2px solid #ccc;">
                </div>

                <div class="form-group">
                    <label for="foto_perfil">Foto de Perfil</label>
                    <input type="file" name="foto_perfil" id="foto_perfil" class="form-control-file" accept="image/*">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="apellido_paterno">Apellido Paterno</label>
                    <input type="text" name="apellido_paterno" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="apellido_materno">Apellido Materno</label>
                    <input type="text" name="apellido_materno" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" class="form-control" required>
                        <option value="">Seleccione</option>
                        <option value="1">Masculino</option>
                        <option value="0">Femenino</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control" required >
                </div>

                <select name="rol" class="form-control" required>
    <option value="">Seleccione un rol</option>
    <?php foreach ($roles as $rol): ?>
        <option value="<?= $rol->id_rol ?>">
            <?= esc($rol->nombre_rol) ?>
        </option>
    <?php endforeach ?>
</select>

            </div>

            <div class="card-footer text-right">
                <a href="<?= route_to('usuarios') ?>" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Script para previsualizar la imagen -->
<script>
document.getElementById('foto_perfil').addEventListener('change', function (e) {
    const input = e.target;
    const preview = document.getElementById('preview_foto');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
});
</script>

<?= $this->endSection() ?>
