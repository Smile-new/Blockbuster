<!-- IMPORTAR LA PLANTILLA -->
<?= $this->extend('plantillas/panel_base')?>

<!-- RENDER css -->
<?= $this->section('css')?>
    <style>
        .profile-card {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .profile-header {
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
            border-radius: 15px 15px 0 0;
            padding: 20px;
        }
        
        .profile-img-container {
            position: relative;
            margin-bottom: 30px;
        }
        
        .profile-img {
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        
        .profile-img:hover {
            transform: scale(1.05);
        }
        
        .form-control:focus {
            border-color: #4b6cb7;
            box-shadow: 0 0 0 0.2rem rgba(75, 108, 183, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
            border: none;
            border-radius: 50px;
            padding: 8px 25px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .btn-danger {
            border-radius: 50px;
            padding: 8px 25px;
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .form-group label {
            font-weight: 500;
            color: #555;
        }
        
        .card-footer {
            background: transparent;
            border-top: 1px solid rgba(0,0,0,0.05);
        }
        
        .custom-file-input:focus ~ .custom-file-label {
            border-color: #4b6cb7;
            box-shadow: 0 0 0 0.2rem rgba(75, 108, 183, 0.25);
        }
        
        .gender-options {
            display: flex;
            gap: 20px;
        }
        
        .gender-option {
            flex: 1;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .gender-option.selected {
            background-color: #4b6cb7;
            color: white;
            border-color: #4b6cb7;
        }
        

    </style>
<?= $this->endSection()?>
<!-- RENDER css -->

<!-- RENDER CONTENT -->
<?= $this->section('content')?>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- jquery validation -->
                    <div class="card profile-card">
                        <div class="card-header profile-header">
                            <h3 class="card-title text-white"><i class="fas fa-user-edit mr-2"></i>Detalles del Usuario</h3>
                        </div>
                        <!-- form start -->
                        <?= form_open("registrar_usuario", [
                            "id" => "formulario-nuevo-usuario",
                            "class" => "needs-validation",
                            "enctype" => "multipart/form-data"
                        ])?>


                            <div class="card-body">
                                <!-- Avatar section -->
                                <!-- <div class="row">
                                    <div class="avatar-container text-center">
                                        <img src="<?= base_url(RECURSOS_PANEL_IMG_PROFILES_USER.'hombre.png'); ?>" 
                                            alt="imagen_perfil" 
                                            id="previsualizar_imagen"
                                            class="avatar-img rounded-circle" 
                                            width="250px">
                                        <label for="foto_perfil" class="avatar-badge">
                                            <i class="fas fa-camera"></i>
                                        </label>
                                    </div>
                                </div>  -->
                                
                                <!-- Personal information section -->
                                <div class="bg-light p-3 mb-4 rounded">
                                    <h5 class="mb-3 text-primary"><i class="fas fa-id-card mr-2"></i>Información Personal</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nombre"><i class="fas fa-user mr-1"></i>Nombre(s)</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "text",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "Ingrese nombre(s)",
                                                                    "name"=> "nombre",
                                                                    "id"=> "nombre",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="apellido_paterno"><i class="fas fa-user mr-1"></i>Apellido Paterno</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "text",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "Ingrese apellido paterno",
                                                                    "name"=> "apellido_paterno",
                                                                    "id"=> "apellido_paterno",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="apellido_materno"><i class="fas fa-user mr-1"></i>Apellido Materno</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "text",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "Ingrese apellido materno",
                                                                    "name"=> "apellido_materno",
                                                                    "id"=> "apellido_materno",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Account information section -->
                                <div class="bg-light p-3 mb-4 rounded">
                                    <h5 class="mb-3 text-primary"><i class="fas fa-cog mr-2"></i>Información de la Cuenta</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="rol"><i class="fas fa-user-tag mr-1"></i>Rol</label>
                                                <?php
                                                    $options = [
                                                        '' => 'Seleccionar un rol',
                                                        '745' => 'Administrador',
                                                        '125' => 'Operador',
                                                        '58' => 'Cliente'
                                                    ];

                                                    $attributes = [
                                                        'class' => 'form-control',
                                                        'id' => 'rol',
                                                        'name' => 'rol'
                                                    ];

                                                    echo form_dropdown('rol', $options, '', $attributes);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email"><i class="fas fa-envelope mr-1"></i>Correo electrónico</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "email",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "correo@ejemplo.com",
                                                                    "name"=> "email",
                                                                    "id"=> "email",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><i class="fas fa-venus-mars mr-1"></i>Sexo</label>
                                                <div class="gender-options">
                                                    <div class="gender-option">
                                                        <?php
                                                            $atributes = [
                                                                            "type" => "radio",
                                                                            "class"=> "form-check-input",
                                                                            "name"=> "sexo",
                                                                            "id"=> "sexo_masculino",
                                                                            "required"=> true
                                                                        ];
                                                            echo form_input($atributes, MASCULINO);
                                                        ?>
                                                        <label for="sexo_masculino" class="mb-0"><i class="fas fa-male mr-1"></i> Masculino</label>
                                                    </div>
                                                    <div class="gender-option">
                                                        <?php
                                                            $atributes = [
                                                                            "type" => "radio",
                                                                            "class"=> "form-check-input",
                                                                            "name"=> "sexo",
                                                                            "id"=> "sexo_femenino",
                                                                            "required"=> true
                                                                        ];
                                                            echo form_input($atributes, FEMENINO);
                                                        ?>
                                                        <label for="sexo_femenino" class="mb-0"><i class="fas fa-female mr-1"></i> Femenino</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Security section -->
                                <div class="bg-light p-3 mb-4 rounded">
                                    <h5 class="mb-3 text-primary"><i class="fas fa-lock mr-2"></i>Seguridad</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password"><i class="fas fa-key mr-1"></i>Contraseña</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "password",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "Ingrese contraseña",
                                                                    "name"=> "password",
                                                                    "id"=> "password",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="repassword"><i class="fas fa-key mr-1"></i>Confirmar contraseña</label>
                                                <?php
                                                    $atributes = [
                                                                    "type" => "password",
                                                                    "class"=> "form-control",
                                                                    "value"=> "",
                                                                    "placeholder"=> "Repita la contraseña",
                                                                    "name"=> "repassword",
                                                                    "id"=> "repassword",
                                                                    "required"=> true
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                            </div>
                                        </div>
                                        


                                        
                                    </div>
                                </div>
                                
                                <!-- File upload - hidden but functional -->
                                <div class="bg-light p-3 rounded">
                                    <h5 class="mb-3 text-primary"><i class="fas fa-camera mr-2"></i>Foto de Perfil</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-file">
                                                <?php
                                                    $atributes = [
                                                                    "type" => "file",
                                                                    "class"=> "custom-file-input",
                                                                    "name"=> "foto_perfil",
                                                                    "id"=> "foto_perfil",
                                                                    "onchange"=> "previsualizar_imagen('previsualizar_imagen','foto_perfil')",
                                                                    "accept"=> ".png, .jpeg, .jpg",
                                                                ];
                                                    echo form_input($atributes);
                                                ?>
                                                <label class="custom-file-label" for="foto_perfil">Seleccionar archivo</label>
                                            </div>
                                            <small class="form-text text-muted">Formatos permitidos: JPG, JPEG, PNG. Tamaño máximo: 2MB</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <a href="<?= route_to('usuarios') ?>" class="btn btn-danger">
                                    <i class="fas fa-times mr-1"></i>Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary ml-2">
                                    <i class="fas fa-save mr-1"></i>Registrar usuario
                                </button>
                            </div>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection()?>
<!-- RENDER CONTENT -->

<!-- RENDER js -->
<?= $this->section('js')?>
    <script>
        // Script para previsualizar la imagen

    function previsualizar_imagen() {
        const file = document.getElementById('foto_perfil').files[0];
        const preview = document.getElementById('previsualizar_imagen');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }


        
        // Validación de contraseñas
        document.getElementById('formulario-nuevo-usuario').addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const repassword = document.getElementById('repassword').value;
            
            if (password !== repassword) {
                event.preventDefault();
                alert('Las contraseñas no coinciden');
            }
        });
    </script>
<?= $this->endSection()?>
<!-- RENDER js -->