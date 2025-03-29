<?= $this->extend('plantillas/panel_base') ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-users"></i> Clientes Registrados</h3>
                        <div class="card-tools">
                            <a href="<?= route_to('cliente_nuevo') ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-user-plus"></i> Nuevo Cliente
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if (count($clientes) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre Completo</th>
                                            <th>Correo</th>
                                            <th>Sexo</th>
                                            <th>Imagen</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($clientes as $index => $cliente): ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= esc($cliente->nombre_usuario . ' ' . $cliente->ap_usuario . ' ' . $cliente->am_usuario) ?></td>
                                                <td><?= esc($cliente->email_usuario) ?></td>
                                                <td><?= $cliente->sexo_usuario == 1 ? 'Masculino' : 'Femenino' ?></td>
                                                <td>
                                                    <?php $img = $cliente->imagen_usuario ?? 'hombre.png'; ?>
                                                    <img src="<?= base_url('perfiles/' . $img) ?>" class="img-thumbnail rounded-circle" width="60">
                                                </td>
                                                <td>
                                                    <?php if ($cliente->estatus_usuario == 1): ?>
                                                        <span class="badge badge-success">Habilitado</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">Deshabilitado</span>
                                                    <?php endif ?>
                                                    <br>
                                                    <a href="<?= route_to('estatus_cliente', $cliente->id_usuario) ?>" class="btn btn-sm btn-outline-secondary mt-1">
                                                        <i class="fas fa-sync-alt"></i> Cambiar
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?= route_to('cliente_editar', $cliente->id_usuario) ?>" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= route_to('cliente_eliminar', $cliente->id_usuario) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar este cliente?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info text-center">No hay clientes registrados.</div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
