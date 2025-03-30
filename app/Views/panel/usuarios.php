<?= $this->extend('plantillas/panel_base') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <h4 class="mb-4">Listado de Usuarios</h4>

        <a href="<?= route_to('usuario_nuevo') ?>" class="btn btn-agregar mb-3">
            <i class="fas fa-plus"></i> Nuevo Usuario
        </a>

        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                   
                        <th>Nombre Completo</th>
                        <th>Sexo</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Estatus</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            
                          

                            <td><?= esc($usuario->nombre_usuario . ' ' . $usuario->ap_usuario . ' ' . $usuario->am_usuario) ?></td>
                            <td><?= esc(($usuario->sexo_usuario == '1') ? 'Masculino' : 'Femenino') ?></td>
                            <td><?= esc($usuario->email_usuario) ?></td>
                            <td><?= esc($usuario->nombre_rol ?? 'Sin Rol') ?></td>
                            <td>
                                <?php if ($usuario->estatus_usuario == 1): ?>
                                    <span class="badge badge-success">Activo</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Inactivo</span>
                                <?php endif ?>
                            </td>
                            <td class="text-center">
                                <!-- Estatus -->
                                <?php if ($usuario->estatus_usuario == 1): ?>
                                    <a href="<?= route_to('estatus_usuario', $usuario->id_usuario, 0) ?>"
                                       class="btn btn-sm btn-warning"
                                       title="Desactivar"
                                       onclick="return confirm('¿Desactivar este usuario?')">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= route_to('estatus_usuario', $usuario->id_usuario, 1) ?>"
                                       class="btn btn-sm btn-success"
                                       title="Activar"
                                       onclick="return confirm('¿Activar este usuario?')">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                <?php endif ?>

                                <!-- Editar -->
                                <a href="<?= route_to('detalles_usuario', $usuario->id_usuario) ?>"
                                   class="btn btn-sm btn-info"
                                   title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Eliminar -->
                                <a href="<?= route_to('eliminar_usuario', $usuario->id_usuario) ?>"
                                   class="btn btn-sm btn-danger"
                                   title="Eliminar"
                                   onclick="return confirm('¿Eliminar este usuario?')">
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
