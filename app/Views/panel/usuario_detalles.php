<?= $this->extend('plantillas/panel_base') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">
        <h4 class="mb-4">Detalles del Usuario</h4>

        <?= form_open_multipart(route_to('editar_usuario', $usuario->id_usuario)) ?>

        <div class="form-group text-center">
            <?php if (!empty($usuario->imagen_usuario)): ?>
                <img src="<?= base_url('perfiles/' . $usuario->imagen_usuario) ?>" class="rounded-circle mb-3" width="120" height="120" alt="Foto de perfil">
            <?php else: ?>
                <img src="<?= base_url('perfiles/' . (($usuario->sexo_usuario == MASCULINO) ? 'HOMBRE.jpeg' : 'MUJER.jpeg')) ?>" class="rounded-circle mb-3" width="120" height="120" alt="Sin foto">
            <?php endif ?>
            <input type="file" name="foto_perfil" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="nombre">Nombre(s)</label>
            <input type="text" name="nombre" class="form-control" value="<?= esc($usuario->nombre_usuario) ?>" required>
        </div>

        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno</label>
            <input type="text" name="apellido_paterno" class="form-control" value="<?= esc($usuario->ap_usuario) ?>" required>
        </div>

        <div class="form-group">
            <label for="apellido_materno">Apellido Materno</label>
            <input type="text" name="apellido_materno" class="form-control" value="<?= esc($usuario->am_usuario) ?>" required>
        </div>

        <div class="form-group">
            <label for="sexo">Sexo</label>
            <select name="sexo" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="<?= MASCULINO ?>" <?= ($usuario->sexo_usuario == MASCULINO) ? 'selected' : '' ?>>Masculino</option>
                <option value="<?= FEMENINO ?>" <?= ($usuario->sexo_usuario == FEMENINO) ? 'selected' : '' ?>>Femenino</option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" value="<?= esc($usuario->email_usuario) ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Nueva Contraseña (opcional)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="repassword">Repetir Contraseña</label>
            <input type="password" name="repassword" class="form-control">
        </div>

        <div class="form-group">
            <label for="rol">Rol de Usuario</label>
            <select name="rol" class="form-control" required>
                <option value="">Seleccione un rol</option>
                <option value="<?= ROL_ADMINISTRADOR['clave'] ?>" <?= ($usuario->id_rol == ROL_ADMINISTRADOR['clave']) ? 'selected' : '' ?>><?= ROL_ADMINISTRADOR['rol'] ?></option>
                <option value="<?= ROL_OPERADOR['clave'] ?>" <?= ($usuario->id_rol == ROL_OPERADOR['clave']) ? 'selected' : '' ?>><?= ROL_OPERADOR['rol'] ?></option>
                <option value="<?= ROL_CLIENTE['clave'] ?>" <?= ($usuario->id_rol == ROL_CLIENTE['clave']) ? 'selected' : '' ?>><?= ROL_CLIENTE['rol'] ?></option>
            </select>
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Guardar Cambios
            </button>
            <a href="<?= route_to('usuarios') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
        </div>

        <?= form_close() ?>
    </div>
</div>

<?= $this->endSection() ?>
