<?= $this->extend("plantillas/panel_base") ?>
<!-- CSS -->
<?= $this->section("css") ?>
    <!-- BostrapValidator css -->
    <link rel="stylesheet" href="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'css/boostrapvalidator.min.css');?>">

    <!-- Show the validation -->
    <style>
        .has-error .help-block{
            line-height: 45px;
            color: red;
        }
        .has-error input{
            border-color: red !important;
        }
        .has-success input{
            border-color: green !important;
        }
        .has-error select{
            border-color: red !important;
        }
        .has-success select{
            border-color: green !important;
        }
    </style>
<?= $this->endSection(); ?>
<!-- End  -->

<!-- CONTENIDO -->
<?= $this->section("contenido") ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Editar Herramienta</h5>
                    <h6>Todos los campos marcados con (<font color="red">*</font>) son obligatorios</h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('editar_herramienta',['id' => 'form-user-update','class' => 'user']); ?>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Nombre(s) (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'nombre',
                                            'name' => 'nombre',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Nombre(s)',
                                            'value' => $herramienta->nombre
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Cantidad (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'number',
                                            'id' => 'cantidad',
                                            'name' => 'cantidad',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Cantidad',
                                            'value' => $herramienta->cantidad
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-dark" for="">Descripción (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'descripcion',
                                            'name' => 'descripcion',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Descripción',
                                            'value' => $herramienta->descripcion
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-lg-4">                       
                                <div class="form-group">
                                    <label class="text-dark" for="">Proveedor (<font color="red">*</font>):</label>
                                    <?php
                                        $input = array(
                                            'type' => 'text',
                                            'id' => 'proveedor',
                                            'name' => 'proveedor',
                                            'class' => 'form-control form-control-user',
                                            'placeholder' => 'Proveedor',
                                            'value' => $herramienta->proveedor
                                        );
                                        echo form_input($input);
                                    ?>
                                </div>
                            </div>
                        </div>

                        
                        
                       <div class="text-center">
                            <a class="btn btn-danger" id="bnt-cancelar" href="<?= route_to('herramienta'); ?>"><i class="fa fa-times"></i> Cancelar</a>
                            <?php
                                $btn_submit = array(
                                                    'name'    => 'btn_submit',
                                                    'id'      => 'btn-submit',
                                                    'value'   => 'true',
                                                    'type'    => 'submit',
                                                    'class' => 'btn btn-success',
                                                    'content' => '<i class="fa fa-lg fa-save"></i> Editar',
                                                );
                                echo form_button($btn_submit);
                            ?>
                        </div>

                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>
<!-- End  -->

<!-- JS -->
<?= $this->section("js") ?>
    <!-- Js boostrap Validation -->
    <script type="text/javascript" src="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url(RECURSOS_CONTENIDO_PLUGINS.'js/bostrap-validator.min.js')?>"></script>
    <!--  -->
    <script type="text/javascript">
        document.getElementById("imagen").onchange = function(e) {
            // Se crea un objeto FileReader
            let reader = new FileReader();
            // Se leé el archivo seleccionado y se pasa como argumento al objeto FileReader
            reader.readAsDataURL(e.target.files[0]);
            // Se visualiza la imagen una vez que fue cargada en el objeto FileReader
            reader.onload = function(){
                let imgPreview = document.getElementById('img-preview');
                imgPreview.src = reader.result;
            };
        }
    </script>
    <!-- Form validation -->
    <script>
        $(document).ready(function () {
            $('#form-user-update').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nombre: {
                        validators: {
                            notEmpty: {
                                message: 'Nombre es requerido'
                            },
                        }//validacion
                    },//end nombre
                    cantidad: {
                        validators: {
                            notEmpty: {
                                message: 'La cantidad es requerida'
                            },
                        }//validacion
                    },//end apellido_paterno
                    descripcion: {
                        validators: {
                            notEmpty: {
                                message: 'Se requiere la descripción'
                            },
                        }//validacion
                    },//end apellido_materno
                    proveedor: {
                        validators: {
                            notEmpty: {
                                message: 'El proveedor es requerido'
                            },
                        }//validacion
                    },//end sexo
                }//end fields
            });
        });
    </script>
<?= $this->endSection(); ?>
<!-- End  -->