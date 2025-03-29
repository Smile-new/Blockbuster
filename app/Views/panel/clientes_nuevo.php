<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header bg-info">
                        <h3 class="card-title"><i class="fas fa-user-plus mr-2"></i>Nuevo Cliente</h3>
                    </div>

                    <?= form_open_multipart(route_to('cliente_guardar'), ['id' => 'form-cliente']) ?>
                    <div class="card-body">

                        <!-- Imagen de perfil -->
                        <div class="text-center mb-4">
                            <img id="preview_img" src="<?= base_url('perfiles/cliente.png') ?>" alt="Imagen perfil"
                                class="rounded-circle shadow" width="130" height="130">
                        </div>
                        <div class="form-group">
                            <label for="foto_perfil">Foto de perfil</label>
                            <input type="file" name="foto_perfil" id="foto_perfil" class="form-control"
                                accept=".jpg, .jpeg, .png" onchange="previewImage()">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre completo</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="apellido_paterno">Apellido paterno</label>
                            <input type="text" name="apellido_paterno" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="apellido_materno">Apellido materno</label>
                            <input type="text" name="apellido_materno" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Sexo</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo_masculino" value="1" required>
                                <label class="form-check-label" for="sexo_masculino">Masculino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo_femenino" value="2" required>
                                <label class="form-check-label" for="sexo_femenino">Femenino</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="repassword">Repetir Contraseña</label>
                            <input type="password" name="repassword" class="form-control" required>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= route_to('clientes') ?>" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Registrar Cliente</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    function previewImage() {
        const file = document.getElementById('foto_perfil').files[0];
        const preview = document.getElementById('preview_img');
        if (file) {
            const reader = new FileReader();
            reader.onload = e => preview.src = e.target.result;
            reader.readAsDataURL(file);
        }
    }
</script>
<?= $this->endSection() ?>
